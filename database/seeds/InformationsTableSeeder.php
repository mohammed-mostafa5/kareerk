<?php

use App\Models\Information;
use Illuminate\Database\Seeder;

class InformationsTableSeeder extends Seeder
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
                'en' => ['name' => 'Phone', 'value' => '01021012025'],
                'ar' => ['name' => 'Phone', 'value' => '01021012025'],
                'status' => '1',
            ],
            [
                'en' => ['name' => 'Phone2', 'value' => '01021012026'],
                'ar' => ['name' => 'Phone2', 'value' => '01021012026'],
                'status' => '1',
            ],
            [
                'en' => ['name' => 'Email', 'value' => 'info@mazadii.net'],
                'ar' => ['name' => 'Email', 'value' => 'info@mazadii.net'],
                'status' => '1',
            ],
            [
                'en' => ['name' => 'Address', 'value' => 'Cairo, Egypt'],
                'ar' => ['name' => 'Address', 'value' => 'Cairo, Egypt'],
                'status' => '1',
            ],



        ];

        foreach ($allData as $data) {

            Information::create($data);
        }
    }
}
