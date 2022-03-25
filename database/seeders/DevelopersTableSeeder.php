<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Developer;

class DevelopersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developers = [
            [
                'id'             => 1,
                'name'           => 'Bob',
                'email'          => 'bob@bob.com',
                'messenger'=>'nope',
                'phone'=>'1231234124123',
                'social_media'=>'nope',
                'price'=>2000,
                'english_level'=>2,
                'experience'=>3,
                'working_type'=>1,

            ],
            [
                'id'             => 2,
                'name'           => 'Jack',
                'email'          => 'jack@london.com',
                'messenger'=>'nope',
                'phone'=>'1231234124123',
                'social_media'=>'nope',
                'price'=>2000,
                'english_level'=>2,
                'experience'=>3,
                'working_type'=>1,

            ],
        ];

        Developer::insert($developers);
    }
}
