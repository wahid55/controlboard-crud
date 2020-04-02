<?php

use App\Program;
use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::create([
            'department_id' => 1,
            'name' => 'Department of Management'
        ]);
        Program::create([
            'department_id' => 1,
            'name' => 'Department of Accounting'
        ]);
        Program::create([
            'department_id' => 1,
            'name' => 'Department of Marketing'
        ]);
        Program::create([
            'department_id' => 1,
            'name' => 'Department of Finance'
        ]);


        Program::create([
            'department_id' => 2,
            'name' => 'Department of Computer Science and Engineering'
        ]);
        Program::create([
            'department_id' => 2,
            'name' => 'Department of Mathematics & Statistics'
        ]);
        Program::create([
            'department_id' => 2,
            'name' => 'Department of Electrical and Electronic Engineering'
        ]);
        Program::create([
            'department_id' => 2,
            'name' => 'Department of Textile Engineering'
        ]);


        Program::create([
            'department_id' => 3,
            'name' => 'Department of English'
        ]);


        Program::create([
            'department_id' => 4,
            'name' => 'Department of Economics'
        ]);


        Program::create([
            'department_id' => 5,
            'name' => 'Department of Law & Justice'
        ]);
    }
}
