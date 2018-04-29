@extends('layouts.master') 
@section('page-title') Edit user: {{ $user->username }}
@endsection
 
@section('content')
<form class="form-group" action="/users/{{ $user->id }}" method="POST">
    @csrf @method('PUT')
    <div class="form-row">
        <label>Name: </label>
        <input class="form-control" type="text" name="name" value="{{ old('name') ?? $user->name }}" />
    </div>

    <div class="form-row">
        <label>Email: </label>
        <input class="form-control" type="email" name="email" value="{{ old('email') ?? $user->email }}" />
    </div>

    <div class="form-row">
        <label>Access Level: </label>
        <select class="form-control" name="access_level">
        @foreach($access_level as $key=>$value)
            @if((old('access_level') ?? $user->access_level) == $key)
                <option value="{{ $key }}" selected>{{ $value }}</option>
            @else
                <option value="{{ $key }}">{{ $value }}</option>
            @endif
        @endforeach
        </select>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-outline-danger">Reset</button>
        </div>
    </div>
</form>
@endsection