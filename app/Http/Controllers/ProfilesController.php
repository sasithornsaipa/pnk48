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
        // return "show page";
        return view('profile.show', ['profile' => $profile, 'userprodetail' => $userprodetail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $userprofile = \Auth::user()->profile->user_id;
        $profile = \Auth::user()->profile;
        $userprodetail = User::find($userprofile);
        $vertificationDoc = \App\VerificationDoc::where('user_id', \Auth::user()->id)->first();

        $sex = [
            'female' => 'female', 
            'male' => 'male', 
        ];
        // return "edit page";
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
            'images[]' => 'mimes:jpeg,bmp,png|max:2048'
          ]);

        $userprofile = $profile->user_id;
        $userprodetail = User::find($userprofile);
        $userprodetail->save();

        $profile->fname = $request->input('fname');
        $profile->lname = $request->input('lname');
        $profile->sex = $request->input('sex');
        $profile->birthday = $request->input('birthday');
        $profile->tel = $request->input('tel');
        $profile->address = $request->input('address');

        $input=$request->all();
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalExtension();
                $upload = $file->move(public_path() . '/img' . '/', $userprodetail->username . '.' . $name);
                $profile->image_path = '/img' . '/'. $userprodetail->username . '.' . $name;
            }
        }

        $profile->save();

        return redirect('/profile/edit');

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
