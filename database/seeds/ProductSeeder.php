<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Product::class, 50)->create();
        // $allData = [
        //     [
        //         'category_id' => '3',
        //         'company_id' => '1',
        //         'en' => ['name' => 'Product 1', 'description' => 'Product Description'],
        //         'ar' => ['name' => 'المنتج الاول', 'description' => 'وصف المنتج'],
        //         'regular_price' => '55',
        //         'video' => 'https://www.youtube.com/watch?v=VZyeSy7yxR8',
        //         'photo' => '1592744396_Panadol Extra 455x455.jpg',
        //         'is_bundle' => '0',
        //     ],
        //     [
        //         'category_id' => '3',
        //         'company_id' => '1',
        //         'en' => ['name' => 'Product 2', 'description' => 'Product Description'],
        //         'ar' => ['name' => 'المنتج الثاني', 'description' => 'وصف المنتج'],
        //         'regular_price' => '56',
        //         'video' => 'https://www.youtube.com/watch?v=VZyeSy7yxR8',
        //         'photo' => '1592744396_Panadol Extra 455x455.jpg',
        //         'is_bundle' => '0',
        //     ],
        //     [
        //         'category_id' => '3',
        //         'company_id' => '1',
        //         'en' => ['name' => 'Product 3', 'description' => 'Product Description'],
        //         'ar' => ['name' => 'المنتج الثالث', 'description' => 'وصف المنتج'],
        //         'regular_price' => '56',
        //         'video' => 'https://www.youtube.com/watch?v=VZyeSy7yxR8',
        //         'photo' => '1592744396_Panadol Extra 455x455.jpg',
        //         'is_bundle' => '0',
        //     ],
        //     [
        //         'category_id' => '2',
        //         'company_id' => '1',
        //         'en' => ['name' => 'Product 4', 'description' => 'Product Description'],
        //         'ar' => ['name' => 'المنتج الرابع', 'description' => 'وصف المنتج'],
        //         'regular_price' => '56',
        //         'video' => 'https://www.youtube.com/watch?v=VZyeSy7yxR8',
        //         'photo' => '1592744396_Panadol Extra 455x455.jpg',
        //         'is_bundle' => '0',
        //     ],

        // ];


        // foreach ($allData as $data) {
        //     Product::create($data);
        // }
    }
}
