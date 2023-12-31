<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //$this->call(ReflectionTrajectorySeeder::class);
        $this->call(OpenQuestionSeeder::class);
        $this->call(ScaleQuestionSeeder::class);
        $this->call(MultipleChoiceQuestionSeeder::class);
        $this->call(AnsweredTrajectorySeeder::class);
    }
}
