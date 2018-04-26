<?php

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
        $admin = new App\User;
        $admin->username = 'admin';
        $admin->username = 'sasithorn.sai@ku.th';
        $admin->password = bcrypt('admin');
        $admin->verified = true;
        $admin->status = 'normal';
        $admin->user_level = 'admin';
        $admin->save();

        factory(App\User::class, 5)->create();
    }
}
