@extends('layouts.master')

@section('page-title')
Book Detail
@endsection


@push('style')
  body{
    background-color: #c9d874;
  }
  .container{
    padding: 20px;
  }
  .head-name{
    margin: 10px;
    padding: 10px;
  }
@endpush

@section('content')
<div class="container">
  <div class="text-center head-name">
    <h1>Book Detail</h1>
  </div>
  <div class="row">
    <div class="col-md-3 text-center">
      <img src="{{ empty($book->cover)? asset('img/book.jpg') : asset('img/'.$book->cover) }}" style="width:128px; height:164px;">
    </div> 
    <div class="col-md-9">
      <div class="panel-heading">
          <h2>{{ $book->name }}</h2>
      </div>
      
      <ul class="list-group">
        <li class="list-group-item">
          <span class="col 3" style="font-weight: bold">Author: </span><span class="col 9">{{ $book->author }} </span>
        </li>
        <li class="list-group-item">
          <span class="col 3" style="font-weight: bold">Description: </span><span class="col 9">{{ $book->description }}</span>
        </li>
        <li class="list-group-item">
          <span class="col 3" style="font-weight: bold">Barcode: </span><span class="col 9">{{ $book->barcode }}</span>
        </li>
        <li class="list-group-item">
          <span class="col 3" style="font-weight: bold">ISBN: </span><span class="col 9">{{ $book->isbn }}</span>
        </li>
      </ul>
    </div>
    
  </div>
</div>
@endsection
