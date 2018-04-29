@extends('layouts.master')

@section('content')
<h1>INDEX PM</h1>
@foreach($messages as $message)
<a href="/personal_message/{{$message->sender_id}}">{{$message->sender_id}}</a>
@endforeach
@endsection