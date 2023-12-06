<?php

namespace Database\Seeders;

use App\Models\question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScaleQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        question::create([
            'title' => 'Op een schaal van 1 - 10, wat is je ervaring met dit onderwerp? (0 = negatief, 10 = positief)',
            'type' => 'scale_question',
            'instruction' => ''
        ]);

        question::create([
            'title' => 'Op een schaal van 1 - 10, Hoeveel stress ervaar je met dit onderwerp? (0 = negatief, 10 = positief)',
            'type' => 'scale_question',
            'instruction' => ''
        ]);

        question::create([
            'title' => 'Op een schaal van 1 - 10, hoeveel ervaring heb je met dit onderwerpn? (0 = weinig, 10 = veel)',
            'type' => 'scale_question',
            'instruction' => ''
        ]);

    }
}
