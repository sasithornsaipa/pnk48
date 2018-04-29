@extends('layouts.master')

@section('page-title')

Add New Book
    
@endsection

@section('jumbotext')
    
@endsection

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid shadow-lg p-8 mb-5 rounded ">

    <div class="text-center">
        <h2>Add book</h2>
    

        <form action="/shelfbook" method="post">

            @csrf
            <!-- CSRF Cross-Site Request Forgery -->
            <!-- {{ csrf_field() }} -->

            <label>Scan with Barcode</label>


            <label>Add with ISBN</label>

            <br><br>
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
            <button class="btn btn-success btn-lg btn-block" id="submitbtn" type="submit">SUBMIT</button>

            </div>
        </form>
    </div>
</div>
@endsection