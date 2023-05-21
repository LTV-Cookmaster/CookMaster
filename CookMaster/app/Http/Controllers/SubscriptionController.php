<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
            'price_per_month' => 0.0,
            'annual_price' => 0,
            'advertising' => true,
            'commenting' => true,
            'lessons' => 1,
            'chat' => false,
            'discount' => false,
            'free_delivery' => false,
            'kitchen_space' => false,
            'exclusive_events' => false,
            'referral_reward' => false,
            'renewal_bonus' => false,
        ];
    }

    /**
     * Display the subscription details for the starter plan.
     */
    public function starterPlan()
    {
        return [
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
        ];
    }

    /**
     * Display the subscription details for the master plan.
     */
    public function masterPlan()
    {
        return [
            'price_per_month' => 19,
            'annual_price' => 220,
            'advertising' => false,
            'commenting' => true,
            'lessons' => 10000,
            'chat' => true,
            'discount' => true,
            'free_delivery' => true,
            'kitchen_space' => true,
            'exclusive_events' => true,
            'referral_reward' => true,
            'renewal_bonus' => true,
        ];
    }

    /**
     * Store a new subscription for the authenticated user.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subscription_type' => ['required', 'integer'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'subscription_price' => ['required', 'string'],
        ]);

        $user = Auth::user();

        try {
            $subscription = $user->newSubscription('default', $request->subscription_type)
                ->startDate($request->start_date)
                ->endDate($request->end_date)
                ->create($request->subscription_price);

            // You can add any additional logic here, such as updating the user's profile or sending email notifications.

            return redirect()->route('subscriptions.index')->with('success', 'Subscription created successfully.');
        } catch (IncompletePayment $exception) {
            // Handle incomplete payments (e.g., redirect the user to the payment page)
            return $exception->redirectToCheckout();
        }
    }


}
