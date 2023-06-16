<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();

        $billId = $request->route('bill');
        $bill = Workshop::findOrFail($billId);
        $userId = Auth::user()->id;
        if (Reservation::where('workshop_id', $billId)->where('user_id', $userId)->exists()) {
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
        $billId = $request->route('bill');
        $bill = Workshop::findOrFail($billId);
        $userId = Auth::user()->id;

        if (Reservation::where('workshop_id', $billId)->where('user_id', $userId)->exists()) {
            return redirect()->route('home')->with('error', 'Vous avez déja une réservation pour cette évènement');
        }

        $reservation = new Reservation;
        $reservation->id = Str::uuid();
        $reservation->workshop_id = $billId;
        $reservation->user_id = Auth::user()->id;
        $reservation->save();

        return redirect()->route('home')->with('success', ('Le paiement pour '.$bill->name.' a été effectuée'));
    }
}
