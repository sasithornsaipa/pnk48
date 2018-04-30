@extends('layouts.master')

@section('page-title')

Add New Book
    
@endsection

@push('style')
  body{
    background-color: #ce7f50;
  }
  .add-book{
    margin-top: 20px;
    background-color: #d9d2b1;
  }
  input{
    width: 100%;
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
@endpush

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid rounded add-book">

    <div class="text-center">
        <h2>Add & Check a book</h2>
        <br>
        <hr>
        <h5>Check a book</h5>
        <hr>
        @if($error)
        <div class="text-danger">
            {{ $error }}
        </div>
        @endif

        <form action="/shelfbook/addbook" method="post">
            @csrf
            <div class="row text-left">
                <div class="col-md-4 mb-3"></div>
                <div class="col-md-4 mb-3">
                    <label>Barcode: </label>
                    <input type="text" name="barcode" value="{{ old('barcode') }}" required>
                        <div class="text-danger">
                            {{ $errors->first('barcode') }}
                        </div>
                    <br>
                </div>
                <div class="col-md-4 mb-3"></div>
            </div>

            <div class="row text-left">
                <div class="col-md-4 mb-3"></div>
                <div class="col-md-4 mb-3">
                    <label>Isbn: </label>
                    <input type="text" name="isbn" value="{{ old('isbn') }}" required>
                        <div class="text-danger">
                            {{ $errors->first('isbn') }}
                        </div>
                </div>
                <div class="col-md-4 mb-3"></div>
            </div>
            <button class="btn btn-success" id="submitbtn" type="submit">CHECK</button>
        </form>
        
    </div>
</div>
@endsection