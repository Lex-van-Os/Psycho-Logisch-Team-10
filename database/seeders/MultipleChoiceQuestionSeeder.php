<?php

namespace Database\Seeders;

use App\Models\question;
use App\Models\question_option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MultipleChoiceQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $multipleChoiceQuestion = question::create([
            'title' => 'Wat is je ervaring met dit onderwerp?',
            'type' => 'multiple_choice_question',
            'instruction' => 'Kies een van de onderstaande opties',
        ]);

        question_option::create([
            'text' => 'Positief',
            'value' => '3',
            'question_id' => $multipleChoiceQuestion->id
        ]);

        question_option::create([
            'text' => 'Neutraal',
            'value' => '2',
            'question_id' => $multipleChoiceQuestion->id
        ]);

        question_option::create([
            'text' => 'Negatief',
            'value' => '1',
            'question_id' => $multipleChoiceQuestion->id
        ]);

        $multipleChoiceQuestion = question::create([
            'title' => 'Hoeveel invloed hebben andere mensen op je ervaringen met dit onderwerp?',
            'type' => 'multiple_choice_question',
            'instruction' => 'Kies een van de onderstaande opties',
        ]);

        question_option::create([
            'text' => 'Veel invloed',
            'value' => '3',
            'question_id' => $multipleChoiceQuestion->id
        ]);

        question_option::create([
            'text' => 'Gemiddeld',
            'value' => '2',
            'question_id' => $multipleChoiceQuestion->id
        ]);

        question_option::create([
            'text' => 'Weinig invloed',
            'value' => '1',
            'question_id' => $multipleChoiceQuestion->id
        ]);

        $multipleChoiceQuestion = question::create([
            'title' => 'Hoeveel waarde hecht je aan dit onderwerp?',
            'type' => 'multiple_choice_question',
            'instruction' => 'Hoe belangrijk is dit onderwerp voor jou? Kies een van de onderstaande opties',
        ]);

        question_option::create([
            'text' => 'Veel waarde',
            'value' => '3',
            'question_id' => $multipleChoiceQuestion->id
        ]);

        question_option::create([
            'text' => 'Gemiddeld',
            'value' => '2',
            'question_id' => $multipleChoiceQuestion->id
        ]);

        question_option::create([
            'text' => 'Weinig waarde',
            'value' => '1',
            'question_id' => $multipleChoiceQuestion->id
        ]);
    }
}
