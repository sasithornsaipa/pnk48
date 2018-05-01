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
        // return 'Hello Admin';
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
            $validated = $request->validate([
                'fname'=>'required',
                'lname'=>'required',
                'username'=>'required|min:4|unique:users,username',
                'password'=>'required|min:6|max:20|confirmed',
                'birthday'=>'required|date|before:today',
                'email'=>'required|email|unique:users,email',
                'address'=>'required|max:255'
            ]);
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
            return redirect('/admin/'.$admin->id);
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
        $sex = ["male"=>"Male", "female"=>"Female"];
        $status = ["normal"=>"Normal", "warn"=>"Warn", "banned"=>"Banned"];
        return view('admin.editUser', ['user'=>$user, 'sex'=>$sex, 'status'=>$status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $admin
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, User $admin)
    {
        try {
            $validated = $request->validate([
                'fname'=>'required',
                'lname'=>'required',
                'tel'=>'required',
                'email'=>'required|email',
                'address'=>'required|max:255'
            ]);
            $profile = \App\User::find($request->user_id)->profile;
            $profile->user_id = $request->input('user_id');
            $profile->fname = $request->input('fname');
            $profile->lname = $request->input('lname');
            $profile->tel = $request->input('tel');
            $profile->address = $request->input('address');

            $user = \App\User::find($request->user_id);
            $user->email = $request->input('email');
            $user->status = $request->input('status');

            $profile->save();
            $user->save();

            return redirect('/admin/'.$user->id);
        } catch(Exception $e) {
            return back()->withInput();
        }
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

    public function showEvent(Event $event) {
        $rewards = ['coupon'=>'Coupon', 'coin'=>'Coin'];
        $mission_type = ['normal'=>'Normal', 'rcgame'=>'RC Game', 'htGame'=>'Head-Tail Game'];
        return view('admin.showEvent', ['event'=>$event, 'rewards'=>$rewards, 'mission_type'=>$mission_type]);
    }

    public function createEvent() {
        $rewards = ['coupon'=>'Coupon', 'coin'=>'Coin'];
        $mission_type = ['normal'=>'Normal', 'rcgame'=>'RC Game', 'htGame'=>'Head-Tail Game'];
        return view('admin.createEvent', ['rewards'=>$rewards, 'mission_type'=>$mission_type]);
    }

    public function storeEvent(Request $request) {
        $validated = $request->validate([
            'name'=>'required',
            'description'=>'required',
            'start_time'=>'required|date|after_or_equal:today',
            'end_time'=>'required|date|after_or_equal:start_time'
        ]);
        $event = new Event;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->reward = $request->reward;
        $event->mission_type = $request->mission_type;
        $event->save();
        return redirect('/admin/event/'.$event->id);
    }

    public function editEvent(Event $event) {
        $rewards = ['coupon'=>'Coupon', 'coin'=>'Coin'];
        $mission_type = ['normal'=>'Normal', 'rcgame'=>'RC Game', 'htGame'=>'Head-Tail Game'];
        return view('admin.editEvent', ['event'=>$event, 'rewards'=>$rewards, 'mission_type'=>$mission_type]);
    }

    public function updateEvent(Event $event, Request $request) {
        $validated = $request->validate([
            'name'=>'required',
            'description'=>'required',
            'start_time'=>'required|date|after_or_equal:today',
            'end_time'=>'required|date|after_or_equal:start_time'
        ]);
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->reward = $request->input('reward');
        $event->start_time = $request->input('start_time');
        $event->end_time = $request->input('end_time');
        $event->mission_type = $request->input('mission_type');
        $event->save();
        return redirect('/admin/event/'.$event->id);
    }

    public function deleteEvent(Event $event) {
        $event->delete();
        redirect('/admin');
    }
}
