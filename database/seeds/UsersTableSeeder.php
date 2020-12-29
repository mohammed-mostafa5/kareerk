<?php

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

            'first_name' => 'Ahmed',
            'last_name' => 'Abdullah',
            'username' => 'ahmed777',
            'code' => 'AH1205',
            'phone' => '01001010101',
            'identification' => 'id.jpg',
            'address' => 'Nasr-City, Cairo, Egypt',
            'email' => 'user@email.com',
            'password' => 'password',
            'approved_at' => now(),
            'email_verified_at' => now(),
        ]);

        factory(App\Models\User::class, 10)->create();
    }
}
