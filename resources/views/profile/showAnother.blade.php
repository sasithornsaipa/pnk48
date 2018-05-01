@extends('layouts.profile')

@section('page-title')
Profile Detail
@endsection


@section('right-content')

<style>
    .input{
        padding: 10px;
        border-radius: 50%;
    }
    h1{
        margin: 10px;
    }
    input[type=text],input[type=password],input[type=date], select {
        width: 50%;
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .show-coin{
        float: right;
    }

</style>

<div class="show-coin">
    <i class="fab fa-bitcoin"></i>
    {{$profile->coin}}
</div>
<div class='row'>

    <h1>My Profile</h1>
    @if(Auth::user()->id != $userprodetail->id)

    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever={{$userprodetail->username}}>Report</button>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    @endif

</div>
@if(Auth::user()->id == $userprodetail->id)
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reporting information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('reports.store', ['reporter' => Auth::user(), 'reported' => $userprodetail])}}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="description" class="col-form-label">Description:</label>
                        <input type="text" class="form-control" id="description" name='description'>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endif

    @csrf
    <div class="row">
        <div class="column left" style="padding-left: 30px;">
            <img src="{{ empty($profile->image_path)? asset('img/default-avatar.png') : asset($profile->image_path) }}" style="width:200px; height:200px;">
            <p>[ <i class="fa fa-user-circle"></i>
           {{ $userprodetail->user_level }} ]</p>

           
        </div>

        <div class="column right" style="padding-left: 30px;">

            <div class="row">
                <div class="col-md-2 mb-3">
                    <label>Username: </label>
                </div>
                <div class="col-md-10 mb-3">
                    <input type="text" name="username" value="{{ old('username') ?? $userprodetail->username }}" disabled>
                    @if($errors->has('username'))
                    <div class="text-danger">
                        {{$errors->first('username')}}
                    </div>
                    @endif
                </div>

                <div class="col-md-2 mb-3">
                    <label>Email: </label>
                </div>
                <div class="col-md-10 mb-3">
                    <input type="text" name="email" value="{{ old('email') ?? $userprodetail->email }}" disabled>
                    @if($errors->has('email'))
                    <div class="text-danger">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>

                <!-- <div class="col-md-2 mb-3">
                    <label>Password: </label>
                </div>
                <div class="col-md-10 mb-3">
                    <input type="password" name="password" value="{{ old('password') ?? $userprodetail->password }}" required>
                    @if($errors->has('password'))
                    <div class="text-danger">
                        {{ $errors->first('password') }}
                    </div>
                    @endif
                </div> -->



                <hr>
                <div class="col-md-2 mb-3">
                    <label>Firstname: </label>
                </div>
                <div class="col-md-10 mb-3">
                    <input type="text" name="fname" value="{{ old('fname') ?? $profile->fname }}" disabled>
                    @if($errors->has('fname'))
                    <div class="text-danger">
                        {{$errors->first('fname')}}
                    </div>
                    @endif
                </div>

                <div class="col-md-2 mb-3">
                    <label>Lastname: </label>
                </div>
                <div class="col-md-10 mb-3">
                    <input type="text" name="lname" value="{{ old('lname') ?? $profile->lname }}" disabled>
                    @if($errors->has('lname'))
                    <div class="text-danger">
                        {{$errors->first('lname')}}
                    </div>
                    @endif
                </div>

                <div class="col-md-2 mb-3">
                    <label>Sex: </label>
                </div>
                <div class="col-md-10 mb-3">
                    <select name="sex">
                        @foreach($sex as $key => $value)
                        @if((old('sex') ?? $profile->sex ) == $key)
                        <option value="{{ $value }}" selected>{{ $value }}</option>
                        @else
                        <option value="{{ $value }}">{{ $value }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 mb-3">
                    <label>Birthday: </label>
                </div>
                <div class="col-md-10 mb-3">
                    <input type="date" name="birthday" value="{{ old('birthday') ?? $profile->birthday }}" disabled>
                    @if($errors->has('birthday'))
                    <div class="text-danger">
                        {{$errors->first('birthday')}}
                    </div>
                    @endif
                </div>

                <div class="col-md-2 mb-3">
                    <label>Tel: </label>
                </div>
                <div class="col-md-10 mb-3">
                    <input type="text" name="tel" value="{{ old('tel') ?? $profile->tel }}" disabled>
                    @if($errors->has('tel'))
                    <div class="text-danger">
                        {{$errors->first('tel')}}
                    </div>
                    @endif
                </div>

                <div class="col-md-2 mb-3">
                    <label>Address: </label>
                </div>
                <div class="col-md-10 mb-3">
                    <input type="text" name="address" value="{{ old('address') ?? $profile->address }}" disabled>
                    @if($errors->has('address'))
                    <div class="text-danger">
                        {{$errors->first('address')}}
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

   

    <br>
    <button class="btn btn-success btn-lg btn-block" type="submit">Submit</button>
