<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\Subscription;
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
        $user = Auth::user();

        $billId = $request->route('bill');
        if($billId == "starterPlan"){
            $subscriptionController = new SubscriptionController();
            $subscriptionInfos = $subscriptionController->getSubscriptionDetails("starterPlan");
            $subscription = new Subscription();
            $subscription->id = Str::uuid();
            $subscription->user_id = $user->id;
            $subscription->subscription_type = "starterPlan";
            $subscription->price_per_month = $subscriptionInfos['price_per_month'];
            $subscription->start_date = date("Y-m-d");
            $subscription->end_date = date("Y-m-d", strtotime("+1 month"));
            $subscription->annual_price = $subscriptionInfos['annual_price'];
            $subscription->advertising = $subscriptionInfos['advertising'];
            $subscription->commenting = $subscriptionInfos['commenting'];
            $subscription->lessons = $subscriptionInfos['lessons'];
            $subscription->chat = $subscriptionInfos['chat'];
            $subscription->discount = $subscriptionInfos['discount'];
            $subscription->free_delivery = $subscriptionInfos['free_delivery'];
            $subscription->kitchen_space = $subscriptionInfos['kitchen_space'];
            $subscription->exclusive_events = $subscriptionInfos['exclusive_events'];
            $subscription->referral_reward = $subscriptionInfos['referral_reward'];
            $subscription->renewal_bonus = $subscriptionInfos['renewal_bonus'];
            $subscription->save();
            $bill = new \stdClass();
            $bill->name = "Starter Plan";
        }elseif($billId == "masterPlan"){
            $subscriptionController = new SubscriptionController();
            $subscriptionInfos = $subscriptionController->getSubscriptionDetails("masterPlan");
            $subscription = new Subscription();
            $subscription->id = Str::uuid();
            $subscription->user_id = $user->id;
            $subscription->subscription_type = "starterPlan";
            $subscription->price_per_month = $subscriptionInfos['price_per_month'];
            $subscription->start_date = date("Y-m-d");
            $subscription->end_date = date("Y-m-d", strtotime("+1 month"));
            $subscription->annual_price = $subscriptionInfos['annual_price'];
            $subscription->advertising = $subscriptionInfos['advertising'];
            $subscription->commenting = $subscriptionInfos['commenting'];
            $subscription->lessons = $subscriptionInfos['lessons'];
            $subscription->chat = $subscriptionInfos['chat'];
            $subscription->discount = $subscriptionInfos['discount'];
            $subscription->free_delivery = $subscriptionInfos['free_delivery'];
            $subscription->kitchen_space = $subscriptionInfos['kitchen_space'];
            $subscription->exclusive_events = $subscriptionInfos['exclusive_events'];
            $subscription->referral_reward = $subscriptionInfos['referral_reward'];
            $subscription->renewal_bonus = $subscriptionInfos['renewal_bonus'];
            $subscription->save();
            $bill = new \stdClass();
            $bill->name = "Master Plan";
        }
        else {
        $bill = Event::findOrFail($billId);
        $userId = $user->id;

        if (Reservation::where('event_id', $billId)->where('user_id', $userId)->exists()) {
            return redirect()->route('home')->with('error', 'Vous avez déja une réservation pour cette évènement');
        }

        $reservation = new Reservation;
        $reservation->id = Str::uuid();
        $reservation->event_id = $billId;
        $reservation->user_id = Auth::user()->id;
        $reservation->type = $bill->type;
        $reservation->room_id = $bill->room_id;
        $reservation->start_date = $bill->start_date;
        $reservation->end_date = $bill->end_date;
        $reservation->start_time = $bill->start_time;
        $reservation->end_time = $bill->end_time;
        $reservation->office_id = $bill->office_id;
        $reservation->save();
        }

        return redirect()->route('home')->with('success', ('Le paiement pour '.$bill->name.' a été effectuée'));
    }
}
