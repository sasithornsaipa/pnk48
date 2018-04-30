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
<form action="/profile/6" method="post">

    @csrf
    @method('PUT')
    <!-- CSRF Cross-Site Request Forgery -->
    <!-- {{ csrf_field() }} -->
    
    <h1>ID card verification</h1>

    <hr class="mb-4">
    <div class="mb-3">
        <label for="image_path"></label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" onchange="readURL(this);" name="images[]" multiple>
            <label class="custom-file-label" for="customFile">Choose file</label><br><br>
        </div>
        <img id="blah" class="img-fluid img-thumbnail" src="#" alt="" width="25%"/>

        @if($errors->has('images[]'))
        <div class="text-danger">
            {{$errors->first('images[]')}}
        </div>
        @endif

    </div>

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