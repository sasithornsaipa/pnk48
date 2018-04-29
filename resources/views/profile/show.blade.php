@extends('layouts.profile')

@section('page-title')
Profile Detail
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>{{ $profile->fname }}</h2>
    </div>
    
    <ul class="list-group">
      <li class="list-group-item">
        <span class="col 3" style="font-weight: bold">Username: </span><span class="col 9">{{ $userprodetail->username }} </span>
      </li>
      <li class="list-group-item">
        <span class="col 3" style="font-weight: bold">Email: </span><span class="col 9">{{ $userprodetail->email }}</span>
      </li>
      <li class="list-group-item">
        <span class="col 3" style="font-weight: bold">Password: </span><span class="col 9">{{ $userprodetail->encrypt(password) }}</span>
      </li>
      <li class="list-group-item">
        <span class="col 3" style="font-weight: bold">First name: </span><span class="col 9">{{ $profile->fname }}</span>
      </li>
      <li class="list-group-item">
        <span class="col 3" style="font-weight: bold">Last name: </span><span class="col 9">{{ $profile->lname }}</span>
      </li>
      <li class="list-group-item">
        <span class="col 3" style="font-weight: bold">Sex: </span><span class="col 9">{{ $profile->sex }}</span>
      </li>
      <li class="list-group-item">
        <span class="col 3" style="font-weight: bold">birthday: </span><span class="col 9">{{ $profile->birthday }}</span>
      </li>
    </ul>

</div>
@endsection
