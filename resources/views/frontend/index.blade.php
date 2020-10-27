@extends('frontend.frontend_template')
@section('frontend')
  <style type="text/css">
 
    * {
      box-sizing: border-box;
    

    }

    .slick-slide {
      margin: 0px 5px;
    }

    .slick-slide img {
      width: 800px;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      /*opacity: .2;*/
    }
    
    .slick-active {
      /*opacity: .5;*/
    }

    .slick-current {
      opacity: 1;
    }
  </style>
<div class="container-fluid">
	
	<div class="center slider">
		@foreach($albums as $album)
	    <div class="">
	      <img src="{{asset($album->photo)}}" class="img-fluid" alt="..." style="height: 300px !important;">
	    </div>
	    @endforeach
	
	</div>
	
</div>
{{--<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			    <ol class="carousel-indicators">
				    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner owl-wrapper">
				    <div class="carousel-item active">
				      <img src="{{asset('frontend/images/image1.webp')}}" class="d-block img-fluid" alt="..." style="width: 100% !important; height: 300px !important;">
				    </div>
				    <div class="carousel-item">
				      <img src="{{asset('frontend/images/image2.webp')}}" class="d-block" alt="..." style="width: 100% !important; height: 300px !important;">
				    </div>
				    <div class="carousel-item">
				      <img src="{{asset('frontend/images/image3.webp')}}" class="d-block" alt="..." style="width: 100% !important; height: 300px !important;">
				    </div>
				     <div class="carousel-item">
				      <img src="{{asset('frontend/images/image4.jpg')}}" class="d-block" alt="..." style="width: 100% !important; height: 300px !important;">
				    </div>
				     <div class="carousel-item">
				      <img src="{{asset('frontend/images/image5.jpeg')}}" class="d-block" alt="..." style="width: 100% !important; height: 300px !important;">
				    </div>
				     <div class="carousel-item">
				      <img src="{{asset('frontend/images/image6.jpg')}}" class="d-block" alt="..." style="width: 100% !important; height: 300px !important;">
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
		</div>
	</div>
</div>--}}

<div class="container my-5">
	<div class="row">
		<div class="col-md-12 my-2">
			<h4 class="text-center text-white">New Releases</h4>
		</div>
		
	</div>
	<div class="row text-white">
		<div class="col-md-2 col-sm-4 col-6">
			<div class="">
		     	<img src="{{asset('frontend/images/image1.webp')}}" class="img-fluid" alt="..." style="height: 180px !important;">
				<p class="my-2">Hello Honey</p>
			</div>
		</div>
	    <div class="col-md-2 col-sm-4 col-6">
	    	<img src="{{asset('frontend/images/image2.webp')}}" class="img-fluid" alt="..." >
	    </div>
	    <div class="col-md-2 col-sm-4 col-6">
	    	<img src="{{asset('frontend/images/image3.webp')}}" class="img-fluid" alt="..." >
	    </div>

	    <div class="col-md-2 col-sm-4 col-6">
	    	<img src="{{asset('frontend/images/image4.jpg')}}" class="img-fluid" alt="..." >
	    </div>

	    <div class="col-md-2 col-sm-4 col-6">
	    	<img src="{{asset('frontend/images/image5.jpeg')}}" class="img-fluid" alt="..." >
	    </div>
	    <div class="col-md-2 col-sm-4 col-6">
	    	<img src="{{asset('frontend/images/image6.jpg')}}" class="img-fluid" alt="..." >
	    </div>
			
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		/*$('.owl-carousel').owlCarousel({
		    loop:true,
		   
		    nav:true,
		    responsive:{
		        0:{
		            items:1
		        },
		        1000:{
		            items:3
		        },
		        1000:{
		            items:5
		        }
		    }
		})*/


      $(".center").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 1,
        slidesToScroll: 3,
        variableWidth: true,
        autoplay: true,
  		autoplaySpeed: 2000,
      });

      
	})
</script>
@endsection