@extends('layouts.master')

@section('title')
  {{$event->name}} Event
@endsection

@push('style')
  body{
    background-color: rgb(114, 49, 11, .7);
  }
  .jumbotron {
    margin: 3% -1%;
    background-color: rgb(233, 236, 238, 0.7);
  }
  .col-lg-8{
    margin-left: 0.5%;
    margin-top: -2%;
  }
  .col-md-3{
    margin-top: 5%;
    max-width: 23%;
  }
  .my-4{
    background-color: rgb(104, 165, 0, .125);
  }
  a{
    color: #696969;
  }
  a:hover{
    color: #808080;
  }
  .mb-1{
    color: rgb(233, 236, 238);
  }
  .list-inline-item a{
    color: rgb(233, 236, 238);
  }
  .vl{
    border-left: 0.5px solid rgba(0,0,0,.1);
    height: 700px;
    position: absolute;
    left: 69%;
    margin-left: -3px;
    top: 28%;
  }
@endpush

@section('content')

<!-- Page Content -->
<div class="container">
  <div class="jumbotron jumbotron-fluid">
    <div class="row justify-content-around vertical-divider">
    <!-- Post Content Column -->
        <div class="col-lg-8">
            <!-- Title -->
            <h1 class="mt-4">{{$event->name}} Event</h1>
            <!-- Date/Time -->
            <p class="font-weight-light">Posted by PMK48 ADMIN on {{$created_date}}</p>
            <hr>
            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{$event->image_path}}" alt="" width="90%" style="margin-bottom: 4%">

            <!-- Post Content -->
            <p class="lead font-weight-bold">How To Get Reward</p>
            <hr>
            <blockquote class="blockquote">
              <p class="mb-0 font-weight-normal">{{$event->description}}</p>
              <p class="mb-0 font-weight-light">{{$event->start_time}} to {{$event->end_time}} </p>
            </blockquote>

        </div>
        <div class="vl"></div>

        <div class="col-md-3">
          <p class="font-weight-normal">Recommended Events</p>
          <hr>
          @foreach($event_all as $e)
              <!-- Side Widget -->
                <div class="card my-4" >
                  <h5 class="card-header"><a href="{{url('/events/' . $e->id)}}">{{$e->name}}</a></h5>
                  <div class="card-body">
                    {{$e->description}}
                  </div>
                </div>
          @endforeach
      </div>
    </div>
    </div>
  </div>
@endsection
