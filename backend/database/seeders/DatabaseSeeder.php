<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a teacher user + profile
        $teacherUser = \App\Models\User::factory()->create([
            'email' => 'aljundalman12@gmail.com',
            'password' => bcrypt('Password123@'),
            'role' => 'teacher',
        ]);

        \App\Models\Teacher::factory()->create([
            'user_id' => $teacherUser->id,
            'first_name' => 'Aljun',
            'middle_name' => 'Bequillos',
            'last_name' => 'Dalman',
            'contact_number' => '09192888483',
            'address' => 'Quezon City',
        ]);

        // Create a guardian + student
        $guardianUser = \App\Models\User::factory()->create([
            'role' => 'guardian',
        ]);

        $guardian = \App\Models\Guardian::factory()->create([
            'user_id' => $guardianUser->id,
        ]);

        \App\Models\Student::factory()->create([
            'guardian_id' => $guardian->id,
        ]);
    }
}
