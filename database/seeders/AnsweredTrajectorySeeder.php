<?php

namespace Database\Seeders;

use App\Models\reflection_progression;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reflection;
use App\Models\question;
use App\Models\reflection_question;
use App\Models\reflection_trajectory;
use App\Models\User;

class ReflectionTrajectorySeeder extends Seeder
{
    /**
     * Seeder for an entire reflection trajectory (user, trajectory, reflection, questions)
     */
    public function run(): void
    {
        // Create a demo user to link the trajectory to
        $demoUser = User::create([
            'name' => 'demouser',
            'email'=> 'demo@demo.nl',
            'password' => 'demouser'
        ]);

        // Create a demo trajectory
        $demoTrajectory = reflection_trajectory::create([
            'title' => 'Demo trajectory',
            'user_id' => $demoUser->id
        ]);

        // Create the three different types of trajectory. Corresponding questions will be linked
        $pastReflection = Reflection::create([
            'reflection_type' => 'past',
            'reflection_trajectory_id' => $demoTrajectory->id
        ]);

        $presentReflection = Reflection::create([
            'reflection_type' => 'present',
            'reflection_trajectory_id' => $demoTrajectory->id
        ]);

        $futureReflection = Reflection::create([
            'reflection_type' => 'future',
            'reflection_trajectory_id' => $demoTrajectory->id
        ]);

        // Past reflection questions

        $pastQuestion = question::create([
            'title' => 'Wat zijn de positieve ervaringen die je hebt gehad met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Wat is de impact geweest van deze ervaring? (Positief)',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Wat zijn de negatieve ervaringen die je hebt gehad met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Wat is de impact geweest van deze ervaring? (Negatief)',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Hoe hebben andere mensen impact gehad op jouw ervaringen?',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Wat is een grote uitdaging waar je tegenaan bent gelopen met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Hoe heb je deze uitdaging overwonnen?',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Wat is een voorbeeld van een gebeurtenis die je overtuigingen met betrekking tot dit onderwerp heeft doen veranderen?',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Is er ooit een gebeurtenis geweest waar je geen invloed op had, omdat het buiten je controle was?',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Is er een moment geweest met betrekking tot dit onderwerp dat je anders had kunnen aanpakken?',
            'type' => 'open_question',
            'ref_type' => 'past'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        // Present reflection questions

        $presentQuestion = question::create([
            'title' => 'Hoe ga je momenteel om met dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'present'
        ]);

        reflection_question::create([
            'question_id' => $presentQuestion->id,
            'reflection_id' => $presentReflection->id
        ]);

        $presentQuestion = question::create([
            'title' => 'Wat is je (on)tevredenheid met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'present'
        ]);

        reflection_question::create([
            'question_id' => $presentQuestion->id,
            'reflection_id' => $presentReflection->id
        ]);

        $presentQuestion = question::create([
            'title' => 'Wat is een belangrijke recente situatie geweest met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'present'
        ]);

        reflection_question::create([
            'question_id' => $presentQuestion->id,
            'reflection_id' => $presentReflection->id
        ]);

        $presentQuestion = question::create([
            'title' => 'Zijn er patronen die je opvallen met jouw omgang met dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'present'
        ]);

        reflection_question::create([
            'question_id' => $presentQuestion->id,
            'reflection_id' => $presentReflection->id
        ]);

        $presentQuestion = question::create([
            'title' => 'Hoe vergelijkt jouw huidige blik op dit onderwerp vergeleken met in het verleden?',
            'type' => 'open_question',
            'ref_type' => 'present'
        ]);

        reflection_question::create([
            'question_id' => $presentQuestion->id,
            'reflection_id' => $presentReflection->id
        ]);

        $presentQuestion = question::create([
            'title' => 'Hoe zou je zelf je huidige ervaringen met dit onderwerp willen veranderen?',
            'type' => 'open_question',
            'ref_type' => 'present'
        ]);

        reflection_question::create([
            'question_id' => $presentQuestion->id,
            'reflection_id' => $presentReflection->id
        ]);

        // Future reflection questions

        $futureQuestion = question::create([
            'title' => 'Wat zijn dingen die je zou willen veranderen?',
            'type' => 'open_question',
            'ref_type' => 'future'
        ]);

        reflection_question::create([
            'question_id' => $futureQuestion->id,
            'reflection_id' => $futureReflection->id
        ]);
        
        $futureQuestion = question::create([
            'title' => 'Hoe zou je leven veranderen als je deze veranderingen doorvoert?',
            'type' => 'open_question',
            'ref_type' => 'future'
        ]);

        reflection_question::create([
            'question_id' => $futureQuestion->id,
            'reflection_id' => $futureReflection->id
        ]);

        $futureQuestion = question::create([
            'title' => 'Hoe zouden anderen naar je kijken, met verandering?',
            'type' => 'open_question',
            'ref_type' => 'future'
        ]);

        reflection_question::create([
            'question_id' => $futureQuestion->id,
            'reflection_id' => $futureReflection->id
        ]);

        $futureQuestion = question::create([
            'title' => 'Wat voor sociale impact zou je verandering kunnen hebben?',
            'type' => 'open_question',
            'ref_type' => 'future'
        ]);

        reflection_question::create([
            'question_id' => $futureQuestion->id,
            'reflection_id' => $futureReflection->id
        ]);

        $futureQuestion = question::create([
            'title' => 'Wat is je (on)tevredenheid met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'future'
        ]);

        reflection_question::create([
            'question_id' => $futureQuestion->id,
            'reflection_id' => $futureReflection->id
        ]);

        $futureQuestion = question::create([
            'title' => 'Wat voor dingen zouden er moeten veranderen om een verandering te maken?',
            'type' => 'open_question',
            'ref_type' => 'future'
        ]);

        reflection_question::create([
            'question_id' => $futureQuestion->id,
            'reflection_id' => $futureReflection->id
        ]);

        $futureQuestion = question::create([
            'title' => 'Wat zijn dagelijkse of wekelijkse gewoontes die zouden bijdragen aan deze verandering?',
            'type' => 'open_question',
            'ref_type' => 'future'
        ]);

        reflection_question::create([
            'question_id' => $futureQuestion->id,
            'reflection_id' => $futureReflection->id
        ]);

        // Create the reflection progressions
        reflection_progression::create([
            'reflection_id' => $pastReflection->id,
            'progress' => 0
        ]);

        reflection_progression::create([
            'reflection_id' => $presentReflection->id,
            'progress' => 0
        ]);

        reflection_progression::create([
            'reflection_id' => $futureReflection->id,
            'progress' => 0
        ]);
    }
}
