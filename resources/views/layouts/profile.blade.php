@extends('layouts.master')

@push('style')
   <style>
        * {
            box-sizing: border-box;
        }
        body{
            background-color: #d9d2b1;
            
        }
        /* Create two unequal columns that floats next to each other */
        .column {
            float: left;
            padding: 10px;
            /* height: 300px; Should be removed. Only for demonstration */
        }
        .left {
            width: 25%;
            padding: 10px;
        }
        .right {
            width: 75%;
            padding: 10px;
        }
        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .all-right{
            margin-right: 30px;
            padding: 30px;
            border-radius: 18px;
            background-color: #c9d874;
        }
        /* input{
            text-align: center;
            padding: 10px;
            border-radius: 10px;
        } */
    </style>
@endpush  


@section('content')
    <div class="row">
        <div class="column left">
            <ul class="list-group">
                <li class="list-group-item white-panel">
                    <a href="/profile/{{ \Auth::user()->profile->id}}"><span class="col 3" style="font-weight: bold">My profile</span></a>
                </li>
                <li class="list-group-item white-panel">
                    <a href="/profile/{{ \Auth::user()->profile->id}}/buy"><span class="col 3" style="font-weight: bold">ประวัติการซื้อของฉัน</span></a>
                </li>
                <li class="list-group-item white-panel">
                    <a href="/profile/{{ \Auth::user()->profile->id}}/sell"><span class="col 3" style="font-weight: bold">ประวัติการขายของฉัน</span></a>
                </li>
            </ul>
        </div>
        <div class="column right">
            <div class="all-right">
                @yield('right-content')
            </div>
        </div>
    </div>
@endsection