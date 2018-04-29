<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;
use App\Report;
use App\Profile;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usernames = User::orderBy('username', 'ASC')->get();
        $events = Event::orderBy('name', 'ASC')->get();
        $reports = Report::orderBy('created_at', 'DESC')->get();
        return view('admin.index', ['usernames'=>$usernames, 'events'=>$events, 'reports'=>$reports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAdmin()
    {
        $sex = ["male"=>"Male", "female"=>"Female"];
        return view('admin.createAdmin', ['sex'=>$sex]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAdmin(Request $request)
    {
        try {
            $admin = new User;
            $admin->username = $request->username;
            $admin->verified = true;
            $admin->status = 'normal';
            $admin->user_level = 'admin';
            $admin->password = bcrypt($request->password);
            $admin->email = $request->email;
            $admin->save();

            $adminProfile = new Profile;
            $adminProfile->user_id = $admin->id;
            $adminProfile->address = $request->address;
            $adminProfile->birthday = $request->birthday;
            $adminProfile->sex = $request->sex;
            $adminProfile->coin = 0;
            $adminProfile->fname = $request->fname;
            $adminProfile->lname = $request->lname;
            $adminProfile->tel = $request->tel;
            $adminProfile->save();
            return redirect('/admin/show/user/'.$admin->id);
        } catch(Exception $e) {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showUser(User $user)
    {
        return view('admin.showUser', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editUser(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $admin->delete();
        redirect('/admin');
    }
}
