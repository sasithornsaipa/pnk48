@extends('layouts.master') 
@section('page-title') Edit detail
@endsection
 
@section('content')
@if(Auth::check() and Auth::user()->isAdmin())
<form class="form-group" action="/admin/event/{{ $event->id }}" method="POST">
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
            <div class="card-header"><a data-toggle="tooltip" title="Back to Home" href="{{ url('/admin') }}"><i class="fas fa-arrow-circle-left"></i></a>Edit detail </div>
            <div class="card-body">
                <h4 class="card-title">{{ $event->name }}</h4>
                <hr/>
                <div class="form-row">
                    <label>Event Name: </label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') ?? $event->name }}" />
                </div>

                <div class="form-row">
                    <label>Description: </label>
                    <textarea class="form-control" rows="8" type="text" name="description">{{ old('description') ?? $event->description }}</textarea>
                </div>
                <hr/>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Start Date: </label>
                        <div class="input-group date">
                            <input type="text" name="start_time" class="form-control" value="{{ old('start_time') }}"><span
                                class="input-group-addon" value="{{ old('start_time') }}" />
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
                        <label>Mission Type: </label>
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
            </div>
        </div>
        <div class="form-group col-auto row justify-content-center"></div>
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="reset" class="btn btn-outline-danger">Reset</button>
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