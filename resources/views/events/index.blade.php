@extends('layouts.master')

@section('title')
  Events
@endsection

@push('style')
  .album{
    color: rgb(114, 49, 11, .7);
  }
  .my-4{
    background-color: rgb(104, 165, 0, .125);
  }
@endpush

@section('content')

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">

        @foreach($events as $event)
          <div class="col-md-4">
            <div class="card mb-4  ">
              <div class="text-center" style="margin-top: 4%;">
                <img class="card-img-top" src="{{$event->image_path}}" alt="Card image cap" style="max-width:310px;">
              </div>
              <div class="card-body">
                <p class="card-text">
                  <blockquote>
                    <p class="mb-0 font-weight-normal">{{ucfirst($event->name)}} Event</p>
                    <p class="mb-0 font-weight-normal">{{$event->description}}</p>
                    <p class="mb-0 font-weight-light">{{$event->start_time}} to {{$event->end_time}} </p>
                    <hr>

                    @if( $event->reward  == 'coin')
                      <p class="mb-0 font-weight-normal text-left" style="font-size:20px">Reward  <i class="fab fa-bitcoin"></i> {{$event->reward}}</p>
                    @else
                      <p class="mb-0 font-weight-normal text-left" style="font-size:20px">Reward  <i class="fas fa-ticket-alt"></i> {{$event->reward}}</p>
                    @endif
                  </blockquote>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">{{$event->created_at->diffForHumans()}}</small>
                  <div class="btn-group">
                    <a class="btn btn-sm btn-outline-success" href="/events/{{$event->id}}" role="button">View</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

@endsection
