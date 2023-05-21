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
                        <li>{{__('Présence de publicité dans le contenu : Oui')}}</li>
                        <li>{{__('Commenter, publier des avis : Oui')}}</li>
                        <li>{{__('Accès aux leçons : 1 par jour')}}</li>
                        <li>{{__('Accès au service de tchat avec un chef : Non')}}</li>
                        <li>{{__('Réduction permanente de 5% dans la boutique : Non')}}</li>
                        <li>{{__('Livraison offerte sur la boutique : Non')}}</li>
                        <li>{{__('Accès au service de location d\'espace de cuisine : Non')}}</li>
                        <li>{{__('Invitation à des évènements exclusifs (dégustation, rencontres, ventes privées...) : Non')}}</li>
                        <li>{{__('Récompense cooptation nouvel inscrit : Non')}}</li>
                        <li>{{__('Bonus de renouvellement de l\'abonnement : Non')}}</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('subscription.subscribe', ['plan' => 'free']) }}"
                       class="btn btn-success btn-block">Souscrire</a>
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
                        <h5>{{__('Prix : 9,90/mois ou 113 euros par an')}}</h5>
                        <li>{{__('Présence de publicité dans le contenu : Non')}}</li>
                        <li>{{__('Commenter, publier des avis : Oui')}}</li>
                        <li>{{__('Accès aux leçons : 5 par jour')}}</li>
                        <li>{{__('Accès au service de tchat avec un chef : Oui')}}</li>
                        <li>{{__('Réduction permanente de 5% dans la boutique : Non')}}</li>
                        <li>{{__('Livraison offerte sur la boutique : Oui, en point relais uniquement')}}</li>
                        <li>{{__('Accès au service de location d\'espace de cuisine : Non')}}</li>
                        <li>{{__('Invitation à des évènements exclusifs (dégustation, rencontres, ventes privées...) : Oui')}}</li>
                        <li>{{__('Récompense cooptation nouvel inscrit : Oui, un chèque cadeau de 5 euros tous les 3 nouveaux inscrits (hors formule gratuite)')}}</li>
                        <li>{{__('Bonus de renouvellement de l\'abonnement : Non')}}</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('subscription.subscribe', ['plan' => 'starter']) }}"
                       class="btn btn-success btn-block">Souscrire</a>
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
                        <h5>{{__('Prix : 19/mois ou 220 euros par an')}}</h5>
                        <li>{{__('Présence de publicité dans le contenu : Non')}}</li>
                        <li>{{__('Commenter, publier des avis : Oui')}}</li>
                        <li>{{__('Accès aux leçons : illimité')}}</li>
                        <li>{{__('Accès au service de tchat avec un chef : Oui')}}</li>
                        <li>{{__('Réduction permanente de 5% dans la boutique : Oui')}}</li>
                        <li>{{__('Livraison offerte sur la boutique : Oui')}}</li>
                        <li>{{__('Accès au service de location d\'espace de cuisine : Oui')}}</li>
                        <li>{{__('Invitation à des évènements exclusifs (dégustation, rencontres, ventes privées...) : Oui')}}</li>
                        <li>{{__('Récompense cooptation nouvel inscrit : Oui, un chèque cadeau de 5 euros pour chaque nouvel inscrit (hors formule gratuite) + bonus de 3% du montant total de la première commande du nouvel inscrit')}}</li>
                        <li>{{__('Bonus de renouvellement de l\'abonnement : Oui, réduction de 10% du montant de l\'abonnement en cas de renouvellement (valable uniquement sur le tarif annuel)')}}</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="{{ route('subscription.subscribe', ['plan' => 'master']) }}"
                       class="btn btn-success btn-block">Souscrire</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
</body>
</html>
