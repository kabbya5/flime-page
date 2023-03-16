<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>

    {{-- boostrap link  --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    @yield('style')
    <style>
        /* Please ❤ this if you like it! 😊 */
/* Google Font Link */
@import url("https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;700&display=swap");
/* Reset CSS Style */
* {
  margin: 0;
  padding: 0;
  outline: 0;
  font-family: "Work Sans", sans-serif;
}
img {
  object-fit: cover;
}
/* Portfolio Section Style */
.portfolio {
  padding: 3rem 0 1.5rem;
}
.portfolio__title {
  font-size: 3rem;
  line-height: 1;
}
.portfolio__nav__btn {
  font-size: 1.3rem;
  font-weight: 400;
  padding: 0.4rem 1rem;
  color: #000000;
}
.portfolio__nav__btn::before,
 .portfolio__nav__btn::after {
  content: "";
  position: absolute;
  left: 0;
  transform: scaleX(0);
  width: 100%;
  height: 2px;
  background-color: #d9d9d9;
  transition: transform ease-in-out 0.3s;
}
.portfolio__nav__btn::before {
  top: 0;
  transform-origin: left center;
}
.portfolio__nav__btn::after {
  bottom: 0;
  transform-origin: right center;
}
.portfolio__nav__btn.active::before, 
.portfolio__nav__btn:hover::before, 
.portfolio__nav__btn:focus::before, 
.portfolio__nav__btn.active::after, 
.portfolio__nav__btn:hover::after, 
.portfolio__nav__btn:focus::after {
  transform: scaleX(1);
}
.portfolio__nav__btn.active::before,
.portfolio__nav__btn:hover::before, 
.portfolio__nav__btn:focus::before {
  transform-origin: right center;
}
.portfolio__nav__btn.active::after,
.portfolio__nav__btn:hover::after,
.portfolio__nav__btn:focus::after {
  transform-origin: left center;
}
.portfolio__card {
  margin-bottom: 1.5rem;
}
.portfolio__card::after {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);
  opacity: 0;
  transition: opacity linear 0.3s;
}
.portfolio__card:hover::after, .portfolio__card:focus::after {
  opacity: 1;
}
        .main{
            display: flex;
        }
        .sidebar{
            width: 200px;
            padding: 20px 20px;
            background-color: #04AA6D;
            height: 100vh;
            position: sticky;
            top: 0;
        }
        ul{
            list-style: none;
        }
        li{
            display: block;
            margin-top: 25px;
        }
        li a{
            
            color: #ffffff;
            font: 500;
            font-size: 18px;
            line-height: 30px;
            text-decoration: none;
            text-transform: capitalize;
            
        }
        li img{
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    
{{-- sidebar --}}

<div class="main">
    <div class="sidebar">
        <ul>
            <li>
                <img src="https://media.istockphoto.com/id/1313644269/vector/gold-and-silver-circle-star-logo-template.jpg?s=612x612&w=0&k=20&c=hDqCI9qTkNqNcKa6XS7aBim7xKz8cZbnm80Z_xiU2DI=" alt="">
            </li>
            <li>
                <a href="{{ route('categories.index') }}"> category </a>
            </li>

            <li>
                <a href="{{ route('images.index') }}"> Images </a>
            </li>
        </ul>
    </div>
    <div class="container">
        @yield('content') 
    </div>
</div>
@include('test.session_message')

<!-- Portfolio Section Start -->

<!-- Portfolio Section End -->

{{-- script --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
(function ($) {
	"use strict";

	$(window).on("load", function () {
		isotopeInit();
	});

	/* Isotope Init */
	function isotopeInit() {
		$(".grid").isotope({
			itemSelector: ".grid-item",
			layoutMode: "fitRows",
			masonry: {
				isFitWidth: true
			}
		});

		// filter items on button click
		$(".portfolio__nav__btn").on("click", function () {
			var filterValue = $(this).attr("data-filter");
			$(".grid").isotope({ filter: filterValue });

			// Toggle active class on button click
			$(".portfolio__nav__btn").removeClass("active");
			$(this).addClass("portfolio__nav__btn__active");
		});
	}
	
})(jQuery);
</script>
</body>
</html>