<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Sale;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $profiles = Profile::all();
        // return view('Profile/index', ['profiles' => $profiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = new Profile;

        $profile->user_id = \Auth::user()->id;
        $profile->fname = $request->input('fname');
        $profile->lname = $request->input('lname');
        $profile->save();
        return redirect('/profile/' . $profile->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        $userprofile = $profile->user_id;
        $userprodetail = User::find($userprofile);
        return view('profile/show', ['profile' => $profile, 'userprodetail' => $userprodetail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $userprofile = $profile->user_id;
        $userprodetail = User::find($userprofile);
        $vertificationDoc = \App\VerificationDoc::where('user_id', \Auth::user()->id)->first();

        $sex = [
            'female' => 'female', 
            'male' => 'male', 
        ];
        return view('profile.edit', ['profile' => $profile, 'userprodetail' => $userprodetail, 'sex' => $sex, 'vertificationDoc' => $vertificationDoc]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        // usernameemailpassword
        $validatedData = $request->validate([
            'id' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'sex' => 'required',
            'birthday' => 'required',
            'images[]' => 'mimes:jpeg,bmp,png|max:2048'
          ]);

        $userprofile = $profile->user_id;
        $userprodetail = User::find($userprofile);
        $userprodetail->username = $request->input('username');
        $userprodetail->email = $request->input('email');
        $userprodetail->password = bcrypt($request->input('password'));
        $userprodetail->save();

        $profile->fname = $request->input('fname');
        $profile->lname = $request->input('lname');
        $profile->sex = $request->input('sex');
        $profile->birthday = $request->input('birthday');

        $input=$request->all();
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalExtension();
                $upload = $file->move(public_path() . '/img' . '/', $request->input('username') . '.' . $name);
                $profile->image_path = '/img' . '/'. $request->input('username') . '.' . $name;
            }
        }

        $profile->save();

        return redirect('/profile/' . $profile->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //ำ
    }

    public function showBuy(Profile $profile)
    {
        $sale = \App\Sale::where('buyer_id', $profile->user_id)->get();
        $books = [];
        foreach ($sale as $book) {
            $books[] = \App\Book::where('id', '=', $book->book_id )->get();
        }
        return view('profile/buy', ['sale' => $sale, 'books' => $books, 'profile'=>$profile]);
    }
    

    public function showSell(Profile $profile)
    {
        $sale = \App\Sale::where('seller_id',$profile->user_id)->get();
        $books = [];
        foreach ($sale as $book) {
            $books[] = \App\Book::where('id', '=', $book->book_id )->get();
        }
        return view('profile/sell', ['sale' => $sale, 'books' => $books]);
    }
    
}
