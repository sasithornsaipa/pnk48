<style>
    .box{
        background-color: azure;
        overflow: scroll;
        height:500px;
    }
    .send{
        width:-50%;
        text-align: right;
    }
    .recieve{
        width:50%;
        text-align: left;
    }
    .header{
        text-indent: 100px;
    }
    
    textarea {
        resize:vertical;
    }
    
    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }
    
    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888; 
    }
    
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555; 
    }
    
    .profile{
        width:200px;
        height:200px;
    }
    
</style>
@push('scripts')
<script type="text/javascript" src="{{ asset('js/enter_button_controller.js') }}"></script>
@endpush
@extends('layouts.master')

@section('content')
<div class='jumbotron jumbotron-fluid header'>
    <h1 class=''>{{$interlocutor->username}}'s message</h1>
    <hr>
</div>
<div class='row'>
    <div class='col-md-3'>
        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <img src={{$interlocutor->profile->image_path}} alt="Profile picture" class='card-img-top'>
            <div class="card-header"><a href='/profile/{{$interlocutor->id}}'>Full profile</a></div>
            <div class="card-body">
                <h5 class="card-title">{{$interlocutor->username}}</h5>
                <p class="card-text">{{"First name: ".$interlocutor->profile->fname}}</p>
                <p class="card-text">{{"Last name: ".$interlocutor->profile->lname}}</p>
            </div>
        </div>
    </div>
    <div class='col-md-6'>
        <h3>Chat box</h3>
        <div class='box border rounded border-info'>
            @foreach($all_message as $message)
            {{-- <p class=@if($message->sender->id == \Auth::user()->id)
                'send'
                @else
                'receieve'
                @endif
                >{{$message->created_at." ".$message->message}}
            </p> --}}
            <div class=@if($message->sender->id == \Auth::user()->id)
                'd-flex justify-content-end send'
                @else
                'd-flex justify-content-start recieve'
                @endif >
                <div class='card'>
                    <p class='card-header'>{{$message->created_at}}</p>
                    <p class='card-text'>{{$message->message}}</p>
                </div>
            </div>
            @endforeach
        </div>
        <form action="{{route('personal_messages.store', ['interlocutor' => $interlocutor])}}" method="post">
            {{ csrf_field() }}
            <div class='form-control'>
                <textarea name="message" id="message" cols="70" rows="5" class='' draggable="false"></textarea>
                <button type="submit" class='btn btn-submit'>Send</button>
            </div>
            
        </form>
    </div>
    <div class='col-md-3'>
        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <img src={{Auth::user()->profile->image_path}} alt="Profile picture" class='card-img-top'>
            <div class="card-header"><a href='/profile/{{Auth::user()->id}}'>Full profile</a></div>
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