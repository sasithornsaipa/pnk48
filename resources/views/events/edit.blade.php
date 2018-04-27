@extends('layouts.master')

@section('title')
  Edit Event
@endsection

@push('style')
  .container #content{
      margin-left: 10%;
  }
  .custom-file-label {
  overflow: hidden;
  }
@endpush

@section('content')
<div class="container">
      <div class="py-5 text-center">
        <h2>Edit Event</h2>
        <p class="lead"></p>
      </div>

      <div class="container  align-items-center" id="content">
        <div class="row">
          <div class="col-md-2 order-md-2 mb-4">

          </div>
          <div class="col-md-10 order-md-1">
            <form class="needs-validation" enctype="multipart/form-data" action="/events/{{$event->id}}" method="post" novalidate>
              @method('PUT')
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

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="name">Event Name</label>
                  <input type="text" class="form-control" name="name" placeholder="" value="{{ old('name') ?? $event->name}}" required>
                  @if($errors->has('name'))
                  <div class="text-danger">
                     {{$errors->first('name')}}
                  </div>
                  @endif

                </div>
                <div class="col-md-6 mb-3">
                  <label for="reward">Reward</label>
                  <select class="custom-select d-block w-100" name="reward" required>
                    @foreach ($reward as $key)
                      @if((old('reward') ?? $event->reward) == $key)
                        <option value="{{ $key }}" selected>{{ $key }}</option>
                      @else
                        <option value="{{ $key }}">{{ $key }}</option>
                      @endif
                    @endforeach;
                  </select>

                  @if($errors->has('reward'))
                  <div class="text-danger">
                     {{$errors->first('reward')}}
                  </div>
                  @endif

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="start_time">Start Time</label>
                  <input class="date form-control" type="date" name="start_time" min="2018-04-27" value="{{$event->start_time}}" required>

                  @if($errors->has('start_time'))
                  <div class="text-danger">
                     {{$errors->first('start_time')}}
                  </div>
                  @endif

                </div>

                <div class="col-md-6 mb-3">
                  <label for="end_time">End Time</label>
                  <input class="date form-control" type="date" name="end_time" min="2018-04-27" value="{{$event->end_time}}" required>

                  @if($errors->has('end_time'))
                    <div class="text-danger">
                      {{$errors->first('end_time')}}
                    </div>
                  @endif

                </div>
              </div>

              <hr class="mb-4">
              <div class="mb-3">
                <label for="image_path">Poster</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" onchange="readURL(this);" name="images[]" value="" multiple>
                  <label class="custom-file-label" for="customFile">Choose file</label><br><br>
                </div>
                <img id="blah" class="img-fluid img-thumbnail" src="/img/IMG_6899.jpg" alt="" width="25%"/>

                @if($errors->has('images[]'))
                  <div class="text-danger">
                    {{$errors->first('images[]')}}
                  </div>
                @endif

              </div>

              <hr class="mb-4">
              <div class="mb-3">
                <label for="description">Description</label>
                <div class="d-block my-3">
                  <textarea class="form-control" name="description" rows="8" required>{{ $event->description }}</textarea>

                  @if($errors->has('description'))
                    <div class="text-danger">
                      {{$errors->first('description')}}
                    </div>
                  @endif

                </div>
              </div>

              <hr class="mb-4">
              <!-- <div class="mb-3"> -->
                <label for="mission_type">Mission</label>
                <div class="d-block my-3">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio"  value="normal" id="customRadioInline1" name="mission_type" class="custom-control-input" checked required>
                    <label class="custom-control-label" for="customRadioInline1">Normal</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="rcgame" id="customRadioInline2" name="mission_type" class="custom-control-input" required>
                    <label class="custom-control-label" for="customRadioInline2">Random Card Game</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" value="htgame" id="customRadioInline3" name="mission_type" class="custom-control-input" required>
                    <label class="custom-control-label" for="customRadioInline3">Head or Tail Game</label>
                  </div>

                  @if($errors->has('mission_type'))
                    <div class="text-danger">
                      {{$errors->first('mission_type')}}
                    </div>
                  @endif

                </div>
              <!-- </div> -->

              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">SUBMIT</button>
            </form>
          </div>
        </div>
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
