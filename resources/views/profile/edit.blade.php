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
<form action="/profile/{{ $profile->id }}" method="post">

    @csrf
    @method('PUT')
    <!-- CSRF Cross-Site Request Forgery -->
    <!-- {{ csrf_field() }} -->
    <div class="show-coin">
        <img src="{{asset('img/coin.jpg')}}" style="width:20px; height:20px;">
        {{$profile->coin}}
    </div>

    <h1>My Profile</h1>

    <div class="row">
        <div class="column left" style="padding-left: 30px;">
            <img src="{{ empty($userprodetail->image_path)? asset('img/default-avatar.png') : asset('img/$userprodetail->image_path') }}" style="width:200px; height:200px;">
        </div>

        <div class="column right" style="padding-left: 30px;">

            <div class="row">
                <div class="col-md-2 mb-3">
                    <label>Username: </label>
                </div>
                <div class="col-md-10 mb-3">
                    <input type="text" name="username" value="{{ old('username') ?? $userprodetail->username }}">
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
                    <input type="text" name="email" value="{{ old('email') ?? $userprodetail->email }}">
                    @if($errors->has('email'))
                        <div class="text-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="col-md-2 mb-3">
                    <label>Password: </label>
                </div>
                <div class="col-md-10 mb-3">
                    <input type="password" name="password" value="{{ old('password') ?? $userprodetail->password }}">
                    @if($errors->has('password'))
                        <div class="text-danger">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="col-md-2 mb-3">
                    <label>Firstname: </label>
                </div>
                <div class="col-md-10 mb-3">
                    <input type="text" name="fname" value="{{ old('fname') ?? $profile->fname }}">
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
                    <input type="text" name="lname" value="{{ old('lname') ?? $profile->lname }}">
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
                    <input type="date" name="birthday" value="{{ old('birthday') ?? $profile->birthday }}">
                    @if($errors->has('birthday'))
                        <div class="text-danger">
                            {{$errors->first('birthday')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <hr class="mb-4">
        @if($vertificationDoc == null)
            <a href="/verificationDoc/create"class="text-danger">Please verify your account</a>
        <br>
        @else
    @endif
    

    <br>
    <button class="btn btn-success btn-lg btn-block" type="submit">Submit</button>
</form>


<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
    <script>

      $("input[type=file]").change(function () {
      var fieldVal = $(this).val();
      // Change the node's value by removing the fake path (Chrome)
      fieldVal = fieldVal.replace("C:\\fakepath\\", "");
      if (fieldVal != undefined || fieldVal != "") {
        $(this).next(".custom-file-label").attr('data-content', fieldVal);
        $(this).next(".custom-file-label").text(fieldVal);
      }
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    </script>

@endsection