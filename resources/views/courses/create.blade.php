<!DOCTYPE html>
<html>
@include('layouts.navbar')
<body>
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container">
    <form name="formationForm" action="{{ route('courses.store' , ['course_id' , $course_id]) }}" >
        @method('POST')
        @csrf
{{--        <div class="mb-3">
            <select class="form-select" name="course_id">
                <option value="default">Select formation</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>--}}
        <input type="text" class="form-control" name="course_id" style="display: none" value="{{ $course_id }}">

        <h2>Formation</h2>
        <div class="mb-3">
            <label for="formationTitre" class="form-label">Titre de la formation</label>
            <input type="text" class="form-control" name="formationTitre" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
        </div>
        <div class="mb-3">
            <label for="formationDescription" class="form-label">Description</label>
            <textarea class="form-control" name="formationDescription" rows="3" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">{{ old('formationTitre', $defaultValue) }}</textarea>
        </div>

        <h2>Chapitre 1</h2>
        <div class="mb-3">
            <label for="chapitre1Titre" class="form-label">Titre du chapitre</label>
            <input type="text" class="form-control" name="chapitre1Titre" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
        </div>
        <div class="mb-3">
            <label for="chapitre1Cours" class="form-label">Cours</label>
            <textarea class="form-control" name="chapitre1Cours" rows="5" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">{{ old('formationTitre', $defaultValue) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="chapitre1Conclusion" class="form-label">Conclusion</label>
            <textarea class="form-control" name="chapitre1Conclusion" rows="3" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">{{ old('formationTitre', $defaultValue) }}</textarea>
        </div>

        <h2>Chapitre 2</h2>
        <div class="mb-3">
            <label for="chapitre2Titre" class="form-label">Titre du chapitre</label>
            <input type="text" class="form-control" name="chapitre2Titre" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
        </div>
        <div class="mb-3">
            <label for="chapitre2Cours" class="form-label">Cours</label>
            <textarea class="form-control" name="chapitre2Cours" rows="5" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">{{ old('formationTitre', $defaultValue) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="chapitre2Conclusion" class="form-label">Conclusion</label>
            <textarea class="form-control" name="chapitre2Conclusion" rows="3" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">{{ old('formationTitre', $defaultValue) }}</textarea>
        </div>

        <h2>Chapitre 3</h2>
        <div class="mb-3">
            <label for="chapitre3Titre" class="form-label">Titre du chapitre</label>
            <input type="text" class="form-control" name="chapitre3Titre" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
        </div>
        <div class="mb-3">
            <label for="chapitre3Cours" class="form-label">Cours</label>
            <textarea class="form-control" name="chapitre3Cours" rows="5" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">{{ old('formationTitre', $defaultValue) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="chapitre3Conclusion" class="form-label">Conclusion</label>
            <textarea class="form-control" name="chapitre3Conclusion" rows="3" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">{{ old('formationTitre', $defaultValue) }}</textarea>
        </div>
        <h2>Quizz</h2>

        <div class="mb-3">
            <label for="question1" class="form-label"><strong>Question 1</strong></label>
            <input type="text" class="form-control question" name="question1" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
        </div>
        <div class="mb-3">
            <label for="reponse1q1" class="form-label">Réponse 1</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse1q1" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 1 correcte" autocompleted >
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="reponse2q1" class="form-label">Réponse 2</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse2q1" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 2 correcte">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="reponse3q1" class="form-label">Réponse 3</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse3q1" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 3 correcte">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="reponse4q1" class="form-label">Réponse 4</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse4q1" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 4 correcte">
                </div>
            </div>
        </div>



        <div class="mb-3">
            <label for="question2" class="form-label"><strong>Question 2</strong></label>
            <input type="text" class="form-control question" name="question2" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
        </div>
        <div class="mb-3">
            <label for="reponse1q2" class="form-label">Réponse 1</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse1q2" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 1 correcte" autocompleted>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="reponse2q2" class="form-label">Réponse 2</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse2q2" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 2 correcte">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="reponse3q2" class="form-label">Réponse 3</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse3q2" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 3 correcte">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="reponse4q2" class="form-label">Réponse 4</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse4q2" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 4 correcte">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="question3" class="form-label"><strong>Question 3</strong></label>
            <input type="text" class="form-control question" name="question3" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
        </div>
        <div class="mb-3">
            <label for="reponse1q3" class="form-label">Réponse 1</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse1q3" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 1 correcte" autocompleted>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="reponse2q3" class="form-label">Réponse 2</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse2q3" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 2 correcte">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="reponse3q3" class="form-label">Réponse 3</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse3q3" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 3 correcte">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="reponse4q3" class="form-label">Réponse 4</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse4q3" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 4 correcte">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="question4" class="form-label"><strong>Question 4</strong></label>
            <input type="text" class="form-control question" name="question4" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
        </div>
        <div class="mb-3">
            <label for="reponse1q4" class="form-label">Réponse 1</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse1q4" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 1 correcte" autocompleted>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="reponse2q4" class="form-label">Réponse 2</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse2q4" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 2 correcte">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="reponse3q4" class="form-label">Réponse 3</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse3q4" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 3 correcte">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="reponse4q4" class="form-label">Réponse 4</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse4q4" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 4 correcte">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="question5" class="form-label"><strong>Question 5</strong></label>
            <input type="text" class="form-control question" name="question5" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
        </div>
        <div class="mb-3">
            <label for="reponse1q5" class="form-label">Réponse 1</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse1q5" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 1 correcte" autocompleted>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="reponse2q5" class="form-label">Réponse 2</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse2q5" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 2 correcte">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="reponse3q5" class="form-label">Réponse 3</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse3q5" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 3 correcte">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="reponse4q5" class="form-label">Réponse 4</label>
            <div class="input-group">
                <input type="text" class="form-control" name="reponse4q5" {{--required--}} value="{{ old('formationTitre', $defaultValue) }}">
                <div class="input-group-text">
                    <input type="checkbox" aria-label="Réponse 4 correcte">
                </div>
            </div>
        </div>

        <style>
            .question {
                font-weight: bold;
            }
            .form-label {
                font-size: 14px;
            }
        </style>




        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
</div>
</body>
{{--<script>
    document.getElementById('formationForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche l'envoi du formulaire

        // Récupération des valeurs des champs de formulaire
        var formationTitre = document.getElementById('formationTitre').value;
        var formationImage = document.getElementById('formationImage').value;
        var formationDescription = document.getElementById('formationDescription').value;

        // Tableau des chapitres
        var chapitres = [];

        // Récupération des chapitres
        for (var i = 1; i <= 3; i++) {
            var chapitreTitre = document.getElementById('chapitre' + i + 'Titre').value;
            var chapitreCours = document.getElementById('chapitre' + i + 'Cours').value;
            var chapitreConclusion = document.getElementById('chapitre' + i + 'Conclusion').value;

            // Création de l'objet chapitre et ajout au tableau
            var chapitre = {
                titre: chapitreTitre,
                cours: chapitreCours,
                conclusion: chapitreConclusion
            };
            chapitres.push(chapitre);
        }

        // Tableau des questions du quizz
        var questions = [];

        // Récupération des questions du quizz
        for (var i = 1; i <= 5; i++) {
            var question = document.getElementById('question' + i).value;

            // Tableau des réponses de la question
            var reponses = [];

            // Récupération des réponses de la question
            for (var j = 1; j <= 4; j++) {
                var reponseTexte = document.getElementById('reponse' + j + 'q' + i).value;
                var reponseCorrecte = document.querySelector('#reponse' + j + 'q' + i + 'Checkbox:checked') !== null;

                // Création de l'objet réponse et ajout au tableau
                var reponse = {
                    texte: reponseTexte,
                    correcte: reponseCorrecte
                };
                reponses.push(reponse);
            }

            // Création de l'objet question et ajout au tableau
            var questionObj = {
                question: question,
                reponses: reponses
            };
            questions.push(questionObj);
        }

        // Création de l'objet JSON
        var formationData = {
            formation: {
                titre: formationTitre,
                image: formationImage,
                description: formationDescription
            },
            chapitres: chapitres,
            quizz: questions
        };

        var formationDataJSON = JSON.stringify(formationData);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/admin/course/store',
            type: 'POST',
            data: {formationData: formationDataJSON},
            success: function(response) {
                // Traitement de la réponse du contrôleur
                console.log(response);
            },
            error: function(error) {
                // Gestion des erreurs
                console.log(error);
            }
        });




    });
</script>--}}

@include('layouts.footer')
</html>
