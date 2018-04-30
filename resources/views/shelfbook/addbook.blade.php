@extends('layouts.master')

@section('page-title')

Check barcode or isbn
    
@endsection

@push('style')
  body{
    background-color: #ce7f50;
  }
  .add-book{
    margin-top: 20px;
    background-color: #d9d2b1;
  }
  input{
    width: 100%;
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
@endpush

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid rounded add-book">

    <div class="text-center">
        <h2>Add & Check a book</h2>
        <br>
        <hr>
        <h5>Book Details</h5>
        <hr>
        
        <form action="/shelfbook" method="post">
            @csrf
            <!-- CSRF Cross-Site Request Forgery -->
            <!-- {{ csrf_field() }} -->
            <div class="row text-left">
                <div class="col-md-4 mb-3"></div>
                <div class="col-md-4 mb-3">
                    <label>Name: </label>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                    {{ $errors->first('name') }}
                </div>
                <div class="col-md-4 mb-3"></div>
            </div>
           

            <!-- <label>Cover: </label>
            <input type="text" name="cover" value="{{ old('cover') }}">
            {{ $errors->first('cover') }} -->
            <div class="row text-left">
                <div class="col-md-4 mb-3"></div>
                    <div class="col-md-4 mb-3">
                        <label>Author: </label>
                        <input type="text" name="author" value="{{ old('author') }}" required>
                        {{ $errors->first('author') }}
                    </div>
                <div class="col-md-4 mb-3"></div>
            </div>

            <div class="row text-left">
                <div class="col-md-4 mb-3"></div>
                    <div class="col-md-4 mb-3">
                        <label>Description: </label>
                        <input type="text" name="description" value="{{ old('description') }}" required>
                        {{ $errors->first('description') }}
                    </div>
                <div class="col-md-4 mb-3"></div>
            </div>

            <div class="row text-left">
                <div class="col-md-4 mb-3"></div>
                    <div class="col-md-4 mb-3">
                        <label>Barcode: </label>
                        <input type="text" name="barcode" value="{{ empty($barcode)? old('barcode') : $barcode }}" required>
                        {{ $errors->first('description') }}
                    </div>
                <div class="col-md-4 mb-3"></div>
            </div>

            <div class="row text-left">
                <div class="col-md-4 mb-3"></div>
                    <div class="col-md-4 mb-3">
                        <label>Isbn: </label>
                        <input type="text" name="isbn" value="{{ empty($isbn)? old('isbn') : $isbn }}" required>
                        {{ $errors->first('isbn') }}
                    </div>
                <div class="col-md-4 mb-3"></div>
            </div>

            <div class="row text-left">
                <div class="col-md-4 mb-3"></div>
                    <div class="col-md-4 mb-3">
                        <div class="mb-3">
                            <label for="image_path">Cover</label>
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
                    </div>
                <div class="col-md-4 mb-3"></div>
            </div>
            

            


            <br>
            <button class="btn btn-success" id="submitbtn" type="submit">SUBMIT</button>

            </div>



            
        </form>

    </div>
</div>

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