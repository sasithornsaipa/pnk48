@extends('layouts.master')

@section('page-title')
Book Detail
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>{{ $bookdetail->name }}</h2>
    </div>
    
    <ul class="list-group">
      <li class="list-group-item">
        <span class="col 3" style="font-weight: bold">Author: </span><span class="col 9">{{ $bookdetail->author }} </span>
      </li>
      <li class="list-group-item">
        <span class="col 3" style="font-weight: bold">Des: </span><span class="col 9">{{ $bookdetail->description }}</span>
      </li>
    </ul>

</div>
@endsection
