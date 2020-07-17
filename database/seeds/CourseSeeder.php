<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Музыкальные эпохи',
                'description' => 'Образовательная программа',
                'author_id' => 2
            ],
        ];

        DB::table('courses')->insert($data);
    }
}
