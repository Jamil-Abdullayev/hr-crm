<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            [
                'id'             => 1,
                'name'           => 'Back-End',
                'description'          => 'PHP',

            ],
            [
                'id'             => 1,
                'name'           => 'Front-End',
                'description'          => 'React',

            ],
        ];

        Skill::insert($skills);
    }
}
