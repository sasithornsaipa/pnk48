@extends('layouts.master')

@section('title')
  {{ucfirst($sale->books->name)}}
@endsection

@push('style')
  body{
    background-color: rgb(114, 49, 11, .7);
  }
  .jumbotron {
    margin: 3% -1%;
    background-color: rgb(233, 236, 238, 0.7);
  }
  .col-lg-8{
    margin-left: 0.5%;
    margin-top: -2%;
  }
  .col-md-3{
    margin-top: 5%;
    max-width: 23%;
  }
  .my-4{
    background-color: rgb(104, 165, 0, .125);
  }
  a{
    color: #696969;
  }
  a:hover{
    color: #808080;
  }
  .mb-1{
    color: rgb(233, 236, 238);
  }
  .list-inline-item a{
    color: rgb(233, 236, 238);
  }
  .vl{
    border-left: 0.5px solid rgba(0,0,0,.1);
    height: 700px;
    position: absolute;
    left: 69%;
    margin-left: -3px;
    top: 28%;
  }

  #images .row > .column {
    padding: 0 8px;
  }

  #images .row:after {
    content: "";
    display: table;
    clear: both;
  }

  .column {
    float: left;
    width: 25%;
  }

  /* The Modal (background) */
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: black;
  }

  /* Modal Content */
  .modal-content {
    position: relative;
    background-color: black;
    margin: auto;
    padding: 0;
    width: 60%;
    max-width: 1200px;
  }

  /* The Close Button */
  .close {
    color: white;
    position: absolute;
    top: 10px;
    right: 25px;
    font-size: 35px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: #999;
    text-decoration: none;
    cursor: pointer;
  }

  .mySlides {
    display: none;
    text-align: center;
  }

  .cursor {
    cursor: pointer
  }

  /* Next & previous buttons */
  .prev,
  .next {
    cursor: pointer;
    position: absolute;
    top: 40%;
    width: auto;
    padding: 16px;
    margin-top: -50px;
    color: white;
    font-weight: bold;
    font-size: 60px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
    -webkit-user-select: none;
  }

  /* Position the "next button" to the right */
  .next {
    right: 0;
    border-radius: 3px 0 0 3px;
  }

  /* On hover, add a black background color with a little bit see-through */
  .prev:hover,
  .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
  }

  /* Number text (1/3 etc) */
  .numbertext {
    color: #f2f2f2;
    font-size: 16px;
    padding: 8px 12px;
    position: absolute;
    top: -2%;
    margin-left: 7%;
  }

  img {
    margin-bottom: -4px;
  }

  .caption-container {
    text-align: center;
    background-color: black;
    padding: 2px 16px;
    color: white;
  }

  .demo {
    opacity: 0.6;
  }

  .active,
  .demo:hover {
    opacity: 1;
  }

  img.hover-shadow {
    transition: 0.3s
  }

  .hover-shadow:hover {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
  }
@endpush

@section('content')

<!-- Page Content -->
<div class="container">
  <div class="jumbotron jumbotron-fluid">
    <div class="row justify-content-around vertical-divider">
    <!-- Post Content Column -->
        <div class="col-lg-8">
            <!-- Title -->
            <h1 class="mt-4"> <i class="fa fa-bullhorn"></i> {{ucfirst($sale->books->name)}} </h1>
            <!-- Date/Time -->
            <p class="font-weight-light">Posted by {{ucfirst($sale->seller->username)}} on {{$created_date}}</p>
            <hr>
            <!-- Preview Image -->

            <div class="row text-center" id="images" style="margin-left: 4%; margin-bottom: 2%;">
              @php
                $count_img = 1;
              @endphp
              @foreach($img as $i)
                <!-- <img class="img-fluid rounded" src="{{$i->path}}" alt="preview" style="margin-bottom: 4%; width:200px;  height: auto;"> -->
                <div class="col-sm" style="margin-right: 2%;">
                  <img class="hover-shadow cursor img-thumbnail rounded" src="{{$i->path}}" style="width:200px; margin-right: 2%;"
                       onclick="openModal();currentSlide({{$count_img}})">
                </div>
                @php
                  $count_img++;
                @endphp
              @endforeach

            </div>

            <div id="myModal" class="modal">
              <span class="close cursor" onclick="closeModal()">&times;</span>
              <div class="modal-content">
                @php
                  $count = 1;
                @endphp
                @foreach($img as $i)
                  <div class="mySlides">
                    <div class="numbertext">{{$count}} / {{count($img)}}</div>
                    <img src="{{$i->path}}" style="width:50%" onclick="openModal();currentSlide({{$count}})" class="hover-shadow cursor">
                  </div>
                  @php
                    $count++;
                  @endphp
                @endforeach

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                <div class="caption-container">
                  <p id="caption">Book Condition Preview</p>
                </div>
              </div>
            </div>


              @if($sale->sale_type == 'bid')
                <form class="" enctype="multipart/form-data" action="/sales" method="post" >
                  <div class="text-right d-inline" id="forbid">
                    <p class="lead font-weight-bold" style="margin-top:5%;">
                      Starting Price&nbsp;&nbsp;{{$sale->base_price}}&nbsp;&nbsp;<i class="fab fa-bitcoin"></i>&nbsp;&nbsp;
                      <button type="submit" class="btn btn-success"><i class="fa fa-hand-o-right">&nbsp;&nbsp;JOIN the auction</i></button>
                    </p>
                  </div>
                </form>
              @else
                <form class="" enctype="multipart/form-data" action="/sales" method="post" >
                  <div class="text-right d-inline" >
                    <p class="lead font-weight-bold" style="margin-top:5%;">
                      {{$sale->base_price}}<i class="fab fa-bitcoin"></i>&nbsp;&nbsp;
                      <button type="submit" class="btn btn-success"><i class="fa fa-shopping-basket">&nbsp;&nbsp;BUY</i></button>
                    </p>
                  </div>
                </form>
              @endif

            <!-- Post Content -->
            <p class="lead font-weight-bold">Book Detail</p>
            <hr>
            <blockquote class="blockquote text-left">
              <p class="mb-0 font-weight-normal">{{ucfirst($sale->books->name)}}</p>
              <p class="mb-0 font-weight-normal">
                Author:&nbsp;&nbsp;
                <span class="mb-0 font-weight-light">{{ucfirst($sale->books->author)}}</span>
              </p>
              <p class="mb-0 font-weight-normal">
                Synopsis:&nbsp;&nbsp;
                <span class="mb-0 font-weight-light">{{ucfirst($sale->books->description)}}</span>
              </p><br>
            </blockquote>

            <p class="lead font-weight-bold">Book Condition</p>
            <hr>
            <blockquote class="blockquote text-center">
              <div class="condition">
                @if($sale->book_condition > 90 )
                <p class="mb-0 text-center" style="font-size: 60px;"><i class="fa fa-smile-o" ></i>&nbsp;As New</p>
                @elseif($sale->book_condition > 70 )
                <p class="mb-0 text-center" style="font-size: 60px;"><i class="fa fa-smile-o" ></i>&nbsp;Fine</p>
                @elseif($sale->book_condition > 60 )
                <p class="mb-0 text-center" style="font-size: 60px;"><i class="fa fa-smile-o" ></i>&nbsp;Very Good</p>
                @elseif($sale->book_condition > 50 )
                <p class="mb-0 text-center" style="font-size: 60px;"><i class="fa fa-smile-o" ></i>&nbsp;Good</p>
                @elseif($sale->book_condition >= 40 )
                  <p class="mb-0 text-center" style="font-size: 60px;"><i class="fa fa-meh-o" ></i>&nbsp;Fair</p>
                @else
                <p class="mb-0 text-center" style="font-size: 60px;"><i class="fa fa-frown-o" ></i>&nbsp;Poor</p>
                @endif
              </div>
            </blockquote>

            <p class="lead font-weight-bold">Payment</p>
            <hr>
            <blockquote class="blockquote text-center">
              <p class="mb-0 font-weight-normal">{{$info[0]}}</p>
              <p class="mb-0 font-weight-normal">{{$info[1]}} Branch</p>
              <p class="mb-0 font-weight-normal">{{$info[2]}}</p>
              <p class="mb-0 font-weight-normal">{{$info[3]}}</p>
            </blockquote>
        </div>

    </div>
    </div>
  </div>

  <script>
    function openModal() {
      document.getElementById('myModal').style.display = "block";
    }

    function closeModal() {
      document.getElementById('myModal').style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      captionText.innerHTML = dots[slideIndex-1].alt;
    }
  </script>
@endsection
