@extends('layouts.master') 
@section('page-title') Edit detail
@endsection
 
@section('content')
<form class="form-group" action="/admin/{{ $user->id }}" method="POST">
    @csrf @method('PUT')@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container-fluid">
        <div class="card bg-light mb-3">
            <div class="card-header">Edit detail </div>
            <div class="card-body">
                <h4 class="card-title">{{ $user->username }}</h4>
                <input class="form-control" type="hidden" name="user_id" value="{{ old('user_id') ?? $user->id }}" />
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>First Name: </label>
                        <input readonly class="form-control" type="text" name="fname" value="{{ old('fname') ?? $user->profile->fname }}" />
                    </div>

                    <div class="form-group col-md-6">
                        <label>Last Name: </label>
                        <input readonly class="form-control" type="text" name="lname" value="{{ old('lname') ?? $user->profile->lname }}" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Tel: </label>
                        <input readonly class="form-control" type="text" name="tel" value="{{ old('tel') ?? $user->profile->tel }}" />
                    </div>

                    <div class="form-group col-md-6">
                        <label>Email: </label>
                        <input readonly class="form-control" type="text" name="email" value="{{ old('email') ?? $user->email }}" />
                    </div>
                </div>


                <div class="form-row">
                    <label>Address: </label>
                    <textarea readonly class="form-control" rows="8" type="text" name="address">{{ old('address') ?? $user->profile->address }}</textarea>
                </div>

                <div class="form-row">
                    <label>Status: </label>
                    <select class="form-control" name="status">
                        @foreach($status as $key=>$value)
                        @if(old('status') == $key)
                        <option value="{{ $key }}" selected>{{ $value }}</option>
                        @else
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group col-auto row justify-content-center"></div>
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="reset" class="btn btn-outline-danger">Reset</button>
    </div>
</form>
@endsection