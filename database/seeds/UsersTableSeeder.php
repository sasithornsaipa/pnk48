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
        // $admin = new App\User;
        // $admin->username = 'admin';
        // $admin->email = 'sasithorn.sai@ku.th';
        // $admin->password = bcrypt('admin');
        // $admin->verified = true;
        // $admin->status = 'normal';
        // $admin->user_level = 'admin';
        // $admin->save();

        // $member = new App\User;
        // $member->username = 'meawsasiz';
        // $member->email = 'meawsasiz@hotmail.com';
        // $member->password = bcrypt('123456');
        // $member->verified = true;
        // $member->status = 'normal';
        // $member->user_level = 'member';
        // $member->save();

        factory(App\User::class, 50)->create();        
    }
}
