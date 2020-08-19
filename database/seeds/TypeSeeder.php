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
        $types = [
            ['name' => 'string', 'class' => 'text'],
            ['name' => 'integer', 'class' => 'number'],
            ['name' => 'boolean', 'class' => 'checkbox'],
            ['name' => 'dateTime', 'class' => 'datetime'],
            ['name' => 'text', 'class' => 'textarea'],
            ['name' => 'unsignedSmallInteger', 'class' => 'number'],
            ['name' => 'unsignedBigInteger', 'class' => 'number'],
            ['name' => 'unsignedBigInteger', 'class' => 'select'],
            ['name' => 'bigInteger', 'class' => 'number'],
            ['name' => 'char', 'class' => 'text'],
            ['name' => 'date', 'class' => 'date'],
            ['name' => 'decimal', 'class' => 'number'],
            ['name' => 'decimal', 'class' => 'decimal'],
            ['name' => 'float', 'class' => 'number'],
            ['name' => 'json', 'class' => 'textarea'],
            ['name' => 'jsonb', 'class' => 'textarea'],
            ['name' => 'longText', 'class' => 'textarea'],
            ['name' => 'smallInteger', 'class' => 'number'],
            ['name' => 'softDeletes', 'class' => 'datetime'],
            ['name' => 'time', 'class' => 'string']
        ];
        DB::table('types')->insert($types);
    }
}
