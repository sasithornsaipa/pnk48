

@extends('layouts.profile')

@section('page-title')
Book Detail
@endsection

@section('right-content')

<style>
  .in-panel{
    margin: 30px;
  }
  .list-group-item{
    background-color: #d9d2b1;
  }
</style>

<div class="panel panel-default">
  <div class="panel-heading">
    <h2>การขายของฉัน</h2>
  </div>
    
  <div class="in-panel">
    @foreach($books as $book=>$value)
      @if(($sale[$book]->sale_type) == 'retail')
        <br>
        <h4>ประเภทการซื้อ : retail</h4>
        <ul class="list-group">
          <li class="list-group-item">
            <a href=""><img src="{{asset('img/book.jpg')}}" style="width:200px; height:300px;">
            <span style="color: black;"> {{ $books[$book][0]->name }}</span>
          </li>
        </ul>
      @else
        <br>
        <h4>ประเภทการซื้อ : ประมูล (bid)</h4>
        <ul class="list-group">
          <li class="list-group-item">
            <a href=""><img src="{{asset('img/book.jpg')}}" style="width:200px; height:300px;">
            <span >name : {{ $books[$book][0]->name }}</span>
          </li>
        </ul>
      @endif
      @endforeach
    </div>
  </div>
  

@endsection
