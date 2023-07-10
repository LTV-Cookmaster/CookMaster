<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class SubscriptionController extends Controller
{
    /**
     * Display the subscriptions page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('subscriptions');
    }

    /**
     * Display the subscription details for the free plan.
     */
    public function freePlan()
    {
        return [
            'subscription_type' => 'freePlan',
            'price_per_month' => 0.0,
            'annual_price' => 0,
            'advertising' => true,
            'commenting' => true,
            'lessons' => 1,
            'chat' => false,
            'discount' => false,
            'free_delivery' => 'none',
            'kitchen_space' => false,
            'exclusive_events' => false,
            'referral_reward' => false,
            'renewal_bonus' => false,
            'name' => 'Free',
            'price' => 'Gratuit'
        ];
    }

    /**
     * Display the subscription details for the starter plan.
     */
    public function starterPlan()
    {
        return [
            'subscription_type' => 'starterPlan',
            'price_per_month' => 9.9,
            'annual_price' => 113,
            'advertising' => false,
            'commenting' => true,
            'lessons' => 5,
            'chat' => true,
            'discount' => false,
            'free_delivery' => 'point_relais',
            'kitchen_space' => false,
            'exclusive_events' => true,
            'referral_reward' => true,
            'renewal_bonus' => false,
            'name' => 'Starter',
            'price' => '9,90'
        ];
    }

    /**
     * Display the subscription details for the master plan.
     */
    public function masterPlan()
    {
        return [
            'subscription_type' => 'masterPlan',
            'price_per_month' => 19,
            'annual_price' => 220,
            'advertising' => false,
            'commenting' => true,
            'lessons' => 10000,
            'chat' => true,
            'discount' => true,
            'free_delivery' => 'everywhere',
            'kitchen_space' => true,
            'exclusive_events' => true,
            'referral_reward' => true,
            'renewal_bonus' => true,
            'name' => 'Master',
            'price' => '19'
        ];
    }

    /**
     * Store a new subscription for the authenticated user.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subscription_type' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'subscription_price' => ['required', 'string'],
        ]);

        $user = Auth::user();

        $subscription = new Subscription([
            'user_id' => $user->id,
            'subscription_type' => $request->subscription_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'subscription_price' => $request->subscription_price,
        ]);

        $user->subscriptions()->save($subscription);

        return redirect()->route('subscriptions.index')->with('success', 'Subscription created successfully.');
    }

    public function getSubscriptionDetails($plan)
    {
        // Logique pour récupérer les détails de la souscription en fonction du plan
        // Par exemple, vous pouvez utiliser une requête à la base de données ou des conditions
        // pour déterminer les détails en fonction du plan sélectionné

        $subscriptionDetails = [];

        if ($plan === 'freePlan') {
            $subscriptionDetails = $this->freePlan();
        } elseif ($plan === 'starterPlan') {
            $subscriptionDetails = $this->starterPlan();
        } elseif ($plan === 'masterPlan') {
            $subscriptionDetails = $this->masterPlan();
        }

        return $subscriptionDetails;
    }

    public function checkout($plan)
    {
        $user = Auth::user();
        $subscriptionDetails = $this->getSubscriptionDetails($plan);

        if($subscriptionDetails == 'freePlan'){
            return redirect()->route('home')->with('success', __('Free plan subscription created'));
        }else {

            Stripe::setApiKey(env('STRIPE_SECRET'));

            $intent = PaymentIntent::create([
                'amount' => $subscriptionDetails['price_per_month'] * 100,
                'currency' => env('CASHIER_CURRENCY'),
            ]);
            $bill = new \stdClass();
            $bill->name = $subscriptionDetails['name'];
            $bill->price = $subscriptionDetails['price'];
            $bill->id = $subscriptionDetails['subscription_type'];
            return view('checkout', [
                'clientSecret' => $intent->client_secret,
                'plan' => $plan,
                'bill' => $bill,
            ]);
        }
    }

    public function success()
    {
        return redirect()->route('home')->with('success', __('Subscription successful'));
    }

}
