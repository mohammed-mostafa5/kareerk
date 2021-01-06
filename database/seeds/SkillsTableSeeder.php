<?php

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
        $allData = [
            [
                'en' => ['name' => 'Skill 1'],
                'ar' => ['name' => 'Skill 1'],
                'service_id' => '1',
                'status' => '1',
            ],
            [
                'en' => ['name' => 'Skill 2'],
                'ar' => ['name' => 'Skill 2'],
                'service_id' => '1',
                'status' => '1',
                'parent_id' => '1',
            ],
            [
                'en' => ['name' => 'Skill 3'],
                'ar' => ['name' => 'Skill 3'],
                'service_id' => '1',
                'status' => '1',
                'parent_id' => '1',
            ],


        ];

        foreach ($allData as $data) {

            Skill::create($data);
        }
    }
}
