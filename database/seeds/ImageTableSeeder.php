<?php

use App\Models\images;
use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
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
                'page_id' => 2,
                'photo' => '1601553926_blog-dog.jpg'
            ],
        ];


        foreach ($allData as $data) {
            images::create($data);
        }
    }
}
