<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reflection;
use App\Models\reflection_trajectory;
use App\Models\User;

class ReflectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $demoUser = User::create([
            'name' => 'demouser',
            'email'=> 'demo@demo.nl',
            'password' => 'demouser'
        ]);

        $demoTrajectory = reflection_trajectory::create([
            'title' => 'Demo trajectory',
            'user_id' => $demoUser->id
        ]);

        Reflection::create([
            'reflection_type' => 'past',
            'reflection_trajectory_id' => $demoTrajectory->id
        ]);

        Reflection::create([
            'reflection_type' => 'present',
            'reflection_trajectory_id' => $demoTrajectory->id
        ]);

        Reflection::create([
            'reflection_type' => 'future',
            'reflection_trajectory_id' => $demoTrajectory->id
        ]);
    }
}
