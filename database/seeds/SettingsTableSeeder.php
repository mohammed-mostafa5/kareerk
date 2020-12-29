<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Setting::whereIn('id', [1, 2, 3, 4])->exists()) {
            DB::table('settings')->insert([
                [
                    'key' => 'theme',
                    'value' => 'wordpress'
                ],
                [
                    'key' => 'logo',
                    'value' => 'logo.png'
                ],
                [
                    'key' => 'favicon',
                    'value' => 'favicon.png'
                ],
                [
                    'key' => 'title_prefix',
                    'value' => ' | Kareerk'
                ],
                [
                    'key' => 'site_name',
                    'value' => 'Kareerk'
                ],
                [
                    'key' => 'primary_bg',
                    'value' => '#9cc914'
                ],
                [
                    'key' => 'primary_hover',
                    'value' => '#6f930b'
                ]
            ]);
        }
    }
}
