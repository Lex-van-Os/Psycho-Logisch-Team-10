<?php

namespace Database\Seeders;

use App\Models\question_option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionOptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        question_option::create([
            'text' => 'Positief',
            'value' => '3',
            'question_id' => 12
        ]);

        question_option::create([
            'text' => 'Neutraal',
            'value' => '2',
            'question_id' => 12
        ]);

        question_option::create([
            'text' => 'Negatief',
            'value' => '1',
            'question_id' => 12
        ]);

        question_option::create([
            'text' => 'Veel invloed',
            'value' => '3',
            'question_id' => 13
        ]);

        question_option::create([
            'text' => 'Gemiddeld',
            'value' => '2',
            'question_id' => 13
        ]);

        question_option::create([
            'text' => 'Weinig invloed',
            'value' => '1',
            'question_id' => 13
        ]);

        question_option::create([
            'text' => 'Veel waarde',
            'value' => '3',
            'question_id' => 14
        ]);

        question_option::create([
            'text' => 'Gemiddeld',
            'value' => '2',
            'question_id' => 14
        ]);

        question_option::create([
            'text' => 'Weinig waarde',
            'value' => '1',
            'question_id' => 14
        ]);
    }
}
