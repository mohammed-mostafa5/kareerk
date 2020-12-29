<?php

use App\Models\Ads;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsTableSeeder extends Seeder
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
                'page' => 'home',
                'photo' => '1591528943_ad-1.jpg',
                'link' => '#',
                'width' => '1170',
                'height' => '245',
            ],
            [
                'page' => 'home',
                'photo' => '1591529245_ad-2.jpg',
                'link' => '#',
                'width' => '570',
                'height' => '210',
            ],
            [
                'page' => 'home',
                'photo' => '1591529263_ad-2.jpg',
                'link' => '#',
                'width' => '570',
                'height' => '210',
            ],
        ];

        if (!DB::table('ads')->first()) {
            foreach ($allData as $data) {
                DB::table('ads')->insert($data);
            }
        }
    }
}
