<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Define an array of possible majors and departments
        $majors = [
            'Computer Science' => ['Software Engineering', 'Artificial Intelligence', 'Cybersecurity'],
            'Business' => ['Marketing', 'Finance', 'Management'],
            'Engineering' => ['Mechanical', 'Electrical', 'Civil'],
            'Science' => ['Biology', 'Chemistry', 'Physics'],
            'Arts' => ['Fine Arts', 'Music', 'Theater']
        ];

        // Generate 100 student records
        $students = [];
        for ($i = 0; $i < 100; $i++) {
            // Randomly select a major and its corresponding department
            $selectedMajor = array_rand($majors);
            $selectedDepartment = $majors[$selectedMajor][array_rand($majors[$selectedMajor])];

            $gender = $faker->randomElement(['male', 'female']);
            $firstName = $gender === 'male' 
                ? $faker->firstNameMale() 
                : $faker->firstNameFemale();

            $students[] = [
                'first_name' => $firstName,
                'last_name' => $faker->lastName(),
                'email' => $faker->unique()->safeEmail(),
                'gender' => $gender,
                'address' => $faker->address(),
                'phone_number' => $faker->phoneNumber(),
                'date_of_birth' => $faker->dateTimeBetween('-22 years', '-18 years')->format('Y-m-d'),
                'major' => $selectedMajor,
                'department' => $selectedDepartment,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            // Insert in chunks to avoid memory issues with large datasets
            if (count($students) >= 50) {
                DB::table('students')->insert($students);
                $students = [];
            }
        }

        // Insert any remaining students
        if (!empty($students)) {
            DB::table('students')->insert($students);
        }
    }
}
