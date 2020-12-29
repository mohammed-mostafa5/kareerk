<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
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
                'en' => ['name' => 'Woman Care'],
                'ar' => ['name' => 'العناية بالمرأة'],
                'status' => '1',
            ],
            [
                'en' => ['name' => 'Hair Care'],
                'ar' => ['name' => 'العناية بالشعر'],
                'status' => '1',
            ],
            [
                'en' => ['name' => 'Baby Care'],
                'ar' => ['name' => 'العناية بالطفل'],
                'status' => '1',
                'parent_id' => '1',
            ],


        ];

        foreach ($allData as $data) {

            Category::create($data);
        }
    }
}
