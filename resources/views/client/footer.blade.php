<footer class="footer">
    <style>
        .footer {

            background-color: #000;
            /* Noir */
            color: #fff;
            /* Texte en blanc */
            padding: 30px 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-categories,
        .footer-pages,
        .footer-support {
            flex: 1;
            margin-right: 30px;
        }

        .footer-footer-support {
            flex: 1;
            margin-right: 30px;
        }

        .footer-categories ul,
        .footer-pages ul,
        .footer-support ul {
            list-style: none;
            padding: 0;
        }

        .footer-categories h3,
        .footer-pages h3,
        .footer-supportcategories h3 {
            margin-bottom: 10px;
            font-size: 18px;

            font ulfooter-support {
                h3 {
                    font-size: 18px;
                    margin-bottom: 10px;
                }
            }
        }

        .ul {
            list-style: none;
            padding: 0;
        }

        .li {
            margin-bottom: 5px-weightbold;
        }



        .a {
            color: #fff;
        }

        .footer-categories.footer-pages ul.footer li.footer-pages li.footer-support li {
            margin-bottom: 5px;
        }

        .footer-categories a,
        .footer-pages a,
        .footer-support a {
            color: #fff;
            text-decoration: none;
        }

        .footer-copyright {
            text-decoration: none;
        }

        .footer-copyright {
            text-align: center;
            margin-top: 20px;
            border-top: 1px solid #fff;
            /* Couleur et épaisseur de la bordure */
            padding-top: 10px;
            /* Espace au-dessus de la bordure */
            margin: 0 100px;
            /* Espace à gauche et à droite */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .social-icons {
            display: flex;
        }

        .social-icons a {
            margin-right: 10px;
        }

        .payment-methods {
            display: flex;
        }

        .payment-methods img {
            margin-right: 20px;
            width: 70px;
            /* Taille de l'icône en largeur */
            height: auto;
            /* Hauteur automatique pour conserver le ratio */
            padding: -5px;
            /* Espace autour de l'icône */
        }

        .social-icons {
            display: flex;
            gap: 10px;
        }

        .social-icons a img {
            width: 40px;
            /* Taille de l'icône en largeur */
            height: auto;
            /* Hauteur automatique pour conserver le ratio */
            padding: 5px;
            /* Espace autour de l'icône */
        }
    </style>
    <div class="footer-content">
        <div class="footer-categories">
            <h3>Categories</h3>
            <ul>
                <li><a href="http://127.0.0.1:8000/category-product/Men">Men</a></li>
                <li><a href="http://127.0.0.1:8000/category-product/Women">Women</a></li>
                <li><a href="http://127.0.0.1:8000/category-product/Equipment">Equipement</a></li>
                <li><a href="http://127.0.0.1:8000/category-product/Supplements">Complement</a></li>
            </ul>
        </div>
        <div class="footer-pages">
            <h3>Pages</h3>
            <ul>
                <li><a href="{{ route('fhome') }}">Home</a></li>
                <li><a href="http://127.0.0.1:8000/about-us">About us</a></li>
                <li><a href="{{ route('shop.index') }}"> Products</a></li>
                <li><a href="{{ route('category') }}"> Category</a></li>
            </ul>
        </div>
        <div class="footer-support">
            <h3>Information</h3>
            <ul>
                <li><a href="http://127.0.0.1:8000/profile">Profile</a></li>
                <li>FitnessBoutique@gmail.ma</li>
                <li>+212 05-67-26-43-91</li>
            </ul>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="payment-methods">
            <img src="{{ asset('images/paypal.png') }}" alt="PayPal">
            <img src="{{ asset('images/visa.png') }}" alt="Card">
            <img src="{{ asset('images/cod.png') }}" alt="Cash on Delivery">
        </div>
        <p>&copy; 2024 FitnessBoutique. All rights reserved</p>
        <div class="social-icons">
            <a href="#"><img src="{{ asset('images/fb3.png') }}" alt="Facebook"></a>
            <a href="#"><img src="{{ asset('images/insta.png') }}"alt="Instagram"></a>
            <a href="#"><img src="{{ asset('images/tik.png') }}" alt="TikTok"></a>
        </div>

    </div>
</footer>


<!-- /End Footer Area -->

<!-- Jquery -->
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-migrate-3.0.0.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<!-- Color JS -->
<script src="{{ asset('frontend/js/colors.js') }}"></script>
<!-- Slicknav JS -->
<script src="{{ asset('frontend/js/slicknav.min.js') }}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('frontend/js/owl-carousel.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('frontend/js/magnific-popup.js') }}"></script>
<!-- Waypoints JS -->
<script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
<!-- Countdown JS -->
<script src="{{ asset('frontend/js/finalcountdown.min.js') }}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('frontend/js/nicesellect.js') }}"></script>
<!-- Flex Slider JS -->
<script src="{{ asset('frontend/js/flex-slider.js') }}"></script>
<!-- ScrollUp JS -->
<script src="{{ asset('frontend/js/scrollup.js') }}"></script>
<!-- Onepage Nav JS -->
<script src="{{ asset('frontend/js/onepage-nav.min.js') }}"></script>
{{-- Isotope --}}
{{-- <script src="{{asset('frontend/js/isotope/isotope.pkgd.min.js')}}"></script> --}}
<!-- Easing JS -->
{{-- <script src="{{asset('frontend/js/easing.js')}}"></script> --}}

<!-- Active JS -->
{{-- <script src="{{asset('frontend/js/active.js')}}"></script> --}}


{{-- @stack('scripts') --}}
{{-- <script>
		setTimeout(function(){
		  $('.alert').slideUp();
		},5000);
		$(function() {
		// ------------------------------------------------------- //
		// Multi Level dropdowns
		// ------------------------------------------------------ //
			$("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
				event.preventDefault();
				event.stopPropagation();

				$(this).siblings().toggleClass("show");


				if (!$(this).next().hasClass('show')) {
				$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
				}
				$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
				$('.dropdown-submenu .show').removeClass("show");
				});

			});
		});
	  </script> --}}
