<?php

use App\Models\Freelancer;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ahmed Abdullah',
            'phone' => '01001010101',
            'country_id' => '1',
            'userable_id' => '1',
            'userable_type' => 'App\Models\Freelancer',
            'email' => 'user@email.com',
            'password' => 'password',
            'approved_at' => now(),
            'email_verified_at' => now(),
        ]);


        Freelancer::create([
            'main_service_id' => 1,
            'expertise_level' => 1,
            'hourly_rate' => 10,
            'title' => 'Web Developer',
            'overview' => 'PHP Web Developer',
            'city' => 'Cairo',
            'address' => 'Nasr-City, Cairo, Egypt',
        ]);

        // factory(App\Models\User::class, 10)->create();
    }
}
