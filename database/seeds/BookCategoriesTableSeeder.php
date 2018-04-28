<?php

use Illuminate\Database\Seeder;

class BookCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cate = ['scifi', 'drama', 'action&adventure', 'romance', 'mystery', 'horror', 'health', 'guide',
                         'travel', 'children', 'newage', 'science', 'history', 'math', 'anthology', 'poetry', 'encyclopedias',
                         'dictionaries', 'comics', 'art', 'cookbooks', 'diaries', 'journals', 'prayerbooks', 'series', 'trilogy',
                         'biographies', 'autobiographies', 'fantasy'];

		DB::table('book_categories')->insert([
            'book_id' => \App\Book::all()->first()->id,
        ]);
    }
}
