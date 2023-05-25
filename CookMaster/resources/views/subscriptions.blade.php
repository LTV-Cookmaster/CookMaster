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
                    <h3 class="text-center">Formule gratuite</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <h5>{{__('Prix : Gratuit')}}</h5>
                        <li>{{__('Présence de publicité dans le contenu :')}} <span style="color:red">{{__('Oui')}}</span></li>
                        <li>{{__('Commenter, publier des avis :')}} <span style="color:green">{{__('Oui')}}</span></li>
                        <li>{{__('Accès aux leçons :')}} <span style="color:green">{{__('1 par jour')}}</span></li>
                        <li>{{__('Accès au service de tchat avec un chef :')}} <span style="color:red">{{__('Non')}}</span></li>
                        <li>{{__('Réduction permanente de 5% dans la boutique :')}} <span style="color:red">{{__('Non')}}</span></li>
                        <li>{{__('Livraison offerte sur la boutique :')}} <span style="color:red">{{__('Non')}}</span></li>
                        <li>{{__('Accès au service de location d\'espace de cuisine :')}} <span style="color:red">{{__('Non')}}</span></li>
                        <li>{{__('Invitation à des évènements exclusifs (dégustation, rencontres, ventes privées...) :')}} <span style="color:red">{{__('Non')}}</span></li>
                        <li>{{__('Récompense cooptation nouvel inscrit :')}} <span style="color:red">{{__('Non')}}</span></li>
                        <li>{{__('Bonus de renouvellement de l\'abonnement :')}} <span style="color:red">{{__('Non')}}</span></li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('subscription.checkout', ['plan' => 'freePlan']) }}" class="btn btn-success btn-block">Souscrire</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="text-center">Formule starter</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <h5>{{__('Prix : 9,90€/mois ou 113€/an')}}</h5>
                        <li>{{__('Présence de publicité dans le contenu :')}} <span style="color:green">{{__('Non')}}</span></li>
                        <li>{{__('Commenter, publier des avis :')}} <span style="color:green">{{__('Oui')}}</span></li>
                        <li>{{__('Accès aux leçons :')}} <span style="color:green">{{__('5 par jour')}}</span></li>
                        <li>{{__('Accès au service de tchat avec un chef :')}} <span style="color:green">{{__('Oui')}}</span></li>
                        <li>{{__('Réduction permanente de 5% dans la boutique :')}} <span style="color:red">{{__('Non')}}</span></li>
                        <li>{{__('Livraison offerte sur la boutique :')}} <span style="color:green">{{__('Oui, en point relais uniquement')}}</span></li>
                        <li>{{__('Accès au service de location d\'espace de cuisine :')}} <span style="color:red">{{__('Non')}}</span></li>
                        <li>{{__('Invitation à des évènements exclusifs (dégustation, rencontres, ventes privées...) :')}} <span style="color:green">{{__('Oui')}}</span></li>
                        <li>{{__('Récompense cooptation nouvel inscrit :')}} <span style="color:green">{{__('Oui, un chèque cadeau de 5 euros tous les 3 nouveaux inscrits (hors formule gratuite)')}}</span></li>
                        <li>{{__('Bonus de renouvellement de l\'abonnement :')}} <span style="color:red">{{__('Non')}}</span></li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('subscription.checkout', ['plan' => 'starterPlan']) }}" class="btn btn-success btn-block">Souscrire</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="text-center">Formule master</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <h5>{{__('Prix : 19€/mois ou 220€/an')}}</h5>
                        <li>{{__('Présence de publicité dans le contenu :')}} <span style="color:green">{{__('Non')}}</span></li>
                        <li>{{__('Commenter, publier des avis :')}} <span style="color:green">{{__('Oui')}}</span></li>
                        <li>{{__('Accès aux leçons :')}} <span style="color:green">{{__('illimité')}}</span></li>
                        <li>{{__('Accès au service de tchat avec un chef :')}} <span style="color:green">{{__('Oui')}}</span></li>
                        <li>{{__('Réduction permanente de 5% dans la boutique :')}} <span style="color:green">{{__('Oui')}}</span></li>
                        <li>{{__('Livraison offerte sur la boutique :')}} <span style="color:green">{{__('Oui')}}</span></li>
                        <li>{{__('Accès au service de location d\'espace de cuisine :')}} <span style="color:green">{{__('Oui')}}</span></li>
                        <li>{{__('Invitation à des évènements exclusifs (dégustation, rencontres, ventes privées...) :')}} <span style="color:green">{{__('Oui')}}</span></li>
                        <li>{{__('Récompense cooptation nouvel inscrit :')}} <span style="color:green">{{__('Oui, un chèque cadeau de 5 euros pour chaque nouvel inscrit (hors formule gratuite) + bonus de 3% du montant total de la première commande du nouvel inscrit')}}</span></li>
                        <li>{{__('Bonus de renouvellement de l\'abonnement :')}} <span style="color:green">{{__('Oui, réduction de 10% du montant de l\'abonnement en cas de renouvellement (valable uniquement sur le tarif annuel)')}}</span></li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('subscription.checkout', ['plan' => 'masterPlan']) }}" class="btn btn-success btn-block">Souscrire</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
</body>
</html>
