<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
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
                'en' => ['name' => 'Egypt'],
                'ar' => ['name' => 'مصر'],
                'status' => '1',
            ],
        ];

        foreach ($allData as $data) {

            Country::create($data);
        }
    }
}
