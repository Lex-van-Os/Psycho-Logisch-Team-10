<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\question;
use App\Models\reflection_question;

class OpenQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Past

        $pastQuestion = question::create([
            'title' => 'Wat zijn de positieve ervaringen die je hebt gehad met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $pastQuestion = question::create([
            'title' => 'Wat is de impact geweest van deze ervaring? (Positief)',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $pastQuestion = question::create([
            'title' => 'Wat zijn de negatieve ervaringen die je hebt gehad met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $pastQuestion = question::create([
            'title' => 'Wat is de impact geweest van deze ervaring? (Negatief)',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $pastQuestion = question::create([
            'title' => 'Hoe hebben andere mensen impact gehad op jouw ervaringen?',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $pastQuestion = question::create([
            'title' => 'Wat is een grote uitdaging waar je tegenaan bent gelopen met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $pastQuestion = question::create([
            'title' => 'Hoe heb je deze uitdaging overwonnen?',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $pastQuestion = question::create([
            'title' => 'Wat is een voorbeeld van een gebeurtenis die je overtuigingen met betrekking tot dit onderwerp heeft doen veranderen?',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $pastQuestion = question::create([
            'title' => 'Is er ooit een gebeurtenis geweest waar je geen invloed op had, omdat het buiten je controle was?',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $pastQuestion = question::create([
            'title' => 'Is er een moment geweest met betrekking tot dit onderwerp dat je anders had kunnen aanpakken?',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        // Present

        $presentQuestion = question::create([
            'title' => 'Hoe ga je momenteel om met dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'present'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $presentQuestion = question::create([
            'title' => 'Wat is je (on)tevredenheid met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'present'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $presentQuestion = question::create([
            'title' => 'Wat is een belangrijke recente situatie geweest met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'present'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $presentQuestion = question::create([
            'title' => 'Zijn er patronen die je opvallen met jouw omgang met dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'present'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $presentQuestion = question::create([
            'title' => 'Hoe vergelijkt jouw huidige blik op dit onderwerp vergeleken met in het verleden?',
            'type' => 'open_question',
            'ref_type' => 'present'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $presentQuestion = question::create([
            'title' => 'Hoe zou je zelf je huidige ervaringen met dit onderwerp willen veranderen?',
            'type' => 'open_question',
            'ref_type' => 'present'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        // Future

        $presentQuestion = question::create([
            'title' => 'Wat zijn dingen die je zou willen veranderen?',
            'type' => 'open_question',
            'ref_type' => 'future'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);
        
        $presentQuestion = question::create([
            'title' => 'Hoe zou je leven veranderen als je deze veranderingen doorvoert?',
            'type' => 'open_question',
            'ref_type' => 'future'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $presentQuestion = question::create([
            'title' => 'Hoe zouden anderen naar je kijken, met verandering?',
            'type' => 'open_question',
            'ref_type' => 'future'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $presentQuestion = question::create([
            'title' => 'Wat voor sociale impact zou je verandering kunnen hebben?',
            'type' => 'open_question',
            'ref_type' => 'future'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $presentQuestion = question::create([
            'title' => 'Wat is je (on)tevredenheid met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'future'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $presentQuestion = question::create([
            'title' => 'Wat voor dingen zouden er moeten veranderen om een verandering te maken?',
            'type' => 'open_question',
            'ref_type' => 'future'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);

        $presentQuestion = question::create([
            'title' => 'Wat zijn dagelijkse of wekelijkse gewoontes die zouden bijdragen aan deze verandering?',
            'type' => 'open_question',
            'ref_type' => 'future'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => 1
        ]);
    }
}
