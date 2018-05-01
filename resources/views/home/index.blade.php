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
				<a href="/events/1"><img class="d-block w-100" src="img/event1.png" alt="First slide"></a>
				</div>
				<div class="carousel-item">
				<a href="/events/2"><img class="d-block w-100" src="img/event2.png" alt="Second slide" ></a>
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
		<div id="book-div" style="margin:20px;">
			<h2>RETAIL  <input id="bookInput" type="text" placeholder="Search.."></h2>
			<hr>
      <div class="row">
        @foreach($books as $sale)
          @if(($sale->sale_type == 'retail') and ($sale->status == 'processing'))
            <div class="col-md-4">
              <div class="card mb-4  ">
                <div class="text-center" style="margin-top: 4%;">
                  <img class="card-img-top" src="{{$sale->images[0]->path}}" alt="Card image cap" style="max-width:180px;">
                </div>
                <div class="card-body">
                  <p class="card-text">
                    <blockquote>
                      <p class="mb-0 font-weight-normal">{{ucfirst($sale->books->name)}}</p>
                      <p class="mb-0 font-weight-normal">
                        Author:&nbsp;&nbsp;
                        <span class="mb-0 font-weight-light">{{ucfirst($sale->books->author)}}</span>
                      </p>
                      <p class="mb-0 font-weight-normal">
                        Price:&nbsp;&nbsp;
                        <span class="mb-0 font-weight-light">{{ucfirst($sale->base_price)}}</span>
                      </p>
                    </blockquote>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">Posted by {{ucfirst($sale->seller->username)}}</small>
                    <small class="text-muted">{{$sale->created_at->diffForHumans()}}</small>
                    <div class="btn-group">
                      <a class="btn btn-sm btn-outline-success" href="/books/{{$sale->id}}" role="button">View</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
			<!-- <div class="row">
				<div class="column">
				<div class="book" style="display: inline-block">
						<div>
							<a href="/books/4">
							<img src="img\123175526.jpg" alt="ป้อนคู่สู่ขวัญ">
						</div>
						<div style="text-align: center">
							<span>ป้อนคู่สู่ขวัญ</span><br>
							<span>คริสโซเพรส</span>
						</div>
						</a>
				</div>
				<div class="book" style="display: inline-block">
						<a href="/books/5">
						<img src="img\seraph.jpg" alt="เทวทูตแห่งโลกมืด เล่ม 1">
						<div style="text-align: center">
							<span>เทวทูตแห่งโลกมืด เล่ม 1</span><br>
							<span>Takaya Kagami</span>
						</div>
						</a>
					</div>
				</div>
			</div> -->
		</div>
		<br>
		<!--bid area-->
		<div id="bid-div" style="margin:20px;">
			<h2>BID  <input id="bidInput" type="text" placeholder="Search.."></h2>
			<hr>
        <div class="row">
          @foreach($books as $sale)
            @if(($sale->sale_type == 'bid') and ($sale->status == 'processing'))
              <div class="col-md-4">
                <div class="card mb-4  ">
                  <div class="text-center" style="margin-top: 4%;">
                    <img class="card-img-top" src="{{$sale->images[0]->path}}" alt="Card image cap" style="max-width:180px;">
                  </div>
                  <div class="card-body">
                    <p class="card-text">
                      <blockquote>
                        <p class="mb-0 font-weight-normal">{{ucfirst($sale->books->name)}}</p>
                        <p class="mb-0 font-weight-normal">
                          Author:&nbsp;&nbsp;
                          <span class="mb-0 font-weight-light">{{ucfirst($sale->books->author)}}</span>
                        </p>
                      </blockquote>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <small class="text-muted">Posted by {{ucfirst($sale->seller->username)}}</small>
                      <small class="text-muted">{{$sale->created_at->diffForHumans()}}</small>
                      <div class="btn-group">
                        <a class="btn btn-sm btn-outline-success" href="/books/{{$sale->id}}" role="button">View</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
				<!-- <div class="column">
					<div class='bid' style="display: inline-block">
						<div>
							<a href="/books/2">
							<img src="img\w-sentences.jpg" alt="Writing Sentences">
						</div>
						<div style="text-align: center">
							<span>Writing Sentences</span><br>
							<span>Dorothy E. Zemach<span>
						</div>
						</a>
					</div>
					<div class='bid' style="display: inline-block">
						<a href="/books/1">
						<img src="img\w-paragraphs.jpg" alt="Writing Paragraphs">
						<div style="text-align: center">
							<span>Writing Paragraphs</span><br>
							<span>Dorothy E. Zemach</span>
						</div>
						</a>
					</div>
					<div class='bid' style="display: inline-block">
						<a href="/books/3">
						<img src="img\w-reseacrh.jpg" alt="Writing Research Papers">
						<div style="text-align: center">
							<span>Writing Research Papers</span><br>
							<span>Dorothy E. Zemach</span>
						</div>
						</a>
					</div>
				</div>
			</div> -->
	@else
	<!-- not login -->
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			</ol>
			<div class="carousel-inner" style="height:400px">
				<div class="carousel-item active">
				<img class="d-block w-100" src="img/event1.png" href="events/1" alt="First slide">
				</div>
				<div class="carousel-item">
				<img class="d-block w-100" src="img/event2.png" href="events/2" alt="Second slide">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#bookInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#book-div .book").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });

    $("#bidInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#bid-div .bid").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
