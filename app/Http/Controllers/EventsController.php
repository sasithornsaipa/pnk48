<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $events = Event::all();
      return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $reward = ['coupon', 'coin'];
      $mission_type = ['normal' => 'Normal', 'rcgame' => 'Random Card Game', 'htgame' => 'Head or Tail Game'];
      date_default_timezone_set("Asia/Bangkok");
      $today = date("Y-m-d");
      return view('events.create', ['reward' => $reward, 'mission_type' => $mission_type, 'today' => $today]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|min:3|max:255',
        'reward' => 'required',
        'description' => 'required|min:10',
        'start_time' => 'required',
        'end_time' => 'required',
        'mission_type' => 'required',
        'images[]' => 'mimes:jpeg,bmp,png|max:2048'
      ]);

      $event = new Event;
      $event->name = $request->input('name');
      $event->reward = $request->input('reward');
      $event->description = $request->input('description');
      $event->start_time = $request->input('start_time');
      $event->end_time = $request->input('end_time');
      $event->mission_type = $request->input('mission_type');

      $input=$request->all();
      $images=array();
      if($files=$request->file('images')){
          foreach($files as $file){
              $name=$file->getClientOriginalExtension();
              $upload = $file->move(public_path() . '/event_images' . '/', $request->input('name') . '.' . $name);
              $event->image_path = '/event_images' . '/'. $request->input('name') . '.' . $name;
          }
      }

      $event->save();
      if (\Auth::user()->user_level == 'admin') {
        return redirect('/admin');
      }
      return redirect('/events/' . $event->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
      $today = date("Y-m-d");
      $event_all = Event::where('end_time', '>=', $today)->paginate(4);
      $m = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
      $data = $event->created_at;
      $dnt = explode(' ', $data);
      $d = explode('-', $dnt[0]);
      $created_date = $d[2] ." ". $m[(int)$d[1]] .", ". $d[0];
      return view('events.show', ['event' => $event, 'created_date' => $created_date, 'event_all' => $event_all]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
      $reward = ['coupon', 'coin'];
      $mission_type = ['normal' => 'Normal', 'rcgame' => 'Random Card Game', 'htgame' => 'Head or Tail Game'];
      date_default_timezone_set("Asia/Bangkok");
      $today = date("Y-m-d");
      return view('events.edit', ['event' => $event, 'reward' => $reward, 'mission_type' => $mission_type, 'today' => $today]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
      $validatedData = $request->validate([
        'name' => 'required|min:3|max:255',
        'reward' => 'required',
        'description' => 'required|min:10',
        'start_time' => 'required',
        'end_time' => 'required',
        'mission_type' => 'required',
        'images.[]' => 'image|mimes:jpeg,bmp,png|max:2048'
      ]);

      $event->name = $request->input('name');
      $event->reward = $request->input('reward');
      $event->description = $request->input('description');
      $event->start_time = $request->input('start_time');
      $event->end_time = $request->input('end_time');
      $event->mission_type = $request->input('mission_type');

      $input=$request->all();
      $images=array();
      if($files=$request->file('images')){
          foreach($files as $file){
            $name=$file->getClientOriginalExtension();
            $upload = $file->move(public_path() . '/event_images' . '/', $request->input('name') . '.' . $name);
            $event->image_path = '/event_images' . '/'. $request->input('name') . '.' . $name;
          }
      }

      $event->save();

      return redirect('/events/' . $event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
      $event->delete();
      return redirect('/events');
    }
}
