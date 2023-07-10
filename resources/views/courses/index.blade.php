<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <title>Formation</title>
</head>
<body>
<div class="container">
    <h1>Formation</h1>

    <h2>{{ $formation->formation_titre }}</h2>
    <p>{{ $formation->formation_description }}</p>

    <h3>Chapitre 1: {{ $formation->chapitre1_titre }}</h3>
    <p>{{ $formation->chapitre1_cours }}</p>
    <p>{{ $formation->chapitre1_conclusion }}</p>

    <h3>Chapitre 2: {{ $formation->chapitre2_titre }}</h3>
    <p>{{ $formation->chapitre2_cours }}</p>
    <p>{{ $formation->chapitre2_conclusion }}</p>

    <h3>Chapitre 3: {{ $formation->chapitre3_titre }}</h3>
    <p>{{ $formation->chapitre3_cours }}</p>
    <p>{{ $formation->chapitre3_conclusion }}</p>

    <h3>Questions:</h3>
    <ol>
        <li>
            <p>{{ $formation->question1 }}</p>
            <ul>
                <li>{{ $formation->reponse1q1 }}</li>
                <li>{{ $formation->reponse2q1 }}</li>
                <li>{{ $formation->reponse3q1 }}</li>
                <li>{{ $formation->reponse4q1 }}</li>
            </ul>
        </li>
        <li>
            <p>{{ $formation->question2 }}</p>
            <ul>
                <li>{{ $formation->reponse1q2 }}</li>
                <li>{{ $formation->reponse2q2 }}</li>
                <li>{{ $formation->reponse3q2 }}</li>
                <li>{{ $formation->reponse4q2 }}</li>
            </ul>
        </li>
        <li>
            <p>{{ $formation->question3 }}</p>
            <ul>
                <li>{{ $formation->reponse1q3 }}</li>
                <li>{{ $formation->reponse2q3 }}</li>
                <li>{{ $formation->reponse3q3 }}</li>
                <li>{{ $formation->reponse4q3 }}</li>
            </ul>
        </li>
        <li>
            <p>{{ $formation->question4 }}</p>
            <ul>
                <li>{{ $formation->reponse1q4 }}</li>
                <li>{{ $formation->reponse2q4 }}</li>
                <li>{{ $formation->reponse3q4 }}</li>
                <li>{{ $formation->reponse4q4 }}</li>
            </ul>
        </li>
        <li>
            <p>{{ $formation->question5 }}</p>
            <ul>
                <li>{{ $formation->reponse1q5 }}</li>
                <li>{{ $formation->reponse2q5 }}</li>
                <li>{{ $formation->reponse3q5 }}</li>
                <li>{{ $formation->reponse4q5 }}</li>
            </ul>
        </li>
    </ol>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
