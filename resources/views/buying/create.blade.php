@extends('layouts.master')

@section('title')
  Order Processing
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

  /*progressbar*/
  #progressbar {
      margin-bottom: 30px;
      overflow: hidden;
      /*CSS counters to number the steps*/
      counter-reset: step;
  }

  #progressbar li {
      list-style-type: none;
      color: white;
      text-transform: uppercase;
      font-size: 9px;
      width: 33.33%;
      float: left;
      position: relative;
      letter-spacing: 1px;
  }

  #progressbar li:before {
      content: counter(step);
      counter-increment: step;
      width: 24px;
      height: 24px;
      line-height: 26px;
      display: block;
      font-size: 12px;
      color: #333;
      background: white;
      border-radius: 25px;
      margin: 0 auto 10px auto;
  }

  /*progressbar connectors*/
  #progressbar li:after {
      content: '';
      width: 100%;
      height: 2px;
      background: white;
      position: absolute;
      left: -50%;
      top: 9px;
      z-index: -1; /*put it behind the numbers*/
  }

  #progressbar li:first-child:after {
      /*connector not needed before the first step*/
      content: none;
  }

  /*marking active/completed steps green*/
  /*The number of the step and the connector before it = green*/
  #progressbar li.active:before, #progressbar li.active:after {
      background: #68a500;
      color: white;
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
  #cart{
    display: block;
  }
  #shipping{
    display: none;
  }
  #confirm{
    display: none;
  }
@endpush

@section('content')
  <!-- MultiStep Form -->
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <form id="msform" class="needs-validation" enctype="multipart/form-data" action="/sales" method="post" novalidate>

        {{ csrf_field() }}

        <!-- progressbar -->
        <ul id="progressbar">
          <li class="active" id="pb-cart">Cart Details</li>
          <li class="" id="pb-ship">Ship to Address</li>
          <li class="" id="pb-cf">Confirm</li>
        </ul>
        <!-- fieldsets -->
        <div id="cart" style="display:block;">
          <fieldset>
            <h2 class="fs-title">Cart Details</h2>
            <h3 class="fs-subtitle">Please check detail before go to next step.</h3>

            <label for="name" class="text-left">Your Cart</label>
            <table class="table thead-dark text-left">
              <thead>
                <tr>
                  <th scope="col">Book</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"><img src="" alt="book_cover" width="100px" height="120px">bookname</th>
                  <td>price</td>
                </tr>
                <tr>
                  <th scope="row"></th>
                  <td>
                    <span>PROMO CODE
                      <input type="text" class="form-control" required style="">
                    </span>

                  </td>
                </tr>
                <tr>
                  <th scope="row" ></th>
                  <td colspan="2">Total : total price</td>
                </tr>
              </tbody>
            </table>
            <input type="button" name="next" class="next action-button" value="Next" onclick="nextbtn()"/>
          </fieldset>
        </div>

        <div id="shipping">
          <fieldset>
            <h2 class="fs-title">Ship to Adress</h2>
            <h3 class="fs-subtitle">Please check your address info before go to next step.</h3>

            <div class="row text-left">
              <div class="col-md-5 mb-3">
                <div class="row">
                  <div class="col-md-6">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" name="fname" placeholder="" value="{{old('fname')}}" required>
                  </div>
                  <div class="col-md-6">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" name="lname" placeholder="" value="{{old('lname')}}" required>
                  </div>
                </div>
                <label for="tel">Mobile Phone</label>
                <input type="text" class="form-control" name="tel" placeholder="" value="{{old('tel')}}" required>
              </div>

              <div class="col-md-1 mb-3"></div>
              @php
              $state = ['Bangkok', 'Krabi', 'Kanchana Buri', 'Kalasin', 'Kamphaeng Phet', 'Khon Kaen',
              'Chantha Buri', 'Cha Choeng Sao', 'Chon Buri', 'Chai Nat', 'Chaiyaphum', 'Chumphon',
              'Chiang Rai', 'Chiang Mai', 'Trang','Trat','Tak','Nakhon Nayok','Nakhon Pathom',
              'Nakhon Phanom','Nakhon Rajcha Sima','Nakhon Sri Thamaraj','Nakhon Sawan','Nontha Buri',
              'Nara Thiwat','Nan','Buri Ram','Pathum Thani','Prachuap Khiri Khan','Prachin Buri',
              'Pattani','Phra Nakhon Sri Ayutthaya','Phayao','Phang Nga','Phatthalung','Phichit',
              'Phit Sanulok','Phetcha Buri','Phetchabun','Phrae','Phuket','Maha Sarakham','Muk Dahan',
              'Mae Hong Son','Ya Sothon','Yala','Roi Et','Ranong','Rayong','Rajcha Buri','Lop Buri',
              'Lampang','Lamphun','Loei','Si Saket','Sakon Nakhon','Songkhla','Satun','Samut Prakan',
              'Samut Songkhram','Samut Sakhon','Sra Kiao','Sara Buri','Sing Buri','SuKhothai',
              'Suphan Buri','Surat Thani','Surin','Nongkai','Nong Bua Lumphu','Ang Thong','Amnat Charoen',
              'Udon Thani','Utta Radit','Uthai Thani','Ubon Rajchathani'];
              @endphp
              <div class="col-md-6 mb-3">
                <label for="add1">Address</label>
                <input type="text" class="form-control" name="add1" placeholder="" value="{{old('add1')}}" required>
                <label for="add2">Address2</label>
                <input type="text" class="form-control" name="add2" placeholder="" value="{{old('add2')}}" required>
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" placeholder="" value="{{old('city')}}" required>
                <label for="state">State</label>
                <select class="form-control" name="state" required>
                  @foreach($state as $key)
                    @if(old('state') == $key)
                      <option value="{{ $key }}" selected>{{ $key }}</option>
                    @else
                      <option value="{{ $key }}">{{ $key }}</option>
                    @endif
                  @endforeach
                </select><br>
                <label for="zip">Zip Code</label>
                <input type="text" class="form-control" name="zip" placeholder="" value="{{old('zip')}}" required>
              </div>
            </div>

            <input type="button" name="previous" class="previous action-button-previous" value="Previous" onclick="previousbtn()"/>
            <input type="button" name="next" class="next action-button" value="Next" onclick="nextbtn()"/>
          </fieldset>
        </div>

        <div id="confirm">
          <fieldset>
            <h2 class="fs-title">Confirm</h2>
            <h3 class="fs-subtitle">Can not cancel or change an order when it is in process.</h3>

            <div class="row">
              <div class="col-md-6">
                <table class="table thead-dark text-left">
                  <thead>
                    <tr>
                      <th scope="col">Book</th>
                      <th scope="col">Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row"><img src="" alt="book_cover" width="100px" height="120px">bookname</th>
                      <td>price</td>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                      <td>
                        <span>PROMO CODE
                          <label for="code">code</label>
                        </span>

                      </td>
                    </tr>
                    <tr>
                      <th scope="row" ></th>
                      <td colspan="2">Total : total price</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-6">
                <div class="row text-left">

                  <div class="col-md-8 mb-3">
                    <label for="name">First Name &nbsp;&nbsp; Last Name</label>

                    <label for="tel">Mobile Phone</label>
                    <label for="tel">Mobile Phone</label>
                  </div>
                </div>

                <!-- <div class="col-md mb-3"></div> -->
                <div class="row text-left">
                  <div class="col-md-8 mb-3">
                    <label for="add1">Address</label>
                    <label for="add2">Address2</label><br>
                    <label for="city">City</label>
                    <label for="state">State</label><br>
                    <label for="zip">Zip Code</label>
                  </div>
                </div>

              </div>
            </div>

          <input type="button" name="previous" class="previous action-button-previous" value="Previous" onclick="previousbtn()"/>
          <input type="submit" name="submit" class="submit action-button" value="Submit" />
        </fieldset>
      </div>
    </form>

  </div>
  <div class="col-md-2"></div>
  </div>
  <!-- /.MultiStep Form -->

  <script type="text/javascript">

  function nextbtn() {
    var cart = document.getElementById("cart");
    var shipping = document.getElementById("shipping");
    var confirm = document.getElementById("confirm");
    var pbc = document.getElementById("pb-cart");
    var pbs = document.getElementById("pb-ship");
    var pbcf = document.getElementById("pb-cf");

    if (cart.style.display == "block") {
      cart.style.display = "none";
      shipping.style.display = "block";
      confirm.style.display = "none";
      pbs.classList.add("active");
    } else if (shipping.style.display == "block") {
      cart.style.display = "none";
      shipping.style.display = "none";
      confirm.style.display = "block";
      pbcf.classList.add("active");
    }
  }

  function previousbtn() {
    var cart = document.getElementById("cart");
    var shipping = document.getElementById("shipping");
    var confirm = document.getElementById("confirm");
    var pbcf = document.getElementById("pb-cf");
    var pbs = document.getElementById("pb-ship");

    if (shipping.style.display == "block") {
      cart.style.display = "block";
      shipping.style.display = "none";
      confirm.style.display = "none";
      pbs.classList.remove("active");
    } else if (confirm.style.display == "block") {
      cart.style.display = "none";
      shipping.style.display = "block";
      confirm.style.display = "none";
      pbcf.classList.remove("active");
    }
  }

  </script>
@endsection
