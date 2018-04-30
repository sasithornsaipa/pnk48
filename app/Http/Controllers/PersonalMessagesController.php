<?php

namespace App\Http\Controllers;

use App\User;
use App\PersonalMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PersonalMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_rec = \App\PersonalMessage::where('reciever_id', '=', \Auth::user()->id)->get();
        $all_rec = $all_rec->sortByDesc('sender_id');
        $sender_list = [];
        $all_message = collect([]);
        for ($i = 0 ; $i < count($all_rec) ; $i++){
            $record = $all_rec[$i];
            if ( !in_array($record->sender->id, $sender_list)){
                array_push($sender_list, $record->sender->id);
                $all_message->push($record);
            }
        }
        $all_message = $all_message->sortByDesc('created_at');
        return view('personal_message.index', ['messages' => $all_message->values()->all()]);
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
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PersonalMessage  $personalMessage
     * @return \Illuminate\Http\Response
     */
    public function show($interlocutor_id)
    {
        $interlocutor = User::find($interlocutor_id);
		$all_sen = \App\PersonalMessage::where('sender_id', '=', \Auth::user()->id)->where('reciever_id', '=', $interlocutor->id)->get(); 
		$all_rec = \App\PersonalMessage::where('sender_id', '=', $interlocutor->id)->where('reciever_id', '=', \Auth::user()->id)->get(); 
        
        if (empty($all_rec->toArray())){
            $all_sen = $all_sen->sortBy('created_at');
			return view('personal_message.show', ['all_message' => $all_sen, 'interlocutor'=>$interlocutor]);
		}else if(empty($all_sen->toArray())){
            $all_rec = $all_rec->sortBy('created_at');
			return view('personal_message.show', ['all_message' => $all_rec, 'interlocutor'=>$interlocutor]);
		}else{
            $all_message = $all_rec->merge($all_sen);
			// $all_message = array_merge($all_sen->toArray(), $all_rec->toArray());
            $all_message = $all_message->sortBy('created_at');
			return view('personal_message.show', ['all_message' => $all_message, 'interlocutor'=>$interlocutor]);
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
