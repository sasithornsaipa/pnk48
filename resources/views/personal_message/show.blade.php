@extends('layouts.master')

@section('content')
<h1>SHOW PM</h1>
@foreach($all_message as $message)
@if($message->sender->id == 1)
<p style='text-align:left;'>{{$message->sender->username." : ".$message->message}}</p>
@else
<p style='text-align:right;'>This is false = {{$message->reciever->username." : ".$message->message}}</p>
@endif
@endforeach
@endsection