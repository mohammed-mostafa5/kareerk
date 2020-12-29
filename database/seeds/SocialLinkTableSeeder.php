<?php

use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class SocialLinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allData = [
            ['name' => 'Facebook', 'link' => 'https://www.facebook.com/techvillageegypt', 'status' => 'Active',],
            ['name' => 'Twitter', 'link' => 'https://www.facebook.com/techvillageegypt', 'status' => 'Active',],
            ['name' => 'Instagram', 'link' => 'https://www.facebook.com/techvillageegypt', 'status' => 'Active',],
            ['name' => 'Linkedin', 'link' => 'https://www.facebook.com/techvillageegypt', 'status' => 'Active',],
            // [ 'name' => 'google-plus', 'link' => 'https://www.facebook.com/techvillageegypt', 'status' => 'Active', ],
            // [ 'name' => 'youtube', 'link' => 'https://www.facebook.com/techvillageegypt', 'status' => 'Inactive', ],
            // [ 'name' => 'pinterest', 'link' => 'https://www.facebook.com/techvillageegypt', 'status' => 'Inactive', ]
        ];


        foreach ($allData as $data) {

            SocialLink::create($data);
        }
    }
}
