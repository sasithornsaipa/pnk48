@extends('layouts.master')

@section('title')
	PMK48
@endsection

@section('content')
	<div id="demo" class="carousel slide" data-ride="carousel">

	<!-- Indicators -->
	<ul class="carousel-indicators">
		<li data-target="#demo" data-slide-to="0" class="active"></li>
		<li data-target="#demo" data-slide-to="1"></li>
		<li data-target="#demo" data-slide-to="2"></li>
	</ul>

	<!-- The slideshow -->
	<div class="carousel-inner" style=" width:100%; height: 400px !important;">
		<div class="carousel-item active">
		<img src="img/IMG_6899.jpg" alt="Los Angeles">
		</div>
		<div class="carousel-item">
		<img src="img/IMG_8307.jpg" alt="Chicago">
		</div>
		<div class="carousel-item">
		<img src="img/reward_point.jpg" alt="New York">
		</div>
	</div>

	<!-- Left and right controls -->
	<a class="carousel-control-prev" href="#demo" data-slide="prev">
		<span class="carousel-control-prev-icon"></span>
	</a>
	<a class="carousel-control-next" href="#demo" data-slide="next">
		<span class="carousel-control-next-icon"></span>
	</a>

	</div>
	<br>
	<div class="col-sm" name="search-bar">
		<form class="form-inline my-2 my-lg-0">
		<input class="form-control mr-sm-2" type="text" placeholder="Search">
		<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div>
@endsection