<!DOCTYPE html>
<html lang="fr">
@include('layouts.navbar')
<body>
<div class="container">

    <h2 style="text-align: center">{{ $formation->formation_titre }}</h2>
    <p style="text-align: center">{{ $formation->formation_description }}</p>

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
    <form action="{{ route('courses.submit' , ['course_id' => $formation->formation_id]) }}" method="POST">
        @csrf
        <ol>
            <li>
                <p>{{ $formation->question1 }}</p>
                <ul>
                    <li>
                        <label>
                            <input type="radio" name="question1" value="reponse1q1_correcte">
                            {{ $formation->reponse1q1 }}
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="question1" value="reponse2q1_correcte">
                            {{ $formation->reponse2q1 }}
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="question1" value="reponse3q1_correcte">
                            {{ $formation->reponse3q1 }}
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="question1" value="reponse4q1_correcte">
                            {{ $formation->reponse4q1 }}
                        </label>
                    </li>
                </ul>
            </li>
            <li>
                <p>{{ $formation->question2 }}</p>
                <ul>
                    <li>
                        <label>
                            <input type="radio" name="question2" value="reponse1q2_correcte">
                            {{ $formation->reponse1q2 }}
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="question2" value="reponse2q2_correcte">
                            {{ $formation->reponse2q2 }}
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="question2" value="reponse3q2_correcte">
                            {{ $formation->reponse3q2 }}
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="question2" value="reponse4q2_correcte">
                            {{ $formation->reponse4q2 }}
                        </label>
                    </li>
                </ul>
            </li>
            <li>
                <p>{{ $formation->question3 }}</p>
                <ul>
                    <li>
                        <label>
                            <input type="radio" name="question3" value="reponse1q3_correcte">
                            {{ $formation->reponse1q3 }}
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="question3" value="reponse2q3_correcte">
                            {{ $formation->reponse2q3 }}
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="question3" value="reponse3q3_correcte">
                            {{ $formation->reponse3q3 }}
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="question3" value="reponse4q3_correcte">
                            {{ $formation->reponse4q3 }}
                        </label>
                    </li>
                </ul>
            </li>
            <li>
                <p>{{ $formation->question4 }}</p>
                <ul>
                    <li>
                        <label>
                            <input type="radio" name="question4" value="reponse1q4_correcte">
                            {{ $formation->reponse1q4 }}
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="question4" value="reponse2q4_correcte">
                            {{ $formation->reponse2q4 }}
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="question4" value="reponse3q4_correcte">
                            {{ $formation->reponse3q4 }}
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="question4" value="reponse4q4_correcte">
                            {{ $formation->reponse4q4 }}
                        </label>
                    </li>
                </ul>
            </li>
            <li>
                <p>{{ $formation->question5 }}</p>
                <ul>
                    <li>
                        <label>
                            <input type="radio" name="question5" value="reponse1q5">
                            {{ $formation->reponse1q5 }}
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="question5" value="reponse2q5">
                            {{ $formation->reponse2q5 }}
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="question5" value="reponse3q5">
                            {{ $formation->reponse3q5 }}
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="question5" value="reponse4q5">
                            {{ $formation->reponse4q5 }}
                        </label>
                    </li>
                </ul>
            </li>
        </ol>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
@include('layouts.footer')
</html>
