<style>
    .profile{
        width:125px;
        height:125px;
        margin-left: 50px;
    }
    .header{
        text-indent: 100px;
    }
</style>

@extends('layouts.master')

@section('content')
<div class='jumbotron jumbotron-fluid header'>
    <h1 class=''>Recently contact</h1>
    <hr>
</div>
<div class='row'>
    <div class='col-md-2'>
        <p>left col</p>
    </div>
    <div class='col-md-8'>
        @foreach($messages as $message)
        <a href="/personal_messages/{{$message->sender->id}}" style='width:100%;'>
            <div class='card bg-light'>
                <div class='card-body'>
                    <div class='row'>
                        <div class='col-4'>
                            <img src="{{$message->sender->profile->image_path}}" alt="Sender's image profile." class='profile'>
                        </div>
                        <div class='col-8'>
                            <a href="/users/{{$message->sender_id}}"><h3 class='card-text'>{{$message->sender->profile->fname." ".$message->sender->profile->lname}}</h3></a>
                            <label> {{$message->time}}<p>{{$message->message}}</p></label>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
        
    </div>
    
    <div class='col-md-2'>
        <p>right col</p>
    </div>
</div>

@endsection