@extends('layouts.master')

@section('title')
  Create Sales
@endsection

@push('style')
  body{
    background-color: rgb(114, 49, 11, .7);
  }
  .container{
    margin-top: 5%;
  }
  .container #content{
    margin-left: 8%;
    margin-top: 1%;
  }
  .py-5{
    margin-top: -3%;
  }
  .jumbotron {
    background-color: rgb(233, 236, 238, 0.7);
  }
  .custom-file-label {
    overflow: hidden;
  }
  .custom-radio .custom-control-input:checked~.custom-control-label::after {
    background-color: rgb(104, 165, 0);
    border-radius: 50%;
  }
  .mb-1{
    color: rgb(233, 236, 238);
  }
  .list-inline-item a{
    color: rgb(233, 236, 238);
  }
  .slidecontainer {
      width: 100%;
  }
  .slider {
      -webkit-appearance: none;
      width: 100%;
      height: 15px;
      border-radius: 5px;
      background: #d3d3d3;
      outline: none;
      opacity: 0.7;
      -webkit-transition: .2s;
      transition: opacity .2s;
  }
  .slider:hover {
      opacity: 1;
  }
  .slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 25px;
      height: 25px;
      border-radius: 50%;
      background: #4CAF50;
      cursor: pointer;
  }
  .slider::-moz-range-thumb {
      width: 25px;
      height: 25px;
      border-radius: 50%;
      background: #4CAF50;
      cursor: pointer;
  }
@endpush

@section('content')
  <div class="container">
    <div class="jumbotron jumbotron-fluid shadow-lg p-8 mb-5 rounded ">

      <div class="py-5 text-center">
        <h2>Create Sales</h2>
        <p class="lead"></p>
      </div>

      <div class="container  align-items-center" id="content">
        <div class="row">
          <div class="col-md-2 order-md-2 mb-4">

          </div>
          <div class="col-md-10 order-md-1">
            <!-- <h4 class="mb-3">Billing address</h4> -->
            <form class="needs-validation" enctype="multipart/form-data" action="/sales" method="post" novalidate>

              {{ csrf_field() }}

              @if(count($errors) > 0)
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif

              <h4 class="mb-3">Detail</h4>
              <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="book_id">Book Name</label>
                  <select class="custom-select d-block w-100" name="book_id" required>

                    @foreach ($books as $book)
                      @if(old('$book[0]->id') == $book[0]->id)
                        <option value="{{ $book[0]->id }}" selected>{{ $book[0]->name }}</option>
                      @else
                        <option value="{{ $book[0]->id }}">{{ $book[0]->name }}</option>
                      @endif
                    @endforeach;
                  </select>

                  @if($errors->has('book_id'))
                  <div class="text-danger">
                    {{$errors->first('book_id')}}
                  </div>
                  @endif

                </div>

                <div class="col-md-4 mb-3">
                  <label for="sale_type">Sale Type</label>
                  <select class="custom-select d-block w-100" id="saletype" name="sale_type" required>
                    @foreach ($sale_type as $key)
                      @if(old('sale_type') == $key)
                        <option value="{{ $key }}" selected>{{ ucfirst($key) }}</option>
                      @else
                        <option value="{{ $key }}" >{{ ucfirst($key) }}</option>
                      @endif
                    @endforeach;
                  </select>

                  @if($errors->has('sale_type'))
                  <div class="text-danger">
                    {{$errors->first('sale_type')}}
                  </div>
                  @endif

                </div>

                <div class="col-md-4 mb-3">
                  <label for="base_price" id="price">Price</label>
                  <input type="text" class="form-control" name="base_price" placeholder="" value="{{old('base_price')}}" required>

                  @if($errors->has('base_price'))
                  <div class="text-danger">
                    {{$errors->first('base_price')}}
                  </div>
                  @endif

                </div>
              </div>

              <div class="row" id="bid" style="display: none;">
                <div class="col-md-6 mb-3">
                  <label for="start_time">Start Time</label>
                  <input class="date form-control" type="date" name="start_time" min="{{$today}}" value="{{old('start_time')}}"required>

                  @if($errors->has('start_time'))
                  <div class="text-danger">
                    {{$errors->first('start_time')}}
                  </div>
                  @endif

                </div>

                <div class="col-md-6 mb-3">
                  <label for="end_time">End Time</label>
                  <input class="date form-control" type="date" name="end_time" min="{{$today}}" value="{{old('end_time')}}"required>

                  @if($errors->has('end_time'))
                  <div class="text-danger">
                    {{$errors->first('end_time')}}
                  </div>
                  @endif

                </div>
              </div>

              <hr class="mb-4">
              <div class="mb-3">
                <label for="image">Images</label>
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

              <div class="mb-3 slidecontainer">
                <label for="customRange1">Book Condition:&nbsp;&nbsp;</label><span id="demo"></span><br>
                <input type="range" min="0" max="100" value="{{old('book_condition')}}" class="slider" id="myRange" name="book_condition" required>

                @if($errors->has('book_condition'))
                <div class="text-danger">
                  {{$errors->first('book_condition')}}
                </div>
                @endif

              </div>

              <hr class="mb-4">
              <h4 class="mb-3">Payment</h4>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="bank_name">Bank Name</label>
                  <input type="text" class="form-control" id="bank_name" placeholder="" name="bank_name" value="{{old('bank_name')}}" required>
                  @if($errors->has('bank_name'))
                  <div class="text-danger">
                    {{$errors->first('bank_name')}}
                  </div>
                  @endif
                </div>

                <div class="col-md-6 mb-3">
                  <label for="branch">Branch</label>
                  <input type="text" class="form-control" id="branch" placeholder="" name="branch" value="{{old('branch')}}" required>
                  @if($errors->has('branch'))
                  <div class="text-danger">
                    {{$errors->first('branch')}}
                  </div>
                  @endif
                </div>

              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="account_num">Account Number</label>
                  <input type="text" class="form-control" id="account_num" placeholder="" name="account_num" value="{{old('account_num')}}" required>
                  @if($errors->has('account_num'))
                  <div class="text-danger">
                    {{$errors->first('account_num')}}
                  </div>
                  @endif
                </div>

                <div class="col-md-6 mb-3">
                  <label for="holder">Holder Name</label>
                  <input type="text" class="form-control" id="holder" placeholder="" name="holder" value="{{old('holder')}}" required>
                  @if($errors->has('holder'))
                  <div class="text-danger">
                    {{$errors->first('holder')}}
                  </div>
                  @endif
                </div>

              </div>

              <hr class="mb-4">
              <button class="btn btn-success btn-lg btn-block" id="submitbtn" type="submit">SUBMIT</button>
            </form>
          </div>
        </div>
      </div>

    </div>

  </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>

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

      $('#saletype').on('change', function(e){
        console.log(e.target.value);
        if (e.target.value == 'bid') {
          $('#bid').show();
          document.getElementById('price').innerHTML = 'Base Price';
        }else {
          $('#bid').hide();
        }
      });

      var slider = document.getElementById("myRange");
      var output = document.getElementById("demo");
      output.innerHTML = slider.value.concat('%');

      slider.oninput = function() {
        output.innerHTML = this.value.concat('%');
      }

    </script>
@endsection
