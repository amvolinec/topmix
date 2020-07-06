<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'text', 'class' => 'Text'],
            ['name' => 'number', 'class' => 'Number'],
            ['name' => 'checkbox', 'class' => 'Checkbox'],
            ['name' => 'select', 'class' => 'Select'],
            ['name' => 'multi', 'class' => 'Multi'],
            ['name' => 'date', 'class' => 'Date'],
            ['name' => 'datetime', 'class' => 'Datetime'],
        ];
        DB::table('types')->insert($roles);
    }
}
