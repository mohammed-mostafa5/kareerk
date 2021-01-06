<?php

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
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
                'name' => 'English',
                'status' => '1',
            ],
        ];

        foreach ($allData as $data) {

            Language::create($data);
        }
    }
}
