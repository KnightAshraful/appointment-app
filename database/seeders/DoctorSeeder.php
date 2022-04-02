<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Doctor;
use Faker\Factory as Faker;


class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

      //D1
      Doctor::create([
        'department_id'        =>  $faker->numberBetween(1,5),
        'name'                 =>  $faker->name,
        'phone'                =>  $faker->numberBetween(100,999999999),
        'fee'                  =>  $faker->numberBetween(500,5000),
      ]);

      //D2
      Doctor::create([
        'department_id'        =>  $faker->numberBetween(1,5),
        'name'                 =>  $faker->name,
        'phone'                =>  $faker->numberBetween(100,999999999),
        'fee'                  =>  $faker->numberBetween(500,5000),
      ]);

      //D3
      Doctor::create([
        'department_id'        =>  $faker->numberBetween(1,5),
        'name'                 =>  $faker->name,
        'phone'                =>  $faker->numberBetween(100,999999999),
        'fee'                  =>  $faker->numberBetween(500,5000),
      ]);

       //D4
      Doctor::create([
        'department_id'        =>  $faker->numberBetween(1,5),
        'name'                 =>  $faker->name,
        'phone'                =>  $faker->numberBetween(100,999999999),
        'fee'                  =>  $faker->numberBetween(500,5000),
      ]);

      //D5
      Doctor::create([
        'department_id'        =>  $faker->numberBetween(1,5),
        'name'                 =>  $faker->name,
        'phone'                =>  $faker->numberBetween(100,999999999),
        'fee'                  =>  $faker->numberBetween(500,5000),
      ]);

      //D6
      Doctor::create([
        'department_id'        =>  $faker->numberBetween(1,5),
        'name'                 =>  $faker->name,
        'phone'                =>  $faker->numberBetween(100,999999999),
        'fee'                  =>  $faker->numberBetween(500,5000),
      ]);

      //D7
      Doctor::create([
        'department_id'        =>  $faker->numberBetween(1,5),
        'name'                 =>  $faker->name,
        'phone'                =>  $faker->numberBetween(100,999999999),
        'fee'                  =>  $faker->numberBetween(500,5000),
      ]);

       //D8
      Doctor::create([
        'department_id'        =>  $faker->numberBetween(1,5),
        'name'                 =>  $faker->name,
        'phone'                =>  $faker->numberBetween(100,999999999),
        'fee'                  =>  $faker->numberBetween(500,5000),
      ]);

      //D9
      Doctor::create([
        'department_id'        =>  $faker->numberBetween(1,5),
        'name'                 =>  $faker->name,
        'phone'                =>  $faker->numberBetween(100,999999999),
        'fee'                  =>  $faker->numberBetween(500,5000),
      ]);

       //D10
      Doctor::create([
        'department_id'        =>  $faker->numberBetween(1,5),
        'name'                 =>  $faker->name,
        'phone'                =>  $faker->numberBetween(100,999999999),
        'fee'                  =>  $faker->numberBetween(500,5000),
      ]);
    }
}
