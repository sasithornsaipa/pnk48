

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            height: 300px; /* Should be removed. Only for demonstration */
        }
        .left {
            width: 25%;
            
        }
        .right {
            width: 75%;
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
  
  </head>
  <body>

    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">PMK48</a>

        <a href="/profile/2">profile</a>
        <a href="/shelfbook">shef book</a>
        <a>personal message</a>
        <a>inbox</a>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
    </nav>

    <div class="row">
        <div class="column left">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="/profile/2"><span class="col 3" style="font-weight: bold">My profile</span></a>
                </li>
                <li class="list-group-item">
                    <a href="/profile/2/buy"><span class="col 3" style="font-weight: bold">ประวัติการซื้อของฉัน</span></a>
                </li>
                <li class="list-group-item">
                    <a href="/profile/2/sell"><span class="col 3" style="font-weight: bold">ประวัติการขายของฉัน</span></a>
                </li>
            </ul>
        </div>
        <div class="column right">
            <div class="all-right">
                @yield('right-content')
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
