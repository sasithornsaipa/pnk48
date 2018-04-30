@extends('layouts.master')

@section('page-title')
Shelf book
@endsection

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