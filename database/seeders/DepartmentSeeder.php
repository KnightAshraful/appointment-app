<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //D1
      Department::create([
        'name'        => 'Cardiology'
      ]);

      //D2
      Department::create([
        'name'        => 'Kidney'
      ]);

      //D3
      Department::create([
        'name'        => 'Neuroscience'
      ]);

      //D4
      Department::create([
        'name'        => 'Diabetes'
      ]);

      //D5
      Department::create([
        'name'        => 'Blood Circulatory System'
      ]);

    }
}
