<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationData extends Model
{
    use HasFactory;

    protected $fillable = [
        'formation_titre',
        'formation_image',
        'formation_description',
        'chapitre1_titre',
        'chapitre1_cours',
        'chapitre1_conclusion',
        'chapitre2_titre',
        'chapitre2_cours',
        'chapitre2_conclusion',
        'chapitre3_titre',
        'chapitre3_cours',
        'chapitre3_conclusion',
        'question1',
        'reponse1q1',
        'reponse1q1_correcte',
        'reponse2q1',
        'reponse2q1_correcte',
        'reponse3q1',
        'reponse3q1_correcte',
        'reponse4q1',
        'reponse4q1_correcte',
        'question2',
        'reponse1q2',
        'reponse1q2_correcte',
        'reponse2q2',
        'reponse2q2_correcte',
        'reponse3q2',
        'reponse3q2_correcte',
        'reponse4q2',
        'reponse4q2_correcte',
        'question3',
        'reponse1q3',
        'reponse1q3_correcte',
        'reponse2q3',
        'reponse2q3_correcte',
        'reponse3q3',
        'reponse3q3_correcte',
        'reponse4q3',
        'reponse4q3_correcte',
        'question4',
        'reponse1q4',
        'reponse1q4_correcte',
        'reponse2q4',
        'reponse2q4_correcte',
        'reponse3q4',
        'reponse3q4_correcte',
    ];

    public function formation()
    {
        return $this->belongsTo(Event::class);
    }
}
