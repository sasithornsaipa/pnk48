@extends('layouts.master')

@section('title')
  Confirm Money Tranfer
@endsection

@push('style')
body{
  background-color:rgb(114, 49, 11, .7);
}
@endpush

@section('content')
    
    <div class="container" style="margin-top: 11%;">
    <div class="row text-center">
      <div class="col-md-4"></div>
      <div class="col-md-4 border rounded " style="background-color:white; padding: 2%">
        <div class="icon">
          <i class="fas fa-check-circle" style="font-size:60px; color: green;"></i>
        </div>
        <!--/.icon-->
        <h1>Success!</h1>
        <p>Thank You for your order.</p>
        <a role="button" class="btn btn-sm btn-outline-success" href="/sales">OK</a>
      </div>
      <div class="col-md-4"></div>
      <!--/.success-->
    </div>
    </div>
    <!--/.container-->
@endsection
