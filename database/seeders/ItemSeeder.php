<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'name' => 'カット',
                'email' => 'カットの詳細',
                'password' => 6000
            ],
            [
                'name'     => 'カラー',
                'email'    => 'カラーの詳細',
                'password' => 8000
            ],
            [
                'name'     => 'パーマ(カット込み)',
                'email'    => 'パーマの詳細',
                'password' => 6000
            ]
        ]);
    }
}
