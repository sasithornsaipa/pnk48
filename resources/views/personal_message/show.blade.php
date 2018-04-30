<style>
    .send{
        text-align: right;
    }
    .recieve{
        text-align: left;
    }
    .box{
        background-color: azure;
        overflow: scroll;
        height:500px;
    }
    
    .header{
        text-indent: 100px;
    }
</style>

@extends('layouts.master')

@section('content')
<div class='jumbotron jumbotron-fluid header'>
    <h1 class=''>{{$interlocutor->username}}'s message</h1>
    <hr>
</div>
<div class='row'>
    <div class='col-md-3' style="align:center">
        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <img src={{$interlocutor->profile->image_path}} alt="Profile picture">
            <div class="card-header"><a href='/users/{{$interlocutor->id}}'>Full profile</a></div>
            <div class="card-body">
                <h5 class="card-title">{{$interlocutor->username}}</h5>
                <p class="card-text">{{"First name: ".$interlocutor->profile->fname}}</p>
                <p class="card-text">{{"Last name: ".$interlocutor->profile->lname}}</p>
            </div>
        </div>
    </div>
    <div class='col-md-6'>
        <div class='box border rounded border-info'>
            @foreach($all_message as $message)
            <p class=@if($message->sender->id == \Auth::user()->id)
                'send'
                @else
                'receieve'
                @endif
                >{{$message->time." ".$message->message}}
            </p>
            @endforeach
        </div>
        <form action="PersonalMessagesController@store" method="post">
            <div class='form-control'>
                <textarea name="chat-message" id="" cols="50" rows="5" class=''></textarea>
                <button type="submit" class='btn btn-submit'>Send</button>
            </div>
            
        </form>
    </div>
    <div class='col-md-3' style="align:center">
        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <img src={{Auth::user()->profile->image_path}} alt="Profile picture">
            <div class="card-header"><a href='/users/{{Auth::user()->id}}'>Full profile</a></div>
            <div class="card-body">
                <h5 class="card-title">{{Auth::user()->username}}</h5>
                <p class="card-text">{{"First name: ".Auth::user()->profile->fname}}</p>
                <p class="card-text">{{"Last name: ".Auth::user()->profile->lname}}</p>
            </div>
        </div>
    </div>
</div>

</div>
@endsection