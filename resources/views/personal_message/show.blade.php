@extends('layouts.master')

@section('content')
<h1>SHOW PM</h1>
<p>{{$sender->id}}</p>
<p>{{$sender->profile->fname}}</p>
<p>{{$reciever->id}}</p>
<p>{{$reciever->profile->fname}}</p>
@endsection