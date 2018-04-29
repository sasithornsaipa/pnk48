<?php

use Illuminate\Database\Seeder;

class PersonalMessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PersonalMessage::class, 500)->create();
        
    }
}
