@extends('layouts.master')

<style>
img {
    border: 1px solid #ddd; /* Gray border */
    border-radius: 4px;  /* Rounded border */
	margin: 10px;
    padding: 5px; /* Some padding */
    width: 150px; /* Set a small width */
}

/* Add a hover effect (blue shadow) */
img:hover {
    box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
</style>

@section('title')
	PMK48
@endsection

@section('content')
	@if ( Auth::check() )
		<!-- start carousel -->
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			</ol>
			<div class="carousel-inner" style="height:400px">
				<div class="carousel-item active">
				<img class="d-block w-100" src="img/event1.png" alt="First slide">
				</div>
				<div class="carousel-item">
				<img class="d-block w-100" src="img/event2.png" alt="Second slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<br>
		<!--book area-->
		<div name="book-div" style="margin:20px;">
			<h2>BOOKs</h2>
			<hr>
			<div class="row">
				<div class="column">
				<div style="display: inline-block">
						<div>
							<a href="#">
							<img src="img\123175526.jpg" alt="ป้อนคู่สู่ขวัญ">
						</div>
						<div style="text-align: center">
							<span>ป้อนคู่สู่ขวัญ</span><br>
							<span>คริสโซเพรส</span>
						</div>
						</a>
					</div>
					<div style="display: inline-block">
						<a href="#">
						<img src="img\seraph.jpg" alt="เทวทูตแห่งโลกมืด เล่ม 1">
						<div style="text-align: center">
							<span>เทวทูตแห่งโลกมืด เล่ม 1</span><br>
							<span>Takaya Kagami</span>
						</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<br>
		<!--bid area-->
		<div name="bid-div" style="margin:20px;">
			<h2>BIDs</h2>
			<hr>
			<div class="row">
				<div class="column">
					<div style="display: inline-block">
						<div>
							<a href="#">
							<img src="img\w-sentences.jpg" alt="Writing Sentences">
						</div>
						<div style="text-align: center">
							<span>Writing Sentences</span><br>
							<span>Dorothy E. Zemach<span>
						</div>
						</a>
					</div>
					<div style="display: inline-block">
						<a href="#">
						<img src="img\w-paragraphs.jpg" alt="Writing Paragraphs">
						<div style="text-align: center">
							<span>Writing Paragraphs</span><br>
							<span>Dorothy E. Zemach</span>
						</div>
						</a>
					</div>
					<div style="display: inline-block">
						<a href="#">
						<img src="img\w-reseacrh.jpg" alt="Writing Research Papers">
						<div style="text-align: center">
							<span>Writing Research Papers</span><br>
							<span>Dorothy E. Zemach</span>
						</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	@else
	<!-- not login -->
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			</ol>
			<div class="carousel-inner" style="height:400px">
				<div class="carousel-item active">
				<img class="d-block w-100" src="img/event1.png" alt="First slide">
				</div>
				<div class="carousel-item">
				<img class="d-block w-100" src="img/event2.png" alt="Second slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	@endif
@endsection