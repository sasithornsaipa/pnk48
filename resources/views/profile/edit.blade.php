@extends('layouts.profile')

@section('page-title')
Profile Detail
@endsection

@section('right-content')
<form action="/profile/{{ $profile->id }}" method="post">
<!-- Auth::user()->id -->
    
    @csrf
    @method('PUT')
    <!-- CSRF Cross-Site Request Forgery -->
    <!-- {{ csrf_field() }} -->

    <h1>ข้อมูลของฉัน</h1>
    <div class="row">
        <div class="column left">
            <img src="{{ empty($userprodetail->image_path)? asset('img/avatarfemale.png') : asset('img/$userprodetail->image_path') }}" style="width:200px; height:200px;">
        </div>
        <div class="column right">
            <label>Name: </label>
            <input type="text" name="username" value="{{ old('username') ?? $userprodetail->username }}">
            {{ $errors->first('username') }}

            <br>
            <label>email: </label>
            <input type="text" name="email" value="{{ old('email') ?? $userprodetail->email }}">
            {{ $errors->first('email') }}
            
            <br>
            <label>password: </label>
            <input type="password" name="password" value="{{ old('password') ?? $userprodetail->password }}">
            {{ $errors->first('password') }}

            <br>
            <label>fname: </label>
            <input type="text" name="fname" value="{{ old('fname') ?? $profile->fname }}">
            {{ $errors->first('fname') }}

            <br>
            <label>lname: </label>
            <input type="text" name="lname" value="{{ old('lname') ?? $profile->lname }}">
            {{ $errors->first('lname') }}

            <br>
            <label>Sex: </label>
            <select name="sex">
                @foreach($sex as $key => $value)
                    @if((old('sex') ?? $profile->sex ) == $key)
                        <option value="{{ $key }}" selected>{{ $value }}</option>
                    @else
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endif
                @endforeach
            </select>

            <br>
            <label>birthday: </label>
            <input type="text" name="birthday" value="{{ old('birthday') ?? $profile->birthday }}">
            {{ $errors->first('birthday') }}
        </div>
    </div>

    <br>
    <button type="submit">Submit</button>
</form>
@endsection