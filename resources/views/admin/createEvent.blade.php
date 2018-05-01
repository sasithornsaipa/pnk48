@extends('layouts.master') 
@section('page-title') Create new Event
@endsection
 
@section('content')
@if(Auth::check() and Auth::user()->isAdmin())
<div>
    <h1>New Event Form</h1>
</div>
<hr/>
<form class="form-group" action="/admin/event/store" method="POST">
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
            <label>Event Name: </label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
        </div>

        <div class="form-row">
            <label>Description: </label>
            <textarea rows="8" class="form-control" type="text" name="description" value="{{ old('description') }}"></textarea>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Start Date: </label>
                <div class="input-group date">
                    <input type="text" name="start_time" class="form-control" value="{{ old('start_time') }}"><span class="input-group-addon"
                        value="{{ old('start_time') }}" />
                </div>
            </div>

            <div class="form-group col-md-6">
                <label>End Date: </label>
                <div class="input-group date">
                    <input type="text" name="end_time" class="form-control" value="{{ old('end_time') }}"><span class="input-group-addon"
                        value="{{ old('start_time') }}" />
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Reward: </label>
                <select class="form-control" name="reward">
                    @foreach($rewards as $key=>$value)
                    @if(old('rewards') == $key)
                    <option value="{{ $key }}" selected>{{ $value }}</option>
                    @else
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label>Reward: </label>
                <select class="form-control" name="mission_type">
                        @foreach($mission_type as $key=>$value)
                        @if(old('mission_type') == $key)
                        <option value="{{ $key }}" selected>{{ $value }}</option>
                        @else
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endif
                        @endforeach
                    </select>
            </div>
        </div>

        <label><small>*Event Picture can be uploaded after the event is created</small></label>
    </div>

    <div class="form-group row justify-content-center">
        <button type="submit" class="btn btn-success btn-lg">Submit</button>
        <div class="col-auto"></div>
        <button type="reset" class="btn btn-danger btn-lg">Reset</button>
    </div>
</form>
@endif
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