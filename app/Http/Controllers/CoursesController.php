<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\FormationData;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;
use Barryvdh\DomPDF\Facade\Pdf;


class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $reservations = Reservation::where('user_id', $user->id)->get();
        $events = [];
        foreach ($reservations as $reservation){
            $event = $reservation->event;
            if($event->type == 'professionalFormation'){
                $events[] = $event;
            }
        }
        return view('courses', [
            'events' => $events
        ]);
    }

    public function list() {
        $user = Auth::user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        $professionalFormations = Event::where('type', 'professionalFormation')->paginate(25);
        foreach ($professionalFormations as $professionalFormation){
            $formationData = FormationData::where('formation_id', $professionalFormation->id)->first();
            $professionalFormation->formationData = $formationData;
        }

        return view('courses.list', [
            'courses' => $professionalFormations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        $professionalFormations = Event::where('type', 'professionalFormation')->get();
        $defaultValue = 'Lorem Ipsum';
        return view('courses.create', [
            'courses' => $professionalFormations,
            'defaultValue' => $defaultValue
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create a new FormData instance
        $formData = new FormationData();

        $formData->id = \Illuminate\Support\Str::uuid();
        $formData->formation_id = $request->input('course_id');
        $formData->formation_titre = $request->input('formationTitre');
        $formData->formation_description = $request->input('formationDescription');
        $formData->chapitre1_titre = $request->input('chapitre1Titre');
        $formData->chapitre1_cours = $request->input('chapitre1Cours');
        $formData->chapitre1_conclusion = $request->input('chapitre1Conclusion');
        $formData->chapitre2_titre = $request->input('chapitre2Titre');
        $formData->chapitre2_cours = $request->input('chapitre2Cours');
        $formData->chapitre2_conclusion = $request->input('chapitre2Conclusion');
        $formData->chapitre3_titre = $request->input('chapitre3Titre');
        $formData->chapitre3_cours = $request->input('chapitre3Cours');
        $formData->chapitre3_conclusion = $request->input('chapitre3Conclusion');
        $formData->question1 = $request->input('question1');
        $formData->reponse1q1 = $request->input('reponse1q1');
        $formData->reponse1q1_correcte = $request->has('reponse1q1_correcte');
        $formData->reponse2q1 = $request->input('reponse2q1');
        $formData->reponse2q1_correcte = $request->has('reponse2q1_correcte');
        $formData->reponse3q1 = $request->input('reponse3q1');
        $formData->reponse3q1_correcte = $request->has('reponse3q1_correcte');
        $formData->reponse4q1 = $request->input('reponse4q1');
        $formData->reponse4q1_correcte = $request->has('reponse4q1_correcte');
        $formData->question2 = $request->input('question2');
        $formData->reponse1q2 = $request->input('reponse1q2');
        $formData->reponse1q2_correcte = $request->has('reponse1q2_correcte');
        $formData->reponse2q2 = $request->input('reponse2q2');
        $formData->reponse2q2_correcte = $request->has('reponse2q2_correcte');
        $formData->reponse3q2 = $request->input('reponse3q2');
        $formData->reponse3q2_correcte = $request->has('reponse3q2_correcte');
        $formData->reponse4q2 = $request->input('reponse4q2');
        $formData->reponse4q2_correcte = $request->has('reponse4q2_correcte');
        $formData->question3 = $request->input('question3');
        $formData->reponse1q3 = $request->input('reponse1q3');
        $formData->reponse1q3_correcte = $request->has('reponse1q3_correcte');
        $formData->reponse2q3 = $request->input('reponse2q3');
        $formData->reponse2q3_correcte = $request->has('reponse2q3_correcte');
        $formData->reponse3q3 = $request->input('reponse3q3');
        $formData->reponse3q3_correcte = $request->has('reponse3q3_correcte');
        $formData->reponse4q3 = $request->input('reponse4q3');
        $formData->reponse4q3_correcte = $request->has('reponse4q3_correcte');
        $formData->question4 = $request->input('question4');
        $formData->reponse1q4 = $request->input('reponse1q4');
        $formData->reponse1q4_correcte = $request->has('reponse1q4_correcte');
        $formData->reponse2q4 = $request->input('reponse2q4');
        $formData->reponse2q4_correcte = $request->has('reponse2q4_correcte');
        $formData->reponse3q4 = $request->input('reponse3q4');
        $formData->reponse3q4_correcte = $request->has('reponse3q4_correcte');
        $formData->reponse4q4 = $request->input('reponse4q4');
        $formData->reponse4q4_correcte = $request->has('reponse4q4_correcte');
        $formData->question5 = $request->input('question5');
        $formData->reponse1q5 = $request->input('reponse1q5');
        $formData->reponse1q5_correcte = $request->has('reponse1q5_correcte');
        $formData->reponse2q5 = $request->input('reponse2q5');
        $formData->reponse2q5_correcte = $request->has('reponse2q5_correcte');
        $formData->reponse3q5 = $request->input('reponse3q5');
        $formData->reponse3q5_correcte = $request->has('reponse3q5_correcte');
        $formData->reponse4q5 = $request->input('reponse4q5');
        $formData->reponse4q5_correcte = $request->has('reponse4q5_correcte');

        // Save the form data to the database
        $formData->save();

        // Redirect or return a response
        return redirect()->route('courses.list')->with('success', 'Formation créée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function view(Request $request)
    {
        $course_id = $request->route('course_id');
        $formation = FormationData::where('formation_id', $course_id)->first();
        return view('courses.index', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function submit(Request $request, string $id)
    {
        $course_id = $request->route('course_id');
        $formation = FormationData::where('formation_id', $course_id)->first();
        $counter = 0;
        $question1Answer = $request->input('question1');
        $question2Answer = $request->input('question2');
        $question3Answer = $request->input('question3');
        $question4Answer = $request->input('question4');
        $question5Answer = $request->input('question5');
        if ($formation->$question1Answer == 1) {
            $counter++;
        }
        if ($formation->$question2Answer == 1) {
            $counter++;
        }
        if ($formation->$question3Answer == 1) {
            $counter++;
        }
        if ($formation->$question4Answer == 1) {
            $counter++;
        }
        if ($formation->$question5Answer == 1) {
            $counter++;
        }

        if($counter >= 3) {
            $user = Auth::user();
            $event = Event::where('id', $course_id)->first();
            $pdf = Pdf::loadView('pdf.diplome', compact('user', 'event'));
            redirect()->route('home')->with('success', 'Bravo ! Vous avez réussi le test !');
            return $pdf->download($event->name.'.pdf');
        } else {
            return redirect()->route('home')->with('error', 'Désolé ! Vous avez échoué le test !');
    }
}}
