<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(CorporationsSeeder::class);
        $this->call(OptionsSeeder::class);
        $this->call(StepsSeeder::class);
    }
}
