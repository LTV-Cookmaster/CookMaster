<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .diploma {
            text-align: center;
        }

        .diploma h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .diploma h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .diploma p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .diploma .logo {
            margin-bottom: 30px;
        }

        .diploma .signature {
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="diploma">
    <div class="logo">
        <img src="logo.png" style="width: 200px">
    </div>
    <h1>Diplôme de Cookmaster</h1>
    <h2>Décerné à</h2>
    <p><strong>{{ $user->name }}</strong></p>
    <p>Pour avoir complété avec succès les exigences du programme</p>
    <p><em>{{ $event->name }}</em></p>
    @php
        use Carbon\Carbon;
        use Carbon\CarbonInterface;
        use Illuminate\Support\Facades\Date;
        $date = Date::parse($diploma->created_at);
        Carbon::setLocale('fr');
        $formattedDate = $date->isoFormat('D MMMM YYYY [à] HH\hmm');
    @endphp
    <p>Le {{ $formattedDate }}</p>
    <p>Avec un score de <span style="color: green">{{ $diploma->score }}/5</span></p>
    <div class="signature">
        <img src="signature.png" alt="Signature du Directeur">
        <p><strong>Anthony Pitoun</strong></p>
        <p>Directeur de Cookmaster</p>
    </div>
</div>
</body>
</html>
