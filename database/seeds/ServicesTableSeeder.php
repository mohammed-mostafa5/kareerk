<?php

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
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
                'en' => ['name' => 'Service 1'],
                'ar' => ['name' => 'Service 1'],
                'status' => '1',
            ],
            [
                'en' => ['name' => 'Service 2'],
                'ar' => ['name' => 'Service 2'],
                'status' => '1',
                'parent_id' => '1',
            ],
            [
                'en' => ['name' => 'Service 3'],
                'ar' => ['name' => 'Service 3'],
                'status' => '1',
                'parent_id' => '1',
            ],


        ];

        foreach ($allData as $data) {

            Service::create($data);
        }
    }
}
