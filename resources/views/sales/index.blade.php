@extends('layouts.master')

@section('title')
  Books
@endsection

@push('style')

@endpush

@section('content')
  <main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Album example</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">

        @foreach($sales as $sale)
          <div class="col-md-4">
            <div class="card mb-4 box-shadow ">
              <div class="text-center">
                <img class="card-img-top" src="{{$sale->images[0]->path}}" alt="Card image cap" style="max-width:200px;">
              </div>
              <div class="card-body">
                <p class="card-text">

                </p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  </main>
@endsection
