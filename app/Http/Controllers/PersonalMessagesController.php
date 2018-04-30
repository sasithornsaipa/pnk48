<?php

namespace App\Http\Controllers;

use App\PersonalMessage;
use Illuminate\Http\Request;

class PersonalMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$all_rec = \App\PersonalMessage::where('reciever_id', '=', 2)->get();

		//return $all_message;
        return view('personal_message.index', ['messages' => $all_message]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PersonalMessage  $personalMessage
     * @return \Illuminate\Http\Response
     */
    public function show($sender)
    {
		$all_sen = \App\PersonalMessage::where('sender_id', '=', 2)->where('reciever_id', '=', 1)->get(); 
		$all_rec = \App\PersonalMessage::where('sender_id', '=', 1)->where('reciever_id', '=', 2)->get(); 
		if (empty($all_rec->toArray())){
			return view('personal_message.show', ['all_message' => $all_sen]);
		}else if(empty($all_sen->toArray())){
			return view('personal_message.show', ['all_message' => $all_rec]);
		}else{
			$all_message = array_merge($all_sen->toArray(), $all_rec->toArray());
			return view('personal_message.show', ['all_message' => $all_message]);
		}

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersonalMessage  $personalMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonalMessage $personalMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersonalMessage  $personalMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonalMessage $personalMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersonalMessage  $personalMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonalMessage $personalMessage)
    {
        //
    }
}
