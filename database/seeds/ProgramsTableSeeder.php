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
            'name' => 'Department of Management'
        ]);
        Program::create([
            'name' => 'Department of Accounting'
        ]);
        Program::create([
            'name' => 'Department of Marketing'
        ]);
        Program::create([
            'name' => 'Department of Finance'
        ]);


        Program::create([
            'name' => 'Department of Computer Science and Engineering'
        ]);
        Program::create([
            'name' => 'Department of Mathematics & Statistics'
        ]);
        Program::create([
            'name' => 'Department of Electrical and Electronic Engineering'
        ]);
        Program::create([
            'name' => 'Department of Textile Engineering'
        ]);


        Program::create([
            'name' => 'Department of English'
        ]);


        Program::create([
            'name' => 'Department of Economics'
        ]);


        Program::create([
            'name' => 'Department of Law & Justice'
        ]);
    }
}
