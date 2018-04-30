@extends('layouts.master')

@section('title')

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
    font-size: 20px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
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
            <h1 class="mt-4">{{$sale->book_id}} </h1>
            <!-- Date/Time -->
            <p class="font-weight-light">Posted by {{$sale->seller_id}} on {{$created_date}}</p>
            <hr>
            <!-- Preview Image -->

            <div class="row" id="images" style="margin-left: 4%; margin-bottom: 2%;">
              @php
                $count_img = 1;
              @endphp
              @foreach($img as $i)
                <!-- <img class="img-fluid rounded" src="{{$i->path}}" alt="preview" style="margin-bottom: 4%; width:200px;  height: auto;"> -->
                <div class="column" style="margin-right: 4%;">
                  <img src="{{$i->path}}" style="width:200px; margin-right: 4%;" onclick="openModal();currentSlide({{$count_img}})" class="hover-shadow cursor">
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

              <div class="text-right d-inline" >
                <p class="lead font-weight-bold" style="margin-top:5%;">
                  {{$sale->base_price}}<i class="fa fa-btc"></i>
                  <button type="submit" class="btn btn-success"><i class="fa fa-shopping-basket">BUY</i></button>
                </p>
              </div>


            <!-- Post Content -->
            <p class="lead font-weight-bold">Detail</p>
            <hr>
            <blockquote class="blockquote text-center">
              <p class="mb-0 font-weight-normal">book name</p>
              <p class="mb-0 font-weight-light">author</p>
              <p class="mb-0 font-weight-light">description</p>
              <p class="mb-0 font-weight-light">book condition</p>
            </blockquote>

            <p class="lead font-weight-bold">Payment</p>
            <hr>
            <blockquote class="blockquote text-center">
              <p class="mb-0 font-weight-light">bank</p>
              <p class="mb-0 font-weight-light">branch</p>
              <p class="mb-0 font-weight-light">account num</p>
              <p class="mb-0 font-weight-light">holder</p>
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
