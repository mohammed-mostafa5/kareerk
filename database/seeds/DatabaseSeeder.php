<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(RolesPermissionsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(InformationsTableSeeder::class);
        $this->call(ParagraphTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(SocialLinkTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(ProductSeeder::class);
    }
}
