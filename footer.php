<footer class="footer footer-bg">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-lg-2 mb-4 mb-lg-0 text-left">

			</div>
			<div class="col-sm-4 col-lg-2 mb-4 mb-lg-0 text-left">

			</div>
			<div class="col-sm-4 col-lg-2 mb-4 mb-lg-0 text-left">

			</div>
			<div class="col-sm-4 col-lg-2 mb-4 mb-lg-0 text-left">

			</div>
			<div class="col-sm-8 col-lg-4 mb-4 mb-lg-0 text-left">

				<form action="" class="form-subscribe">
					<div class="input-group">

						<div class="input-group-append">

						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="d-sm-flex justify-content-between footer__bottom top-border">
			<p>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>
					document.write(new Date().getFullYear());
				</script> All rights reserved | Template by <a href="https://colorlib.com" target="_blank">Colorlib</a>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			</p>
			<ul class="social-icons mt-2 mt-sm-0">
				<li><a href="#/"><i class="fab fa-facebook-f"></i></a></li>
				<li><a href="#/"><i class="fab fa-twitter"></i></a></li>
				<li><a href="#/"><i class="fab fa-dribbble"></i></a></li>
				<li><a href="#/"><i class="fab fa-behance"></i></a></li>
			</ul>
		</div>
	</div>
</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<!--<script src="DataTables/datatables.min.js"></script>-->
	<script src="vendor/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="vendor/owl-carousel/owl.carousel.min.js"></script>

	<script>
		var testimonialCarousel = $('.testimonialCarousel');
      testimonialCarousel.owlCarousel({
      loop:true,
      margin:80,
      startPosition: 2,
      nav: false,
      responsiveClass:true,
      responsive:{
        0:{
            items:1
        },
        1000:{
            items:2,
            loop:true
        }
      }
    });

    var heroCarousel = $('.heroCarousel');
      heroCarousel.owlCarousel({
      loop:true,
      margin:10,
      nav: false,
      startPosition: 1,
      responsiveClass:true,
      responsive:{
        0:{
            items:1
        }
      }
	});

	var dropToggle = $('.menu_right > li').has('ul').children('a');
	dropToggle.on('click', function() {
		dropToggle.not(this).closest('li').find('ul').slideUp(200);
		$(this).closest('li').children('ul').slideToggle(200);
		return false;
	});

	$( ".toggle_icon" ).on('click', function() {
		$( 'body' ).toggleClass( "open" );
	});

	</script>
</body>
</html>