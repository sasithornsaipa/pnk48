@extends('layouts.master')

@section('title')
  {{$event->name}} Event
@endsection

@push('style')
  .jumbotron {
      margin: 3% -1%;
  }
  .col-lg-8{
    margin-left: 0.5%;
    margin-top: -2%;
  }
  .col-md-3{
      margin-top: 5%;
      max-width: 23%;
  }
  a{
      color: #696969;
  }
  a:hover{
      color: #808080;
  }
@endpush

@section('content')

<!-- Page Content -->
<div class="container">
  <div class="jumbotron jumbotron-fluid">
    <div class="row justify-content-around">
    <!-- Post Content Column -->
        <div class="col-lg-8">
            <!-- Title -->
            <h1 class="mt-4">{{$event->name}} Event</h1>
            <!-- Date/Time -->
            <p class="font-weight-light">Posted by PMK48 ADMIN on {{$created_date}}</p>
            <hr>
            <!-- Preview Image -->
            <img class="img-fluid rounded" src="/img/IMG_8307.jpg" alt="" width="90%">
            <hr>
            <!-- Post Content -->
            <p class="lead font-weight-bold">How To Get Reward</p>
            <blockquote class="blockquote">
              <p class="mb-0 font-weight-normal">{{$event->description}}</p>
              <p class="mb-0 font-weight-light">{{$event->start_time}} to {{$event->end_time}} </p>
            </blockquote>
            <hr>
        </div>

        <div class="col-md-3">
          <p class="font-weight-normal">Recommended Events</p>
          <hr>
          @foreach($event_all as $e)
            @if($e->end_time > date("Y-m-d"))
              <!-- Side Widget -->
                <div class="card my-4" >
                  <h5 class="card-header"><a href="{{url('/events/' . $e->id)}}">{{$e->name}}</a></h5>
                  <div class="card-body">
                    {{$e->description}}
                  </div>
                </div>
              @endif
          @endforeach
      </div>
    </div>
    </div>
  </div>
@endsection
