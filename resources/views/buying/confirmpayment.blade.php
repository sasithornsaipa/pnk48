@extends('layouts.master')

@section('title')
  Confirm Money Tranfer
@endsection

@push('style')
  body{
    background-color:rgb(114, 49, 11, .7);
  }

  /*form styles*/
  #msform {
      text-align: center;
      position: relative;
      margin-top: 30px;
  }

  #msform fieldset {
      background: white;
      border: 0 none;
      border-radius: 0px;
      box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
      padding: 20px 30px;
      box-sizing: border-box;
      width: 80%;
      margin: 0 10%;

      /*stacking fieldsets above each other*/
      position: relative;
  }

  /*inputs*/
  #msform input, #msform textarea {
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 6px;
    margin-bottom: 5px;
    width: 100%;
    box-sizing: border-box;
    /* font-family: montserrat; */
    color: #2C3E50;
    font-size: 13px;
  }

  #msform input:focus, #msform textarea:focus {
      -moz-box-shadow: none !important;
      -webkit-box-shadow: none !important;
      box-shadow: none !important;
      border: 1px solid #68a500;
      outline-width: 0;
      transition: All 0.5s ease-in;
      -webkit-transition: All 0.5s ease-in;
      -moz-transition: All 0.5s ease-in;
      -o-transition: All 0.5s ease-in;
  }
  #msform #code{
    padding: 0px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 0px;
    width: 0%;
    box-sizing: border-box;
    /* font-family: montserrat; */
    color: #2C3E50;
    font-size: 13px;
  }
  /*buttons*/
  #msform .action-button {
      width: 100px;
      background: #68a500;
      font-weight: bold;
      color: white;
      border: 0 none;
      border-radius: 25px;
      cursor: pointer;
      padding: 10px 5px;
      margin: 10px 5px;
  }

  #msform .action-button:hover, #msform .action-button:focus {
      box-shadow: 0 0 0 2px white, 0 0 0 3px #68a500;
  }

  #msform .action-button-previous {
      width: 100px;
      background: #c9d874;
      font-weight: bold;
      color: white;
      border: 0 none;
      border-radius: 25px;
      cursor: pointer;
      padding: 10px 5px;
      margin: 10px 5px;
  }

  #msform .action-button-previous:hover, #msform .action-button-previous:focus {
      box-shadow: 0 0 0 2px white, 0 0 0 3px #c9d874;
  }

  /*headings*/
  .fs-title {
      font-size: 18px;
      text-transform: uppercase;
      color: #2C3E50;
      margin-bottom: 10px;
      letter-spacing: 2px;
      font-weight: bold;
  }

  .fs-subtitle {
      font-weight: normal;
      font-size: 13px;
      color: #666;
      margin-bottom: 20px;
  }

  /* Not relevant to this form */
  .dme_link {
      margin-top: 30px;
      text-align: center;
  }
  .dme_link a {
      background: #FFF;
      font-weight: bold;
      color: #ee0979;
      border: 0 none;
      border-radius: 25px;
      cursor: pointer;
      padding: 5px 25px;
      font-size: 12px;
  }

  .dme_link a:hover, .dme_link a:focus {
      background: #C5C5F1;
      text-decoration: none;
  }

  .mb-1{
    color: rgb(233, 236, 238);
  }
@endpush

@section('content')
  <!-- MultiStep Form -->
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <form id="msform" class="needs-validation" enctype="multipart/form-data" action="/buying/success" method="post" novalidate>
        @method('PUT')
        {{ csrf_field() }}

        <div id="confirm">
          <fieldset>
            <h2 class="fs-title">Confirm Money Tranfer</h2>
            <h3 class="fs-subtitle">Can not cancel or change an order when it is in process.</h3>

            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <label for="image_path">Images</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" onchange="readURL(this);" name="images[]" multiple>
                  <label class="custom-file-label" for="customFile">Choose file</label><br><br>
                </div>
                <img id="blah" class="img-fluid img-thumbnail" src="#" alt="" style="max-width: 150px;"/>
              </div>
              <div class="col-md-2"></div>
            </div>

            @php
              $banks = ['Bangkok Bank','Krungthai Bank','Siam Commercial Bank (SCB)','KASIKORNBANK',
                        'Bank of Ayudhya (Krungsri)','Thanachart Bank','TMB Bank','Kiatnakin Bank',
                        'CIMB Thai','Standard Chartered Bank','United Overseas Bank','Tisco Bank','ICBC Bank','Mega ICB'];
            @endphp
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <label for="bank_name">Bank Name</label>
                <select class="form-control" name="bank_name" required>
                  @foreach($banks as $key)
                    <option value="{{ $key }}">{{ $key }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-2"></div>
            </div>

            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <label for="datentime">Date and Time</label>
                <input class="date form-control" type="date" name="datentime" min="{{$today}}" value="{{old('datentime')}}"required>
              </div>
              <div class="col-md-2"></div>
            </div>

          <input type="submit" name="submit" class="submit action-button" value="Submit" />
        </fieldset>
      </div>
    </form>

  </div>
  <div class="col-md-2"></div>
  </div>
  <!-- /.MultiStep Form -->

  <script type="text/javascript">
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
