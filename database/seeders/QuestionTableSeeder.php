<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\question;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        question::create([
            'title' => 'Wat zijn de positieve ervaringen die je hebt gehad met betrekking tot dit onderwerp?',
            'type' => 'open_question'
        ]);

        question::create([
            'title' => 'Wat is de impact geweest van deze ervaring? (Positief)',
            'type' => 'open_question'
        ]);

        question::create([
            'title' => 'Wat zijn de negatieve ervaringen die je hebt gehad met betrekking tot dit onderwerp?',
            'type' => 'open_question'
        ]);

        question::create([
            'title' => 'Wat is de impact geweest van deze ervaring? (Negatief)',
            'type' => 'open_question'
        ]);

        question::create([
            'title' => 'Hoe hebben andere mensen impact gehad op jouw ervaringen?',
            'type' => 'open_question'
        ]);

        question::create([
            'title' => 'Wat is een grote uitdaging waar je tegenaan bent gelopen met betrekking tot dit onderwerp?',
            'type' => 'open_question'
        ]);

        question::create([
            'title' => 'Hoe heb je deze uitdaging overwonnen?',
            'type' => 'open_question'
        ]);

        question::create([
            'title' => 'Wat is een voorbeeld van een gebeurtenis die je overtuigingen met betrekking tot dit onderwerp heeft doen veranderen?',
            'type' => 'open_question'
        ]);

        question::create([
            'title' => 'Op een schaal van 1 - 10, wat is je ervaring met dit onderwerp? (0 = negatief, 10 = positief)',
            'type' => 'scale_question'
        ]);

        question::create([
            'title' => 'Op een schaal van 1 - 10, Hoeveel stress ervaar je met dit onderwerp? (0 = negatief, 10 = positief)',
            'type' => 'scale_question'
        ]);

        question::create([
            'title' => 'Op een schaal van 1 - 10, hoeveel ervaring heb je met dit onderwerpn? (0 = weinig, 10 = veel)',
            'type' => 'scale_question'
        ]);

        question::create([
            'title' => 'Wat is je ervaring met dit onderwerp?',
            'type' => 'multiple_choice_question'
        ]);

        question::create([
            'title' => 'Hoeveel invloed hebben andere mensen op je ervaringen met dit onderwerp?',
            'type' => 'multiple_choice_question'
        ]);

        question::create([
            'title' => 'Hoeveel waarde hecht je aan dit onderwerp?',
            'type' => 'multiple_choice_question'
        ]);
    }
}
