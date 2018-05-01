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
  .white-panel{
    background-color: white;
  }
</style>

<div class="panel panel-default">
    <div class="panel-heading">
      <h2>Purchased</h2>
    </div>

    <div class="in-panel">
    @foreach($books as $book=>$value)
      @if(($sale[$book]->sale_type) == 'retail')
        <br>
        <h4>Sale Type : retail</h4>
        <ul class="list-group">
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-4">
                <img src="{{ empty($books[$book][0]->cover)? asset('img/book.jpg') : asset($books[$book][0]->cover) }}" style="width:128px; height:164px;">
              </div>
              <div class="col-md-8">
                <span style="color: black;"> {{ $books[$book][0]->name }}</span><br>
                <span style="color: black;">Status: {{ $sale[0]->status }}</span>
              </div>
            </div>
          </li>
        </ul>
      @else
        <br>
        <h4>Sale Type : ประมูล (bid)</h4>
        <ul class="list-group">
          <li class="list-group-item">
            <img src="{{ empty($books[$book][0]->cover)? asset('img/book.jpg') : asset($books[$book][0]->cover) }}" style="width:128px; height:164px;">

            <span >name : {{ $books[$book][0]->name }}</span>
          </li>
        </ul>
      @endif
      @endforeach
    </div>
</div>

</div>
@endsection
