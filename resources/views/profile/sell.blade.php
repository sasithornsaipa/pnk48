

@extends('layouts.profile')

@section('page-title')
Book Detail
@endsection

@section('right-content')
<div class="panel panel-default">
    <div class="panel-heading">
      <h2>การขายของฉัน</h2>
    </div>
    
    <ul class="list-group">
      <li class="list-group-item">
        
        <a href=""><img src="{{asset('img/book.jpg')}}" style="width:200px; height:300px;">
        <span class="col 3" style="font-weight: bold">name : </span><span class="col 9">{{ $book->name }} </span>
                
      </li>
    </ul>

    
</div>
@endsection
