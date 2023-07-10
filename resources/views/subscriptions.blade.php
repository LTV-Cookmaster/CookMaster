<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
@include('layouts.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="text-center">{{__('subscriptions.free_plan')}}</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <h5>{{__('subscriptions.free_price')}}</h5>
                        <li>{{__('subscriptions.advertising')}} <span style="color:green">{{__('subscriptions.yes')}}</span></li>
                        <li>{{__('subscriptions.comment')}} <span style="color:green">{{__('subscriptions.yes')}}</span></li>
                        <li>{{__('subscriptions.lessons')}} <span style="color:green">{{__('subscriptions.free_lessons_count')}}</span></li>
                        <li>{{__('subscriptions.chat')}} <span style="color:red">{{__('subscriptions.no')}}</span></li>
                        <li>{{__('subscriptions.discount')}} <span style="color:red">{{__('subscriptions.no')}}</span></li>
                        <li>{{__('subscriptions.shipping')}} <span style="color:red">{{__('subscriptions.no')}}</span></li>
                        <li>{{__('subscriptions.rental_equipments')}} <span style="color:red">{{__('subscriptions.no')}}</span></li>
                        <li>{{__('subscriptions.invitations')}} <span style="color:red">{{__('subscriptions.no')}}</span></li>
                        <li>{{__('subscriptions.referral_advantage')}} <span style="color:red">{{__('subscriptions.no')}}</span></li>
                        <li>{{__('subscriptions.renewal')}} <span style="color:red">{{__('subscriptions.no')}}</span></li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('subscription.checkout', ['plan' => 'freePlan']) }}" class="btn btn-success btn-block">{{__('subscriptions.subscribe')}}</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="text-center">{{__('subscriptions.starter_plan')}}</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <h5>{{__('subscriptions.starter_price')}}</h5>
                        <li>{{__('subscriptions.advertising')}} <span style="color:red">{{__('subscriptions.no')}}</span></li>
                        <li>{{__('subscriptions.comment')}} <span style="color:green">{{__('subscriptions.yes')}}</span></li>
                        <li>{{__('subscriptions.lessons')}} <span style="color:green">{{__('subscriptions.starter_lessons_count')}}</span></li>
                        <li>{{__('subscriptions.chat')}} <span style="color:green">{{__('subscriptions.yes')}}</span></li>
                        <li>{{__('subscriptions.discount')}} <span style="color:red">{{__('subscriptions.no')}}</span></li>
                        <li>{{__('subscriptions.shipping')}} <span style="color:green">{{__('subscriptions.starter_shipping')}}</span></li>
                        <li>{{__('subscriptions.rental_equipments')}} <span style="color:red">{{__('subscriptions.no')}}</span></li>
                        <li>{{__('subscriptions.invitations')}} <span style="color:green">{{__('subscriptions.yes')}}</span></li>
                        <li>{{__('subscriptions.referral_advantage')}} <span style="color:green">{{__('subscriptions.starter_referral')}}</span></li>
                        <li>{{__('subscriptions.renewal')}} <span style="color:red">{{__('subscriptions.no')}}</span></li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('subscription.checkout', ['plan' => 'starterPlan']) }}" class="btn btn-success btn-block">{{__('subscriptions.subscribe')}}</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="text-center">{{__('subscriptions.master_plan')}}</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <h5>{{__('subscriptions.master_price')}}</h5>
                        <li>{{__('subscriptions.advertising')}} <span style="color:red">{{__('subscriptions.no')}}</span></li>
                        <li>{{__('subscriptions.comment')}} <span style="color:green">{{__('subscriptions.yes')}}</span></li>
                        <li>{{__('subscriptions.lessons')}} <span style="color:green">{{__('subscriptions.starter_lessons_count')}}</span></li>
                        <li>{{__('subscriptions.chat')}} <span style="color:green">{{__('subscriptions.yes')}}</span></li>
                        <li>{{__('subscriptions.discount')}} <span style="color:green">{{__('subscriptions.yes')}}</span></li>
                        <li>{{__('subscriptions.shipping')}} <span style="color:green">{{__('subscriptions.master_shipping')}}</span></li>
                        <li>{{__('subscriptions.rental_equipments')}} <span style="color:green">{{__('subscriptions.yes')}}</span></li>
                        <li>{{__('subscriptions.invitations')}} <span style="color:green">{{__('subscriptions.yes')}}</span></li>
                        <li>{{__('subscriptions.referral_advantage')}} <span style="color:green">{{__('subscriptions.master_referral')}}</span></li>
                        <li>{{__('subscriptions.renewal')}} <span style="color:green">{{__('subscriptions.master_renewal')}}</span></li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('subscription.checkout', ['plan' => 'masterPlan']) }}" class="btn btn-success btn-block">{{__('subscriptions.subscribe')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
</body>
</html>
