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

        @if( $checkValue != null)
            {{ $checkValue}}
        @endif

        <form action="/shelfbook/create" method="post">
            @csrf
            <div class="row text-left">
                <div class="col-md-4 mb-3"></div>
                <div class="col-md-4 mb-3">
                    <label>Barcode: </label>
                    <input type="text" name="barcode" value="{{ old('barcode') }}">
                        {{ $errors->first('barcode') }}
                    <br>
                </div>
                <div class="col-md-4 mb-3"></div>
            </div>

            <div class="row text-left">
                <div class="col-md-4 mb-3"></div>
                <div class="col-md-4 mb-3">
                    <label>Isbn: </label>
                    <input type="text" name="isbn" value="{{ old('isbn') }}">
                    {{ $errors->first('isbn') }}
                </div>
                <div class="col-md-4 mb-3"></div>
            </div>
            <button class="btn btn-success" id="submitbtn" type="submit">CHECK</button>
        </form>

        <br>
        <hr>
        <h5>Book Details</h5>
        <hr>
        <form action="/shelfbook" method="post">
            @csrf
            <!-- CSRF Cross-Site Request Forgery -->
            <!-- {{ csrf_field() }} -->
            <div class="row text-left">
                <div class="col-md-4 mb-3"></div>
                <div class="col-md-4 mb-3">
                    <label>Name: </label>
                    <input type="text" name="name" value="{{ old('name') }}">
                    {{ $errors->first('name') }}
                </div>
                <div class="col-md-4 mb-3"></div>
            </div>
           

            <!-- <label>Cover: </label>
            <input type="text" name="cover" value="{{ old('cover') }}">
            {{ $errors->first('cover') }} -->
            <div class="row text-left">
                <div class="col-md-4 mb-3"></div>
                    <div class="col-md-4 mb-3">
                        <label>Author: </label>
                        <input type="text" name="author" value="{{ old('author') }}">
                        {{ $errors->first('author') }}
                    </div>
                <div class="col-md-4 mb-3"></div>
            </div>

            <div class="row text-left">
                <div class="col-md-4 mb-3"></div>
                    <div class="col-md-4 mb-3">
                        <label>Description: </label>
                        <input type="text" name="description" value="{{ old('description') }} " disabled="{{ $checkValue}}">
                        {{ $errors->first('description') }}
                    </div>
                <div class="col-md-4 mb-3"></div>
            </div>
            
            <br>
            <button class="btn btn-success" id="submitbtn" type="submit">SUBMIT</button>

            </div>
        </form>
    </div>
</div>
@endsection