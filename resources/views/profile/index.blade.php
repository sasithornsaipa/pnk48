@extends('layouts.profile')

@section('page-title')
Profile Detail
@endsection

@section('content')

<div id="vue-app">

    <table class="table">
    <thead>
        <tr>
        <th scope="col">No.</th>
        <th scope="col">Username</th>
        <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($profiles as $profile)
        <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>
            <a href="{{ url('/profile/' . $profile->id) }}">
            {{ $profile->fname }}
            </a>
        </td>
        @endforeach
    </tbody>
    </table>

</div>
@endsection