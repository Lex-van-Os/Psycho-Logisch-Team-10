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
            'ref_type' => 'past',
            'instruction' => 'Schrijf een kort stuk over de positieve dingen die je hebt meegemaakt met dank aan dit onderwerp'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Wat is de impact geweest van deze ervaring? (Positief)',
            'type' => 'open_question',
            'ref_type' => 'past',
            'instruction' => 'Schrijf een kort stuk over de impact van deze positieve ervaringen. Hoe hebben ze je leven op een positieve wijze veranderd?'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Wat zijn de negatieve ervaringen die je hebt gehad met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'past',
            'instruction' => 'Schrijf een kort stuk over de negatieve dingen die je hebt meegemaakt met dank aan dit onderwerp'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Wat is de impact geweest van deze ervaring? (Negatief)',
            'type' => 'open_question',
            'ref_type' => 'past',
            'instruction' => 'Schrijf een kort stuk over de impact van deze negatieve ervaringen. Hoe hebben ze je leven op een negatieve wijze veranderd?'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Hoe hebben andere mensen impact gehad op jouw ervaringen?',
            'type' => 'open_question',
            'ref_type' => 'past',
            'instruction' => 'Schrijf een kort stuk over de impact van anderen op jouw ervaringen met dit onderwerp. Hebben ze een positieve impact gehad, of juist een negatieve impact?'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Wat is een grote uitdaging waar je tegenaan bent gelopen met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'past',
            'instruction' => 'Schrijf een kort stuk over een ervaring die veel inspanning of uitdaging heeft geëist. Als je er geen kan bedenken, vertel dan over een ervaring die je nog goed kan herinneren.'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Hoe ben je omgegaan met deze uitdaging?',
            'type' => 'open_question',
            'ref_type' => 'past',
            'instruction' => 'Hoe ben je omgegaan met de situatie die je zojuist hebt beschreven? Heb je de uitdaging overwonnen, of zou je zeggen dat je het eerder hebt opgegeven? Schrijf een kort stuk over de stappen die je hebt genomen die hebben geleid tot de uitkomst van de situatie.'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Wat is een voorbeeld van een gebeurtenis die je overtuigingen met betrekking tot dit onderwerp heeft doen veranderen?',
            'type' => 'open_question',
            'ref_type' => 'past',
            'instruction' => 'Schrijf een kort stuk over een gebeurtenis of moment die je veel heeft geleerd over dit onderwerp. Wat heeft deze gebeurtenis je geleerd? Hoe heeft het je overtuigingen veranderd?'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Is er ooit een gebeurtenis geweest waar je geen invloed op had, omdat het buiten je controle was?',
            'type' => 'open_question',
            'ref_type' => 'past',
            'instruction' => 'Met betrekking tot het onderwerp, heb je ooit iets meegemaakt waar je geen invloed op had? Schrijf een kort stuk over deze gebeurtenis. Hoe heeft het je beïnvloed? Hoe ben je er mee omgegaan?'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        $pastQuestion = question::create([
            'title' => 'Is er een moment geweest met betrekking tot dit onderwerp dat je anders had kunnen aanpakken?',
            'type' => 'open_question',
            'ref_type' => 'past',
            'instruction' => 'Als je terugkijkt op dit onderwerp, is er dan een moment geweest waar je anders had kunnen handelen? Schrijf een kort stuk over dit moment. Hoe zou je het anders hebben aangepakt? Wat zou het resultaat zijn geweest?'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $pastReflection->id
        ]);

        // Present reflection questions

        $presentQuestion = question::create([
            'title' => 'Hoe ga je momenteel om met dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'present',
            'instruction' => 'Schrijf een kort stuk over hoe je momenteel omgaat met dit onderwerp. Hoeveel tijd besteed je er aan? Wat zijn je gedachten erover?'
        ]);

        reflection_question::create([
            'question_id' => $presentQuestion->id,
            'reflection_id' => $presentReflection->id
        ]);

        $presentQuestion = question::create([
            'title' => 'Wat is je (on)tevredenheid met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'present',
            'instruction' => 'Schrijf een kort stuk over je tevredenheid, of juist je ontevredenheid over hoe je omgaat met dit onderwerp. Wat zou je willen veranderen? Wat zou je willen blijven doen?'
        ]);

        reflection_question::create([
            'question_id' => $presentQuestion->id,
            'reflection_id' => $presentReflection->id
        ]);

        $presentQuestion = question::create([
            'title' => 'Wat is een belangrijke recente situatie geweest met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'present',
            'instruction' => 'Als je terugkijkt naar de afgelopen week(en), kan je dan een impactvolle situatie herinneren? Schrijf een kort stuk hierover.'
        ]);

        reflection_question::create([
            'question_id' => $presentQuestion->id,
            'reflection_id' => $presentReflection->id
        ]);

        $presentQuestion = question::create([
            'title' => 'Zijn er patronen die je opvallen met jouw omgang met dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'present',
            'instruction' => 'Als je kijkt naar hoe je omgaat met dit onderwerp, merk je dan patronen in je gedrag? Zijn er dingen die je vaak doet, of juist niet doet?'
        ]);

        reflection_question::create([
            'question_id' => $presentQuestion->id,
            'reflection_id' => $presentReflection->id
        ]);

        $presentQuestion = question::create([
            'title' => 'Hoe vergelijkt jouw huidige blik op dit onderwerp vergeleken met in het verleden?',
            'type' => 'open_question',
            'ref_type' => 'present',
            'instruction' => 'Schrijf een kort stuk over hoe je huidige blik op dit onderwerp verschilt met je blik op dit onderwerp in het verleden. Wat is er veranderd? Wat is hetzelfde gebleven?'
        ]);

        reflection_question::create([
            'question_id' => $presentQuestion->id,
            'reflection_id' => $presentReflection->id
        ]);

        $presentQuestion = question::create([
            'title' => 'Hoe zou je zelf je huidige ervaringen met dit onderwerp willen veranderen?',
            'type' => 'open_question',
            'ref_type' => 'present',
            'instruction' => 'Schrijf een kort stuk over wat je zou willen veranderen als het gaat om hoe je omgaat met dit onderwerp. Als er niets is wat je zou willen veranderen, schrijf dan over wat je zou willen blijven doen.'
        ]);

        reflection_question::create([
            'question_id' => $presentQuestion->id,
            'reflection_id' => $presentReflection->id
        ]);

        // Future reflection questions

        $presentQuestion = question::create([
            'title' => 'Wat is je (on)tevredenheid met betrekking tot dit onderwerp?',
            'type' => 'open_question',
            'ref_type' => 'future',
            'instruction' => 'Schrijf een kort stuk over je tevredenheid, of juist je ontevredenheid over hoe je omgaat met dit onderwerp. Wat zou je willen veranderen? Wat zou je willen blijven doen?'
        ]);

        reflection_question::create([
            'question_id' => $pastQuestion->id,
            'reflection_id' => $futureReflection->id
        ]);

        $futureQuestion = question::create([
            'title' => 'Wat zijn dingen die je zou willen veranderen?',
            'type' => 'open_question',
            'ref_type' => 'future',
            'instruction' => 'Schrijf een kort stuk over de dingen die je zou willen veranderen met betrekking tot dit onderwerp. Wat zou je kunnen veranderen om een betere ervaring te hebben? Na deze vraag zal je hier wat vervolgvragen op krijgen.'
        ]);

        reflection_question::create([
            'question_id' => $futureQuestion->id,
            'reflection_id' => $futureReflection->id
        ]);
        
        $futureQuestion = question::create([
            'title' => 'Hoe zou je leven veranderen als je deze veranderingen doorvoert?',
            'type' => 'open_question',
            'ref_type' => 'future',
            'instruction' => 'Als je kijkt naar wat je zou willen veranderen, wat zou dan denk je de impact zijn op je leven? Hoe zou je leven veranderen als je deze veranderingen doorvoert?'
        ]);

        reflection_question::create([
            'question_id' => $futureQuestion->id,
            'reflection_id' => $futureReflection->id
        ]);

        $futureQuestion = question::create([
            'title' => 'Hoe zouden anderen naar je kijken, met verandering?',
            'type' => 'open_question',
            'ref_type' => 'future',
            'instruction' => 'Hoe zouden andere mensen naar je kijken als je deze veranderingen maakt? Zouden ze anders met je omgaan? Zouden ze tevreden of ontevreden zijn? Zou hun mening veel impact hebben?'
        ]);

        reflection_question::create([
            'question_id' => $futureQuestion->id,
            'reflection_id' => $futureReflection->id
        ]);

        $futureQuestion = question::create([
            'title' => 'Wat voor sociale impact zou je verandering kunnen hebben?',
            'type' => 'open_question',
            'ref_type' => 'future',
            'instruction' => 'Als je kijkt naar je omgeving, wat voor impact zou je verandering dan kunnen hebben? Zou het een positieve of een negatieve impact hebben? Schrijf een kort stuk over wat je denkt dat de gevolgen zouden kunnen zijn.'
        ]);

        reflection_question::create([
            'question_id' => $futureQuestion->id,
            'reflection_id' => $futureReflection->id
        ]);

        $futureQuestion = question::create([
            'title' => 'Wat voor dingen zouden er moeten veranderen om een verandering te maken?',
            'type' => 'open_question',
            'ref_type' => 'future',
            'instruction' => 'Als je kijkt naar de dingen die je zou willen veranderen, dan zijn er waarschijnlijk dingen die je momenteel weerhouden. Wat zijn de belangrijkste dingen die zouden moeten veranderen om een impact te maken?'
        ]);

        reflection_question::create([
            'question_id' => $futureQuestion->id,
            'reflection_id' => $futureReflection->id
        ]);

        $futureQuestion = question::create([
            'title' => 'Wat zijn dagelijkse of wekelijkse gewoontes die zouden bijdragen aan deze verandering?',
            'type' => 'open_question',
            'ref_type' => 'future',
            'instruction' => 'Als je kijkt naar de dingen die je zou willen veranderen, wat zijn dan dagelijkse of wekelijkse gewoontes die je zou kunnen aanleren om deze verandering te maken? Wat zou je doen en hoe zorg je ervoor dat je deze gewoontes aanleert?'
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
