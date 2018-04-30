@extends('layouts.master')

@section('page-title')

Add New Book
    
@endsection

<<<<<<< HEAD
@section('jumbotext')
    
@endsection

@section('content')
<form action="/shelfbook" method="post">

    @csrf
    <!-- CSRF Cross-Site Request Forgery -->
    <!-- {{ csrf_field() }} -->

    <label>Scan with Barcode</label>


    <label>Add with ISBN</label>


    <label>Manual</label>
    <br>
    
    <label>Name: </label>
    <input type="text" name="name" value="{{ old('name') }}">
    {{ $errors->first('name') }}

    <br>
    <label>Isbn: </label>
    <input type="text" name="isbn" value="{{ old('isbn') }}">
    {{ $errors->first('isbn') }}
    
    <br>
    <!-- <label>Cover: </label>
    <input type="text" name="cover" value="{{ old('cover') }}">
    {{ $errors->first('cover') }} -->

    <br>
    <label>Barcode: </label>
    <input type="text" name="barcode" value="{{ old('barcode') }}">
    {{ $errors->first('barcode') }}

    <br>
    <label>Author: </label>
    <input type="text" name="author" value="{{ old('author') }}">
    {{ $errors->first('author') }}
    
    <br>
    <label>Description: </label>
    <input type="text" name="description" value="{{ old('description') }}">
    {{ $errors->first('description') }}

    <br>
    <button type="submit">Submit</button>
</form>

=======
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
>>>>>>> master
@endsection