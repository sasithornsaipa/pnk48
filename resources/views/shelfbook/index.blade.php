@extends('layouts.master')

@section('page-title')
Shelf book
@endsection

<<<<<<< HEAD
@section('content')
    <div>
        <h1>Shelves my books</h1>
        <br>
    </div>

    
    <a class="btn btn-success" href="/shelfbook/create">CREATE</a>
    

    <div style="margin: 0px 50px 0px 50px; text-align: center;">   
        <table class="table">
        <tbody>
            @foreach($shelfs as $shelf)
            <td>
                <a href="{{ url('/shelfbook/' . $shelf->book_id) }}"><img src="{{asset('img/book.jpg')}}" style="width:200px; height:300px;">
                {{ $shelf->book_id }}</a>
            </td>
            @endforeach
        </tbody>
        </table>

        <label>Filter</label>
        
    </div>

    <div>

    </div>
@endsection
=======
@push('style')
  body{
    background-color: #d9d2b1;
  }
  .container{
    margin-top: 50px;
  }
  .jumbotron {
    background-color: #ce7f50;
  }
  .addBook{
    float: right;
  }
  img:hover {
    box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
  }
  input{
      width: 100%;
  }
  
@endpush

@section('content')
<div class="container">
    <div>
        <h1 class="text-center">My shelfbook</h1>
        <br>
    </div>
    <div class="addBook">
        <a class="btn btn-success" href="/shelfbook/create">Add a book</a>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <div class="row" style="text-align: center">
            @foreach($books as $book=>$value)
                <div class="col-md-3">  
                    <a href="{{ url('/shelfbook/' . $books[$book][0]->id) }}">
                    <img src="{{ empty($books[$book][0]->cover)? asset('img/book.jpg') : asset($books[$book][0]->cover) }}" style="width:128px; height:164px;">
                    </a>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>

    <div class="all-book">
        <div class="row" style="text-align: center">
            <div class="col-sm" name="filter-bar">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" id="search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit" >filter</button>
                </form>
            </div>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Barcode</th>
                <th scope="col">ISBN</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="table-striped table-hover">
            @foreach($books as $book=>$value)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $books[$book][0]->name }}</td>
                    <td>{{ $books[$book][0]->description }}</td>
                    <td>
                       <img src='https://barcode.tec-it.com/barcode.ashx?data={{$books[$book][0]->barcode}}&code=ISBN13&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0' alt='Barcode Generator TEC-IT' style="width: 150px;"/>
                    </td>
                    <td>
                       <img src='https://barcode.tec-it.com/barcode.ashx?data={{$books[$book][0]->isbn}}&code=ISBN13&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0' alt='Barcode Generator TEC-IT' style="width: 150px;"/>
                    </td>
                    <td><a href="{{ url('/shelfbook/' . $books[$book][0]->id) }}" class="btn btn-success">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection



>>>>>>> master
