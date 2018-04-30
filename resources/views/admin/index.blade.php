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
            <a class="dropdown-item" href="{{ url('/admin/admin/create') }}">New Admin</a>
        </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Event</a>
        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 39px, 0px);">
            <a class="dropdown-item" data-toggle="tab" href="#events">Events List</a>
            <div class="dropdown-divider"></div>
<<<<<<< HEAD
            <a class="dropdown-item" href="{{ url('/admin/event/create') }}">New Event...</a>
=======
            <a class="dropdown-item" href="/sales/create">New Event...</a>
>>>>>>> master
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
    @include('admin.dashboard')
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
                        {{--
                        <th scope="col">Description</th> --}}
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
                        {{--
                        <td>{{ $event->description }}</td> --}}
                        <td><a href="{{ url('/admin/event/'.$event->id) }}" class="btn btn-success">Detail</a></td>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
<<<<<<< HEAD
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script>
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';
</script>
<script>
    let userStatChart = document.getElementById("userStatus").getContext('2d');
    let chart = new Chart(userStatChart, {
        type:'doughnut', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
        data:{
            labels:['Normal', 'Warn', 'Banned'],
            datasets:[{
                label:'Status',
                data:[
                    {{ \App\User::where('status', 'normal')->count() }},
                    {{ \App\User::where('status', 'warn')->count() }},
                    {{ \App\User::where('status', 'banned')->count() }}
                ],
                // backgroundColor:'green'
                backgroundColor:['#44f429', '#f4c428', '#e85727'],
                borderWidth:1,
                borderColor:'#777',
                hoverBorderWidth:3,
                hoverBorderColor:'#000'
            }]
        },
        options:{
            responsive:true,
            maintainAspectRatio:false,
            title:{
                display:true,
                text:'Users Status'
            },
            legend:{
                position:'right'
            },
            layout:{}
        }
    });

</script>
<script>
    let memberGenderChart = document.getElementById('memberGender').getContext('2d');
    let chart2 = new Chart(memberGenderChart, {
        type:'pie',
        data:{
            labels:['Male', 'Female'],
            datasets:[{
                label:'Gender',
                data:[
                    {{ \App\Profile::where('sex', 'male')->count() }},
                    {{ \App\Profile::where('sex', 'female')->count() }}
                ],
                backgroundColor:['#27e8ba', '#d60853'],
                borderWidth:1,
                borderColor:'#777',
                hoverBorderWidth:3,
                hoverBorderColor:'#000'
            }]
        },
        options:{
            responsive:true,
            maintainAspectRatio:false,
            title:{
                display:true,
                text:'Users Gender'
            },
            legend:{
                position:'right'
            }
        }
    });

</script>
<script>
    let missionTypeChart = document.getElementById('missionType').getContext('2d');
    let chart3 = new Chart(missionTypeChart, {
        type:'pie',
        data:{
            labels:['Normal', 'RC Game', 'Head-Tail Game'],
            datasets:[{
                label:'Missions',
                data:[
                    {{ \App\Event::where('mission_type', 'normal')->count() }},
                    {{ \App\Event::where('mission_type', 'rcgame')->count() }},
                    {{ \App\Event::where('mission_type', 'htGame')->count() }}
                ],
                backgroundColor:[
                    'tomato', 'orange', 'cyan'
                ],
                borderWidth:1,
                borderColor:'#777',
                hoverBorderWidth:3,
                hoverBorderColor:'#000'
            }]
        },
        options:{
            responsive:true,
            maintainAspectRatio:false,
            title:{
                display:true,
                text:'Event Type'
            },
            legend:{
                position:'right'
            }
        }
    });

</script>
<script>
    let rewardTypeChart = document.getElementById('eventReward').getContext('2d');
        let chart4 = new Chart(rewardTypeChart, {
            type:'pie',
            data:{
                labels:['Coupon', 'Coin'],
                datasets:[{
                    label:'Rewards',
                    data:[
                        {{ \App\Event::where('reward', 'coupon')->count() }},
                        {{ \App\Event::where('reward', 'coin')->count() }},
                    ],
                    backgroundColor:[
                        'tomato', 'cyan'
                    ],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWidth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{
                responsive:true,
                maintainAspectRatio:false,
                title:{
                    display:true,
                    text:'Event Reward'
                },
                legend:{
                    position:'right'
                }
            }
        });
</script>
@endpush
=======
>>>>>>> master
