<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Developer Zahid">
    <meta name="description" content="Demo of how to use Isotope js with Bootstrap">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('backend/css/frontcss.css')}}">
</head>
<body>
    

    <!-- /* Please ❤ this if you like it! 😊 */ -->

    <div class="">
        <a href="{{ route('manage.multinational') }}" class="btn btn-sm btn-success">Multinational</a>
    </div>

            <!-- Portfolio Section Start -->
            <section class="portfolio overflow-hidden">
                <div class="container">
                    <div class="row">
                        <!-- Portfolio Section Heading -->
                        <div class="portfolio__heading text-center col-12">
                            <h1 class="portfolio__title fw-bold mb-5">Our Isotop</h1>
                        </div>
                        <!-- Portfolio Navigation Buttons List -->
                        <div class="col-12">
                            <ul class="portfolio__nav nav justify-content-center mb-4">
                                <li class="nav-item">
                                    <button class="portfolio__nav__btn position-relative bg-transparent border-0 active" data-filter="#allCategorypic">All</button>
                                </li>

                                @foreach($categorirs as $category) 
                                 <li class="nav-item">
                                    <button class="portfolio__nav__btn position-relative bg-transparent border-0" data-filter="#allrelated_{{$category->category_related}}">{{$category->category_name}}</button>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="row grid">
                        <div class="grid-item col-lg-4 col-sm-6" id="allCategorypic">
                            <a href="#!" class="portfolio__card position-relative d-inline-block w-100">
                                <img src="https://source.unsplash.com/s4LntDZqEW8/380x500" alt="Random Image" class="w-100">
                            </a>
                        </div>
                        <div class="grid-item col-lg-4 col-sm-6" id="allCategorypic">
                            <a href="#!" class="portfolio__card position-relative d-inline-block w-100">
                                <img src="https://source.unsplash.com/s4LntDZqEW8/380x500" alt="Random Image" class="w-100">
                            </a>
                        </div>
                        <div class="grid-item col-lg-4 col-sm-6" id="allCategorypic">
                            <a href="#!" class="portfolio__card position-relative d-inline-block w-100">
                                <img src="https://source.unsplash.com/s4LntDZqEW8/380x500" alt="Random Image" class="w-100">
                            </a>
                        </div>
                        <div class="grid-item col-lg-4 col-sm-6" id="allCategorypic">
                            <a href="#!" class="portfolio__card position-relative d-inline-block w-100">
                                <img src="https://source.unsplash.com/s4LntDZqEW8/380x500" alt="Random Image" class="w-100">
                            </a>
                        </div>
                    </div>
                    <!-- Portfolio Cards Container -->
                    <div class="row grid">
                         @foreach($categorirs as $category) 
                              @foreach($category->imageall as $categoryimg) 
                                    <div class="grid-item col-lg-4 col-sm-6 vehicle" id="allrelated_{{$category->category_related}}">
                                        <a href="#!" class="portfolio__card position-relative d-inline-block w-100">
                                            <img src="{{asset('Category/'.$category->category_image)}}" alt="Random Image" class="w-100">
                                        </a>
                                    </div>
                               @endforeach
                         @endforeach
                    </div>
                </div>
            </section>
            <!-- Portfolio Section End -->
            <a href="{{Route('back.users.update',1)}}">RESOURCE INDEX</a>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
            <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
            <script type="text/javascript">
                /* Please ❤ this if you like it! 😊 */

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
			$(this).addClass("active");
		});
	}
})(jQuery);

            </script>
            <script type="text/javascript">
                function galleryShow(value){
                   $.ajax({
                        url:'/relatedpic/'+value,
                        type:'GET',
                        dataType:'JSON',
                        success:function(response){
                            let allPicshow ="";
                            $.each(response.allpic,function(key,value){
                                allPicshow +=`<div class="grid-item col-lg-4 col-sm-6 vehicle">
                                 <a href="#!" class="portfolio__card position-relative d-inline-block w-100">
                                <img src="{{asset('Category')}}/${value.category_image}" alt="Random Image" class="w-100">
                                    </a>
                                </div>`
                            });
                            jQuery('#allPicshow').html(allPicshow)
                        }
                   });
                }
            </script>

</body>
</html>