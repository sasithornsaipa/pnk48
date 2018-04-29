@extends('layouts.master') 
@section('page-title') User Detail: {{ $user->username }}
@endsection
 
@section('content')
<div class="jumbotron">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ $user->username }}</h2>
            <p>[ <i class="fa fa-user-circle"></i> {{ $user->user_level }} ]</p>
        </div>
        <ul class="list-group">
            <li class="list-group-item">Name: {{ $user->profile->fname }} {{ $user->profile->lname}}</li>
            <li class="list-group-item">Email: {{ $user->email }}</li>
            <li class="list-group-item">
                Enabled? {!! $user->verified ? '
                <i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>' !!}
            </li>
            <li class="list-group-item">
                Joining Date: {{ $user->created_at }}
            </li>
            <li class="list-group-item">
                Status: {{ $user->status }}
            </li>
        </ul>
        {{-- @can('update', $user) --}}

        <div class="form-group row">
            <form action="/users/{{ $user->id }}" method="POST">
                @csrf @method('DELETE')

                <!-- Button trigger modal -->
                <div class="form-group col-auto row justify-content-center"></div>
                <a class="btn btn-success" href="{{ url('/users/' . $user->id . '/edit') }}">Edit</a>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">DELETE this user</button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
                    </div>
                    <div class="modal-body">
                        Are you sure to delete user: {{ $user->name }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">DELETE</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    {{-- @endcan --}}
</div>
</div>
@endsection