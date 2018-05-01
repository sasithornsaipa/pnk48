@extends('layouts.master') 
@section('page-title') Event Detail: {{ $event->name }}
@endsection
 
@section('content')
<div class="container-fluid">
    <div class="jumbotron">
        <div class="card">
            <img class="card-img-top" src="" alt="Event image">
            <hr/>
            <div class="card-body">
                <h5 class="card-title">{{ $event->name }}</h5>
                <hr/>
                <label>Description: </label>
                <p class="card-text">{{ $event->description }}</p>
                <hr/>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Start Date:</label>
                        <p class="card-text">{{ $event->start_time }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>End Date:</label>
                        <p class="card-text">{{ $event->end_time }}</p>
                    </div>
                </div>
                <hr/>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Mission Type: </label>
                        <p class="card-text">{{ $mission_type[$event->mission_type] }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Reward: </label>
                        <p class="card-text">{{ $rewards[$event->reward] }}</p>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="col-md-4 mb-3">
                <a href="{{ url('/admin/event/'.$event->id.'/edit') }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>

</div>
@endsection