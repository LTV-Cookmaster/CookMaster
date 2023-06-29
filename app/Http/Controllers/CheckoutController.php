<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function checkout(Request $request)
    {
        $user = Auth::user();

        $billId = $request->route('bill');
        $bill = Event::findOrFail($billId);
        $userId = Auth::user()->id;
        if (Reservation::where('event_id', $billId)->where('user_id', $userId)->exists()) {
            return redirect()->route('home')->with('error', 'Vous avez déja une réservation pour cette évènement');
        }

            Stripe::setApiKey(env('STRIPE_SECRET'));

            $intent = PaymentIntent::create([
                'amount' => $bill["price"] * 100,
                'currency' => env('CASHIER_CURRENCY'),
            ]);


            return view('checkout', [
                'clientSecret' => $intent->client_secret,
                'bill' => $bill,
            ]);
    }

    public function success(Request $request)
    {
        $paid = $request->input('paid');

        if(!$paid){
            return redirect()->route('home')->with('error', 'Le paiement a échoué');
        }

        $billId = $request->route('bill');
        $bill = Event::findOrFail($billId);
        $userId = Auth::user()->id;

        if (Reservation::where('event_id', $billId)->where('user_id', $userId)->exists()) {
            return redirect()->route('home')->with('error', 'Vous avez déja une réservation pour cette évènement');
        }

        $reservation = new Reservation;
        $reservation->id = Str::uuid();
        $reservation->event_id = $billId;
        $reservation->user_id = Auth::user()->id;
        $reservation->type = $bill->type;
        $reservation->room_id = $bill->room_id;
        $reservation->office_id = $bill->office_id;
        $reservation->save();

        return redirect()->route('home')->with('success', ('Le paiement pour '.$bill->name.' a été effectuée'));
    }
}
