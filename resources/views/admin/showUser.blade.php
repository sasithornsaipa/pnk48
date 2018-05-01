@extends('layouts.master') 
@section('page-title') User Detail: {{ $user->username }}
@endsection
 
@section('content') @if(Auth::check()
and Auth::user()->isAdmin())
<div class="container">
    <div>
        <h1><a data-toggle="tooltip" title="Back to Home" href="{{ url('/admin') }}"><i class="fas fa-arrow-circle-left"></i></a>{{ $user->username }}'s detail</h1>
    </div>
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <img src={{$user->profile->image_path}} alt="Profile picture" class='card' style="display: block; heigth:50%;
            width:50%;">
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <h3 class="card-header">{{ $user->profile->fname }} {{ $user->profile->lname }}</h3>
                <div class="card-body">
                    <h5 class="card-subtitle"><i class="fa fa-user-circle"></i> {{ $user->username }}</h5>
                    <hr/>
                    <p class="card-text">Email: {{ $user->email }}</p>
                    <p class="card-text">Status: {{ $user->status }}</p>
                    <p class="card-text">Verification: {!! $user->verified ? '
                        <i class="fa fa-check"></i>Verified' : '<i class="fa fa-times"></i>Not verified' !!}</p>
                </div>
                <form action="/admin/{{ $user->id }}/edit" method="POST">@csrf @method('PUT')
                    <a class="btn btn-danger" href="{{ url('/admin/' . $user->id . '/edit') }}">Warn/Ban/Unban</a>
                </form>
            </div>
        </div>
    </div>
    @if(\App\Report::where('reported_id', $user->id)->count())
    <h3>Reported by:</h3>
    @foreach(\App\Report::all()->where('reported_id', $user->id) as $report) {{-- $report --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Reporter: {{ \App\Report::find($report->id)->reportor->username }}</h5>
            <p class="card-text">reported at: {{ $report->created_at }}</p>
            <hr/>
            <p class="card-text">{{$report->description}}</p>
        </div>
    </div>
    @endforeach @endif
</div>
@endif
@endsection