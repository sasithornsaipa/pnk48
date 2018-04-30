@extends('layouts.master')

@section('title')
  Books
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
      <div class="row text-right">
        <div class="col-md-10"></div>
        <div class="col-md-2"><a class="btn btn-sm btn-outline-success" href="/sales/create" role="button">Create Sales</a></div>
      </div>
      <h1 class="mt-4"> <i class="fas fa-shopping-bag"></i> Retail </h1><hr>
        <div class="row">
          @foreach($sales as $sale)
            @if($sale->sale_type == 'retail')
              <div class="col-md-4">
                <div class="card mb-4  ">
                  <div class="text-center" style="margin-top: 4%;">
                    <img class="card-img-top" src="{{$sale->images[0]->path}}" alt="Card image cap" style="max-width:180px;">
                  </div>
                  <div class="card-body">
                    <p class="card-text">
                      <blockquote>
                        <p class="mb-0 font-weight-normal">{{ucfirst($sale->books->name)}}</p>
                        <p class="mb-0 font-weight-normal">
                          Author:&nbsp;&nbsp;
                          <span class="mb-0 font-weight-light">{{ucfirst($sale->books->author)}}</span>
                        </p>
                        <hr>
                        <p class="mb-0 font-weight-normal text-center">Book Condition</p>
                        <blockquote class="blockquote text-center">
                          <div class="condition">
                            @if($sale->book_condition > 90 )
                            <p class="mb-0 text-center" style="font-size: 20px;"><i class="fa fa-smile-o" ></i>&nbsp;As New</p>
                            @elseif($sale->book_condition > 70 )
                            <p class="mb-0 text-center" style="font-size: 20px;"><i class="fa fa-smile-o" ></i>&nbsp;Fine</p>
                            @elseif($sale->book_condition > 60 )
                            <p class="mb-0 text-center" style="font-size: 20px;"><i class="fa fa-smile-o" ></i>&nbsp;Very Good</p>
                            @elseif($sale->book_condition > 50 )
                            <p class="mb-0 text-center" style="font-size: 20px;"><i class="fa fa-smile-o" ></i>&nbsp;Good</p>
                            @elseif($sale->book_condition >= 40 )
                              <p class="mb-0 text-center" style="font-size: 20px;"><i class="fa fa-meh-o" ></i>&nbsp;Fair</p>
                            @else
                            <p class="mb-0 text-center" style="font-size: 20px;"><i class="fa fa-frown-o" ></i>&nbsp;Poor</p>
                            @endif
                          </div>
                        </blockquote>
                      </blockquote>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <small class="text-muted">Posted by {{ucfirst($sale->seller->username)}}</small>
                      <small class="text-muted">{{$sale->created_at->diffForHumans()}}</small>
                      <div class="btn-group">
                        <a class="btn btn-sm btn-outline-success" href="/sales/{{$sale->id}}" role="button">View</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          @endif
        @endforeach
      </div>

      <h1 class="mt-4"> <i class="fas fa-gavel"></i> Bid </h1><hr>
        <div class="row">
          @foreach($sales as $sale)
            @if($sale->sale_type == 'bid')
              <div class="col-md-4">
                <div class="card mb-4  ">
                  <div class="text-center" style="margin-top: 4%;">
                    <img class="card-img-top" src="{{$sale->images[0]->path}}" alt="Card image cap" style="max-width:180px;">
                  </div>
                  <div class="card-body">
                    <p class="card-text">
                      <blockquote>
                        <p class="mb-0 font-weight-normal">{{ucfirst($sale->books->name)}}</p>
                        <p class="mb-0 font-weight-normal">
                          Author:&nbsp;&nbsp;
                          <span class="mb-0 font-weight-light">{{ucfirst($sale->books->author)}}</span>
                        </p>
                        <hr>
                        <p class="mb-0 font-weight-normal text-center">Book Condition</p>
                        <blockquote class="blockquote text-center">
                          <div class="condition">
                            @if($sale->book_condition > 90 )
                            <p class="mb-0 text-center" style="font-size: 20px;"><i class="fa fa-smile-o" ></i>&nbsp;As New</p>
                            @elseif($sale->book_condition > 70 )
                            <p class="mb-0 text-center" style="font-size: 20px;"><i class="fa fa-smile-o" ></i>&nbsp;Fine</p>
                            @elseif($sale->book_condition > 60 )
                            <p class="mb-0 text-center" style="font-size: 20px;"><i class="fa fa-smile-o" ></i>&nbsp;Very Good</p>
                            @elseif($sale->book_condition > 50 )
                            <p class="mb-0 text-center" style="font-size: 20px;"><i class="fa fa-smile-o" ></i>&nbsp;Good</p>
                            @elseif($sale->book_condition >= 40 )
                              <p class="mb-0 text-center" style="font-size: 20px;"><i class="fa fa-meh-o" ></i>&nbsp;Fair</p>
                            @else
                            <p class="mb-0 text-center" style="font-size: 20px;"><i class="fa fa-frown-o" ></i>&nbsp;Poor</p>
                            @endif
                          </div>
                        </blockquote>
                      </blockquote>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <small class="text-muted">Posted by {{ucfirst($sale->seller->username)}}</small>
                      <small class="text-muted">{{$sale->created_at->diffForHumans()}}</small>
                      <div class="btn-group">
                        <a class="btn btn-sm btn-outline-success" href="/sales/{{$sale->id}}" role="button">View</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          @endif
        @endforeach
      </div>

    </div>
  </div>

@endsection
