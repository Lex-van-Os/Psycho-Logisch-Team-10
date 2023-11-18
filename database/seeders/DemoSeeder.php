<?php

namespace Database\Seeders;

use App\Models\open_answer;
use App\Models\reflection_progression;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reflection;
use App\Models\question;
use App\Models\reflection_question;
use App\Models\reflection_trajectory;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class DemoSeeder extends Seeder
{

    /**
     * Seeder for an entire reflection trajectory (user, trajectory, reflection, questions)
     */
    public function run(): void
    {
        // Defined demo answers to use when creating answers for questions
        $demoAnswers = [
            "
            Positieve ervaringen op het gebied van zelfbeeld bij social media zijn er zeker. Ten eerste heb ik ontdekt dat sociale media een platform bieden om mezelf te uiten en mijn eigen identiteit te verkennen. Door foto's te delen van mijn hobby's, interesses en creatieve projecten, heb ik positieve reacties ontvangen van leeftijdsgenoten die dezelfde passies delen. Dit heeft mijn zelfvertrouwen vergroot en me aangemoedigd om trouw te blijven aan wie ik werkelijk ben.
            
            Een ander positief aspect is de mogelijkheid om connecties te maken met mensen buiten mijn directe sociale kring. Door deel te nemen aan gemeenschappen en groepen met gedeelde interesses, heb ik nieuwe vrienden gemaakt en diverse perspectieven leren kennen. Dit heeft mijn horizon verbreed en mijn begrip van diversiteit vergroot, waardoor ik me meer open ben gaan stellen voor verschillende ideeën en culturen.
            
            Bovendien hebben de bemoedigende reacties op mijn posts me geholpen om zelfliefde te cultiveren. Wanneer anderen waardering uiten voor wie ik ben en wat ik deel, herinner ik mezelf eraan dat mijn waarde niet afhangt van externe maatstaven. Deze positieve bevestigingen hebben bijgedragen aan een positiever zelfbeeld en hebben me aangemoedigd om mezelf te omarmen, inclusief mijn imperfecties.
            
            Tot slot heb ik via social media inspirerende rolmodellen ontdekt. Door het volgen van mensen die zichzelf authentiek tonen en die streven naar positieve verandering, heb ik geleerd dat ware schoonheid en kracht voortkomen uit echtheid en het nastreven van persoonlijke groei. Deze rolmodellen hebben me geïnspireerd om mijn eigen pad te volgen en me niet te laten beïnvloeden door oppervlakkige normen.
            
            In essentie hebben de positieve ervaringen op social media mijn zelfontdekking bevorderd, mijn zelfvertrouwen versterkt en mijn begrip van diversiteit vergroot. Het platform heeft een waardevolle rol gespeeld in mijn groei en zelfacceptatie.
            ",

            "
            De impact van de positieve ervaringen met betrekking tot zelfbeeld op social media is significant geweest. Allereerst heeft het mijn zelfvertrouwen vergroot. De positieve reacties op mijn posts en de erkenning van mijn interesses hebben me geholpen om trots te zijn op wie ik ben en wat ik leuk vind. Dit heeft een directe invloed gehad op mijn dagelijks leven, waarin ik me meer empowered voel om mijn eigen keuzes te maken en mijn authentieke zelf te zijn, zowel online als offline.

            Daarnaast heeft de mogelijkheid om nieuwe connecties te maken mijn sociale horizon verbreed. Het contact met mensen buiten mijn gebruikelijke sociale kring heeft mijn begrip van diversiteit vergroot. Dit heeft niet alleen mijn wereldbeeld verrijkt, maar ook mijn vermogen om open te staan voor verschillende perspectieven en ideeën versterkt. Het heeft bijgedragen aan een gevoel van gemeenschap en solidariteit, waardoor ik me meer verbonden voel met anderen, zelfs als ze fysiek ver weg zijn.

            Een belangrijk aspect van de impact is de bevordering van zelfliefde. Door de positieve bevestigingen op social media ben ik me bewust geworden van mijn eigen waarde los van externe maatstaven. Dit heeft geleid tot een gezonder zelfbeeld en een grotere acceptatie van mijn eigen imperfecties. Het besef dat echtheid gewaardeerd wordt, heeft me aangemoedigd om mijn kwetsbaarheid te tonen en meer compassie te hebben voor mezelf.

            Tot slot heeft de ontdekking van inspirerende rolmodellen op social media me gestimuleerd om te streven naar persoonlijke groei en positieve verandering. Het heeft me aangemoedigd om mijn eigen unieke pad te volgen en me niet te laten beïnvloeden door oppervlakkige normen. Deze impact is niet beperkt tot mijn online ervaringen; het heeft een diepgaand effect gehad op mijn offline leven, waarin ik bewuster keuzes maak die in lijn zijn met mijn waarden en doelen.

            Kortom, de positieve ervaringen op social media hebben mijn zelfbeeld versterkt, mijn sociale cirkel verruimd, zelfliefde bevorderd en mijn streven naar persoonlijke groei aangewakkerd. De impact is multidimensionaal en heeft mijn algehele welzijn positief beïnvloed.
            ",

            "
            Negatieve ervaringen met betrekking tot zelfbeeld op social media hebben helaas ook een rol gespeeld in mijn online reis. Ten eerste ervaar ik soms een gevoel van druk en vergelijking. Het zien van perfect ogende levens en lichamen op sociale media kan leiden tot zelftwijfel en onrealistische verwachtingen. Dit heeft bijgedragen aan momenten van onzekerheid over mijn eigen uiterlijk en prestaties, omdat ik me soms niet kan meten aan de gefilterde realiteit die online wordt gepresenteerd.

            Een ander negatief aspect is de blootstelling aan online haat en negatieve reacties. Het delen van persoonlijke aspecten van mijn leven brengt soms ongevraagde kritiek met zich mee. Dit heeft invloed gehad op mijn zelfvertrouwen en kan leiden tot gevoelens van kwetsbaarheid. Het is een uitdaging om hiermee om te gaan en het niet persoonlijk op te vatten, maar eerder te erkennen dat dit vaak meer zegt over de ander dan over mijzelf.

            Daarnaast heeft het overmatige gebruik van sociale media soms negatieve gevolgen gehad voor mijn mentale gezondheid. Het voortdurend scrollen door perfecte plaatjes kan een gevoel van ontevredenheid en FOMO (Fear Of Missing Out) veroorzaken. Het besef dat anderen leuke dingen doen zonder mij, kan eenzaamheid en zelfs somberheid veroorzaken. Het is een uitdaging om een gezonde balans te vinden tussen online en offline leven.

            Een ander punt van zorg is de druk om altijd 'aan' te staan en de behoefte om constant updates te delen. Dit kan leiden tot een gevoel van prestatiedruk en de angst om iets te missen. Soms voelt het alsof ik mijn leven moet bewijzen aan anderen, wat stress en vermoeidheid met zich meebrengt.

            In het algemeen hebben deze negatieve ervaringen op social media invloed gehad op mijn mentale welzijn, zelfvertrouwen en gevoel van eigenwaarde. Het is een voortdurend proces om bewust te zijn van deze negatieve aspecten en manieren te vinden om ermee om te gaan zonder mijn algehele welzijn in gevaar te brengen.
            ",

            "
            De impact van de negatieve ervaringen met betrekking tot zelfbeeld op social media is aanzienlijk geweest, en heeft diverse aspecten van mijn leven beïnvloed. Allereerst heeft het geleid tot perioden van verminderd zelfvertrouwen. Het voortdurend blootstaan aan perfecte beelden en levensstijlen op social media heeft soms twijfel gezaaid over mijn eigen waarde en prestaties. Het vergelijken van mijn leven met geïdealiseerde online versies heeft bijgedragen aan een gevoel van onzekerheid en ontevredenheid.

            Daarnaast hebben negatieve reacties en online haat mijn emotionele welzijn beïnvloed. Het is moeilijk om ongevoelig te blijven voor kritiek, vooral wanneer het persoonlijk wordt. Dit heeft geleid tot momenten van stress, angst en een gevoel van kwetsbaarheid. Het bewust omgaan met deze negatieve interacties vergt emotionele veerkracht en zelfzorg om niet te worden overweldigd door de negatieve energie die soms op sociale media aanwezig is.

            De druk om constant online te zijn en updates te delen heeft ook de grens tussen mijn online en offline leven vervaagd. Dit heeft geleid tot momenten van vermoeidheid en stress, omdat ik het gevoel heb altijd 'aan' te moeten staan. De constante stroom van informatie en beelden kan soms overweldigend zijn en negatieve effecten hebben op mijn mentale gezondheid, waaronder een verhoogd gevoel van FOMO en eenzaamheid.

            Bovendien heeft de neiging tot overmatig gebruik van sociale media mijn vermogen om in het moment te leven beïnvloed. Het constante verlangen naar bevestiging en de drang om alles te documenteren hebben soms de eenvoudige vreugde van het moment overschaduwd. Het besef dat ik mijn leven niet voortdurend hoef te bewijzen aan anderen, maar het voor mezelf kan ervaren, is een belangrijk leerpunt.

            In het kort heeft de impact van negatieve ervaringen met zelfbeeld op social media invloed gehad op mijn zelfvertrouwen, emotioneel welzijn, mentale gezondheid en mijn vermogen om in het moment te leven. Het vereist voortdurende bewustwording en actieve maatregelen om een gezonde balans te vinden en de negatieve effecten van sociale media te minimaliseren.
            ",

            "
            Andere mensen hebben een aanzienlijke impact gehad op mijn ervaringen met zelfbeeld op social media, zowel positief als negatief. De reacties en interacties met leeftijdsgenoten en online gemeenschappen hebben een diepgaande invloed gehad op mijn perceptie van mezelf en mijn gebruik van sociale media.

            Positief gezien hebben ondersteunende en bemoedigende reacties van leeftijdsgenoten mijn zelfvertrouwen vergroot. Het ontvangen van waardering voor mijn posts en het delen van gemeenschappelijke interesses heeft bijgedragen aan een gevoel van verbondenheid en zelfwaardering. Het besef dat anderen mijn authenticiteit waarderen en accepteren, heeft mijn zelfacceptatie bevorderd en mijn online ervaring verrijkt.

            Aan de andere kant hebben negatieve reacties en online haat bijgedragen aan momenten van onzekerheid en kwetsbaarheid. Kritiek van anderen, zelfs van mensen die ik niet persoonlijk ken, kan een emotionele tol eisen en mijn zelfvertrouwen verminderen. Het bewust omgaan met deze negatieve interacties is een voortdurende uitdaging en vereist emotionele veerkracht.

            Bovendien heeft de observatie van het online gedrag van anderen invloed gehad op mijn eigen gedrag op sociale media. Het zien van leeftijdsgenoten die succesvol lijken of een 'perfect' leven leiden, kan druk uitoefenen om op een vergelijkbare manier te presteren of zichzelf te presenteren. Dit kan leiden tot een cyclus van vergelijking en onrealistische verwachtingen.

            Het is echter belangrijk om op te merken dat de impact van andere mensen niet beperkt is tot negatieve aspecten. Inspirerende rolmodellen die hun echte zelf tonen en streven naar positieve verandering, hebben me aangemoedigd om ook authentiek te zijn en mijn eigen unieke pad te volgen. Het zien van anderen die opkomen voor diversiteit en inclusie heeft mijn bewustzijn vergroot en me geïnspireerd om actief bij te dragen aan een positieve online gemeenschap.

            Kortom, de interacties met andere mensen op sociale media hebben een diepgaande invloed gehad op mijn zelfbeeld en gebruik van deze platforms. Het is een voortdurende reis van zelfontdekking en bewustwording van de rol die anderen spelen in mijn online ervaring. Het vermogen om positieve interacties te koesteren en negatieve invloeden te beheren, is essentieel voor het creëren van een gezonde relatie met zelfbeeld op sociale media.
            ",

            "
            Een grote uitdaging waar ik tegenaan ben gelopen met betrekking tot zelfbeeld op social media is de constante druk om aan bepaalde normen te voldoen en de verleiding om mezelf te vergelijken met anderen. Het streven naar perfectie, dat vaak wordt weerspiegeld in de gecureerde levens op sociale mediaplatforms, heeft soms geleid tot momenten van onzekerheid en zelftwijfel.

            Deze druk komt voort uit de overvloed aan gefilterde beelden en zorgvuldig samengestelde verhalen die op social media worden gedeeld. Het vergelijken van mijn eigen leven met deze ideaalbeelden heeft soms geleid tot het gevoel dat ik niet aan de verwachtingen voldoe, zowel wat betreft uiterlijk als prestaties. Het is een voortdurende uitdaging om mezelf eraan te herinneren dat deze online representaties slechts een deel van het verhaal zijn en niet de volledige werkelijkheid weergeven.

            Een specifieke uitdaging is ook het omgaan met negatieve reacties en online haat. Hoewel ik probeer me te focussen op positieve interacties, is het onvermijdelijk dat er soms negativiteit opduikt. Het vereist emotionele veerkracht om niet te worden beïnvloed door kritiek en om me te concentreren op het behouden van een gezonde zelfwaardering, los van externe opinies.

            Een andere uitdaging is de balans vinden tussen online en offline leven. De constante stroom van informatie op sociale media kan overweldigend zijn en leiden tot stress en vermoeidheid. Het is een uitdaging om bewust grenzen te stellen en tijd te nemen voor offline activiteiten, zodat ik niet volledig opga in de digitale wereld en het echte leven niet mis.

            In het algemeen is de uitdaging om een gezond zelfbeeld te behouden te midden van de druk van social media een voortdurende reis. Het vraagt om zelfreflectie, bewustwording en het nemen van stappen om positieve interacties te bevorderen, negatieve invloeden te minimaliseren en een evenwichtige relatie met deze platforms te behouden.
            ",

            "
            Het overwinnen van de uitdagingen met betrekking tot zelfbeeld op social media was een geleidelijk proces van zelfontdekking en bewustwording. Ik begon met het erkennen van de invloed die sociale media op mijn zelfbeeld had en de druk die ik voelde om aan bepaalde normen te voldoen. Deze bewustwording stelde me in staat om een kritische blik te werpen op mijn eigen gedachten en gevoelens.

            Een belangrijke stap was het stellen van duidelijke grenzen. Ik begon mijn tijd op sociale media te beheren en creëerde ruimte voor offline activiteiten die mijn eigenwaarde versterkten. Door selectiever te zijn met de content die ik consumeerde, ontstond er een positievere online omgeving.

            Positieve interacties werden een prioriteit. Actieve deelname aan gemeenschappen met gedeelde interesses en het delen van inspirerende content leidden tot ondersteunende reacties en een gevoel van verbondenheid. Het erkennen van mijn eigen waarde en het bevorderen van zelfliefde waren centrale aspecten van dit proces.

            Tijdens momenten van negativiteit zocht ik steun bij vrienden en familie. Het delen van mijn ervaringen en gevoelens met anderen bracht begrip en perspectief, waardoor ik sterker stond in het omgaan met uitdagingen.

            Deze reis was ook een voortdurende zoektocht naar authenticiteit. Door mijn echte zelf te omarmen en minder waarde te hechten aan externe normen, begon ik een gezonder zelfbeeld te ontwikkelen. Het besef dat sociale media slechts een deel van het verhaal vertellen en dat iedereen zijn eigen onzekerheden heeft, verminderde de druk om perfect te zijn.

            Het overwinnen van deze uitdagingen was geen lineair proces, maar eerder een cyclische reis van groei en zelfontwikkeling. Het vraagt om voortdurende zelfreflectie, het maken van gezonde keuzes en het cultiveren van een positieve mindset. Deze ervaring heeft me geleerd dat mijn waarde niet afhangt van externe validatie en dat zelfliefde een cruciale sleutel is tot het behoud van een gezond zelfbeeld op social media.
            ",

            "
            Een specifieke gebeurtenis die mijn overtuigingen met betrekking tot zelfbeeld op social media heeft veranderd, was een openhartige discussie binnen een online gemeenschap waar ik deel van uitmaakte. Tijdens deze discussie deelden verschillende leden hun persoonlijke ervaringen met de druk om aan schoonheidsnormen te voldoen en de impact daarvan op hun zelfbeeld.

            Eén lid deelde een eerlijk verhaal over haar worsteling met zelfacceptatie, waarbij ze de nadruk legde op de druk om perfecte foto's te delen en constant te voldoen aan schoonheidsstandaarden. Deze openheid zorgde voor een golf van steunbetuigingen en vergelijkbare verhalen van anderen in de gemeenschap.

            De kracht van deze gedeelde ervaringen bracht een verandering teweeg in mijn perspectief. Het werd duidelijk dat veel mensen, ongeacht hoe perfect hun online leven eruitzag, soortgelijke worstelingen doormaakten. Dit inzicht drong door tot mijn eigen overtuigingen over social media en zelfbeeld.

            De gebeurtenis diende als een herinnering aan de echtheid die achter de gecureerde online beelden schuilgaat. Het bracht een gevoel van saamhorigheid en begrip teweeg, wat mijn overtuiging versterkte dat echtheid en zelfacceptatie belangrijker zijn dan voldoen aan externe normen. Het stimuleerde een verschuiving van oppervlakkige vergelijkingen naar een meer empathische en ondersteunende benadering van mijn eigen en andermans online aanwezigheid.

            Deze ervaring heeft me aangemoedigd om bewuster te zijn van de verhalen achter de beelden op social media en heeft mijn overtuiging versterkt dat het delen van authentieke ervaringen en het ondersteunen van elkaar essentieel zijn voor een gezonde online gemeenschap en een positiever zelfbeeld.
            ",

            "
            Ja, er zijn momenten geweest waar ik geen controle had over bepaalde gebeurtenissen, omdat ze zich buiten mijn invloedssfeer afspeelden. Een specifiek voorbeeld hiervan was toen een online bericht dat ik had gedeeld, verkeerd werd geïnterpreteerd en tot negatieve reacties leidde.

            Ondanks mijn intentie om iets positiefs te delen, ontstond er onbedoeld misverstand en kritiek. Het was een situatie waarin ik niet direct invloed kon uitoefenen op hoe anderen mijn woorden interpreteerden. Ondanks mijn inspanningen om mijn standpunt te verduidelijken en de situatie op te helderen, waren de reacties buiten mijn controle.

            Deze gebeurtenis diende als een herinnering aan de beperkingen van controle op sociale media. Hoewel ik mijn online aanwezigheid met zorg beheer, is het onmogelijk om volledige controle te hebben over hoe anderen reageren of mijn woorden begrijpen. Het was een leermoment dat me hielp om veerkrachtiger te worden en me bewust te worden van de grenzen van mijn controle in de digitale ruimte. Het benadrukte het belang van heldere communicatie en het begrip dat sommige aspecten van online interacties buiten mijn directe beïnvloeding liggen.
            ",

            "
            Ja, er is een moment geweest met betrekking tot zelfbeeld op social media dat ik anders had kunnen aanpakken. Er was een situatie waarin ik negatieve reacties ontving op een post die ik had gedeeld. In plaats van de tijd te nemen om de situatie rustig te analyseren en mijn standpunt met heldere communicatie te verduidelijken, reageerde ik impulsief en defensief.

            Mijn reactie, hoewel begrijpelijk gezien de kritiek, had een averechts effect. Het escaleerde de situatie en leidde tot verdere spanningen in plaats van de misverstanden op te helderen. Na reflectie besefte ik dat ik de kwestie op een meer kalme en begripvolle manier had kunnen benaderen.

            De les hieruit was het belang van geduld en bedachtzaamheid, vooral in online interacties waarin de interpretatie van tekst soms kan verschillen. Het moment diende als herinnering om even een stap terug te doen, de emoties te kalmeren en dan met een bedachtzame reactie te komen. Het heeft mijn bewustzijn vergroot over de impact van mijn eigen reacties op sociale media en heeft me aangemoedigd om meer aandacht te besteden aan mijn communicatiestijl, vooral wanneer er sprake is van negatieve interacties.
            ",
        ];

        // Past reflection answers 

        // Open answers

        // Retrieve all past reflection open questions, to retrieve answers for
        // $pastReflectionOpenQuestions = reflection_question::whereHas('question', function ($query) {
        //     $query->where('type', 'open_question');
        // })
        // ->where('reflection_id', 1)
        // ->with('question')
        // ->get();

        $pastReflectionOpenQuestions = question::where('ref_type', 'past')
        ->where('type', 'open_question')
        ->get();

        $totalQuestions = count($pastReflectionOpenQuestions);
        $totalAnswerTexts = count($demoAnswers);

        // Log::info($pastReflectionOpenQuestions);
        foreach ($pastReflectionOpenQuestions as $reflectionQuestion)
        {
            Log::info($reflectionQuestion);
        }
        Log::info($totalQuestions);
        Log::info($totalAnswerTexts);

        // Loop through the questions and assign answer texts iteratively
        for ($i = 0; $i < $totalQuestions; $i++) {
            // Calculate the index in the answer texts array using modulo
            $answerIndex = $i % $totalAnswerTexts;

            // open_answer::create([
            //     'value' => $demoAnswers[$answerIndex],
            //     'question_id' => $pastReflectionOpenQuestions[$i]->id,
            //     'reflection_id' => $pastReflection->id,
            //     'user_id' => $demoUser->id,
            // ]);
        }

    }
}
