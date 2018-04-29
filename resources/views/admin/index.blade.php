@extends('layouts.master') @push('styles')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg"
    crossorigin="anonymous"> 
@endpush 
@section('content') {{-- Tab Header --}}
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#dashboard">Dashboard</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">User</a>
        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 39px, 0px);">
            <a class="dropdown-item" data-toggle="tab" href="#users">Users List</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ url('admin/create') }}">New Admin</a>
        </div>
    </li>
    
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Event</a>
        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 39px, 0px);">
            <a class="dropdown-item" data-toggle="tab" href="#events">Events List</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">New Event...</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#reports">Reports List</a>
    </li>
</ul>
{{-- Tab Content --}}
<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade show active" id="dashboard">
        <div class="container-fluid">
            {{-- Graph goes here --}}
        </div>
    </div>

    <div class="tab-pane fade" id="users">
        <div class="container-fluid">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Status</th>
                        <th scope="col">User Level</th>
                        <th scope="col">Verified ?</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="table-striped table-hover">
                    @foreach ( $usernames as $user )
                    <tr class="
                                        @if( $user->status=='normal' )
                                            table-info
                                        @elseif( $user->status=='warn' )
                                            table-warning
                                        @else
                                            table-danger
                                        @endif
                                        ">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ $user->user_level }}</td>
                        <td>{!! $user->verified ? '
                            <i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>' !!}
                        </td>
                        <td><a href="{{ url('/admin/'.$user->id) }}" class="btn btn-success">Detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="events">
        <div class="container-fluid">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Event Name</th>
                        <th scope="col">Mission Type</th>
                        <th scope="col">Reward</th>
                        {{-- <th scope="col">Description</th> --}}
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-striped table-hover">
                    @foreach($events as $event)
                    <tr class="
                        @if($event->mission_type == 'htGame')
                        table-info
                        @elseif($event->mission_type == 'rcgame')
                        table-warning
                        @elseif($event->mission_type == 'normal')
                        table-default
                        @endif
                        ">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->mission_type }}</td>
                        <td>{{ $event->reward }}</td>
                        {{-- <td>{{ $event->description }}</td> --}}
                        <td><a href="#" class="btn btn-success">Detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="reports">
        <div class="container-fluid">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Reported</th>
                        <th scope="col">Reporter</th>
                        <th scope="col">Description</th>
                        <th scope="col">Reported Date</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="table-striped table-hover">
                    @foreach($reports as $report)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $report->reported->username }}</td>
                        <td>{{ $report->reportor->username }}</td>
                        <td>{{ $report->description }}</td>
                        <td>{{ $report->created_at }}</td>
                        <td><a href="#" class="btn btn-success">Detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection