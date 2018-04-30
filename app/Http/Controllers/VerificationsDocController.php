<?php

namespace App\Http\Controllers;

use App\VerificationDoc;
use Illuminate\Http\Request;

class VerificationsDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verificationDoc = VerificationDoc::all();
        return view('verificationDoc.index', compact('verificationDoc'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('verificationDoc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // try{
        //     $verificationDoc = new VerificationDoc;
        //     $verificationDoc->user_id = \Auth::user()->id;
        //     $verificationDoc->document = "dfsd";
        //     $verificationDoc->save();
            return redirect('/profile/' . 6);
            // return redirect('/verificationDoc/');
        // }catch(exception $e){
        //     return back()->withInput();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VerificationDoc  $verificationDoc
     * @return \Illuminate\Http\Response
     */
    public function show(VerificationDoc $verificationDoc)
    {
        return view('verificationDoc.show', ['verificationDoc' => $verificationDoc]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VerificationDoc  $verificationDoc
     * @return \Illuminate\Http\Response
     */
    public function edit(VerificationDoc $verificationDoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VerificationDoc  $verificationDoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VerificationDoc $verificationDoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VerificationDoc  $verificationDoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(VerificationDoc $verificationDoc)
    {
        //
    }
}
