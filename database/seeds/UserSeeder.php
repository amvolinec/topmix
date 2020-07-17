<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin2020'),
                'role_id' => 1
            ],
            [
                'name' => 'Tatjana Opolais',
                'email' => 'tatjanaopola@inbox.lv',
                'password' => Hash::make('saulkrasti2020'),
                'role_id' => 2
            ],
            [
                'name' => 'Student One',
                'email' => 'student@inbox.lv',
                'password' => Hash::make('student2020'),
                'role_id' => 3
            ],
        ];

        DB::table('users')->insert($data);
    }
}
