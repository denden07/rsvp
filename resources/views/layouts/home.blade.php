<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- G Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Oi&family=Poppins:wght@100;300;400;500;600&family=Ultra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Kristi&family=Niconne&family=Oi&family=Poppins:wght@100;300;400;500;600&family=Princess+Sofia&family=Quicksand:wght@300..700&family=Ultra&display=swap" rel="stylesheet">    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"  type="text/css">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/brands.min.css" integrity="sha512-DJLNx+VLY4aEiEQFjiawXaiceujj5GA7lIY8CHCIGQCBPfsEG0nGz1edb4Jvw1LR7q031zS5PpPqFuPA8ihlRA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css" integrity="sha512-UuQ/zJlbMVAw/UU8vVBhnI4op+/tFOpQZVT+FormmIEhRSCnJWyHiBbEVgM4Uztsht41f3FzVWgLuwzUqOObKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- FOwl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- FOwl Notify -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" ></script>
</head>
<body>

<div class="contents">
    @include('nav.nav')
    @include('home.banner')
    @include('home.block-1')
    @include('home.block-2')
    @include('home.block-2-1')
    @include('home.block-3')
    @include('home.block-4')
    @include('home.block-5')
    @include('nav.footer')
</div>

<a  class="float" id="float-button">
<i class="fa-solid fa-arrows-rotate my-float"></i>
</a>

<style>
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#fef250;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}

.my-float{
	margin-top:22px;
    color:black;
    font-size: 14px;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let refresh_button = document.getElementById('float-button')
    refresh_button.addEventListener('click', ()=> {


        Swal.fire({
  title: "Hard refresh page?",
  showDenyButton: true,
  confirmButtonText: "Yes",
  denyButtonText: `Cancel`
}).then((result) => {



    Swal.fire({
  title: "Reloading",
  html: "Page will roelaod",
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading();
    const timer = Swal.getPopup().querySelector("b");
    timerInterval = setInterval(() => {
      timer.textContent = `${Swal.getTimerLeft()}`;
    }, 100);
  },
  willClose: () => {
    clearInterval(timerInterval);
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    location.reload(true);

  }
});





})


    })
</script>


<script src="{{  asset('js/nav.min.js')}}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

<script>
  AOS.init();
</script>


<script>
    (function () {
  "use strict";

  var carousels = function () {
    $(".owl-carousel1").owlCarousel({
      loop: true,
      center: true,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      margin: 0,
      responsiveClass: true,
      nav: false,
      responsive: {
        0: {
          items: 1,
          nav: false
        },
        680: {
          items: 2,
          nav: false,
          loop: false
        },
        1000: {
          items: 3,
          nav: true
        }
      }
    });
  };

  (function ($) {
    carousels();
  })(jQuery);
})();

</script>



</body>
</html>
