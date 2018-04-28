<?php

use Illuminate\Database\Seeder;

class ShelvesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shelves')->insert([
            'user_id' => \App\User::all()->first()->id,
            'book_id' => \App\Book::all()->first()->id,
        ]);
    }
}
