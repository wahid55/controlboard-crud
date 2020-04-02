<?php

use Illuminate\Database\Seeder;
use App\Department;


class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'Faculty of Business'
        ]);
        Department::create([
            'name' => 'Faculty of Engineering & Applied Sciences'
        ]);
        Department::create([
            'name' => 'Faculty of Arts & Humanities'
        ]);
        Department::create([
            'name' => 'Faculty of Social Sciences'
        ]);
        Department::create([
            'name' => 'Faculty of Law'
        ]);
    }
}
