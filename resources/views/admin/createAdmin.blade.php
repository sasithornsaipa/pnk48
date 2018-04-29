@extends('layouts.master') 
@section('page-title') Create new Admin
@endsection
 
@section('content')
<div>
    <h1>New Admin Form</h1>
</div>
<hr/>
<form class="form-group" action="/admin" method="POST">
    @csrf @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container-fluid">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>First Name: </label>
                <input class="form-control" type="text" name="fname" value="{{ old('fname')}}" />
            </div>

            <div class="form-group col-md-6">
                <label>Last Name: </label>
                <input class="form-control" type="text" name="lname" value="{{ old('lname')}}" />
            </div>
        </div>

        <div class="form-row">
            <label>Username: </label>
            <input class="form-control" type="text" name="username" value="{{ old('username') }}" />
        </div>

        <div class="form-row">
            <label>Password: </label>
            <input class="form-control" type="password" name="password" value="" aria-describedby="password" />
            <small id="password" class="form-text text-muted">
            Your password must be 6-20 characters long.
        </small>
        </div>

        <div class="form-row">
            <label>Confirm Password: </label>
            <input class="form-control" type="password" name="password_confirmation" value="" aria-describedby="password" />
            <small id="password" class="form-text text-muted">Re-enter your password.</small>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Birthday: </label>
                <div class="input-group date">
                    <input type="text" name="birthday" class="form-control"><span class="input-group-addon" value="{{ old('birthday') }}" />
                </div>
            </div>

            <div class="form-group col-md-6">
                <label>Gender: </label>
                <select class="form-control" name="sex">
                @foreach($sex as $key=>$value)
                @if(old('sex') == $key)
                    <option value="{{ $key }}" selected>{{ $value }}</option>
                @else
                    <option value="{{ $key }}">{{ $value }}</option>
                @endif
                @endforeach
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Email: </label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" />
            </div>

            <div class="form-group col-md-6">
                <label>Tel: </label>
                <input class="form-control" type="text" name="tel" value="{{ old('tel') }}" />
            </div>
        </div>

        <div class="form-row">
            <label>Address: </label>
            <textarea rows="8" class="form-control" type="text" name="address" value="{{ old('address') }}"></textarea>
        </div>

        <label></label>
    </div>

    <div class="form-group row justify-content-center">
            <button type="submit" class="btn btn-success btn-lg">Submit</button>
            <div class="col-auto"></div>
            <button type="reset" class="btn btn-danger btn-lg">Reset</button>
    </div>
</form>
@endsection

@push('scripts')
<script type="text/javascript">
    $('.input-group.date').datepicker({
        language: "th",
        todayBtn: "linked",
        todayHighlight: true
    });

</script>
@endpush