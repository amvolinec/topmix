<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Admin', 'slug' => 'admin'],
            ['name' => 'Lecture', 'slug' => 'lecture'],
            ['name' => 'User', 'slug' => 'user'],
        ];
        DB::table('roles')->insert($roles);
    }
}
