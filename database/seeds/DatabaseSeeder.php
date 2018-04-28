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
        $this->call(UsersTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(ShelvesTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(ReportsTableSeeder::class);
    }
}
