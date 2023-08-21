<!DOCTYPE html>

@if (\Request::is('rtl'))
  <html dir="rtl" lang="ar">
@else
  <html lang="en" >
@endif

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  @if (env('IS_DEMO'))
      <x-demo-metas></x-demo-metas>
  @endif

  <link rel="icon" href="{{ asset('landing-page-assetes/img/favicon.ico') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('landing-page-assetes/img/apple-touch-icon.png') }}">
  <title>
    Return-ly Dashboard
  </title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100 {{ (\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '')) }} ">
  @auth
    @yield('auth')
  @endauth
  @guest
    @yield('guest')
  @endguest

  {{-- @if(session()->has('success'))
    <div x-data="{ show: true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="position-fixed bg-success rounded right-3 text-sm py-2 px-4">
      <p class="m-0">{{ session('success')}}</p>
    </div>
  @endif --}}
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    @if (\Request::is('dashboard'))
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>  
$(document).ready(function () {
    // Handle category selection change
    $('#category_id').change(function () {
        var categoryId = $(this).val();

        // Make an AJAX request to fetch sub-categories
        $.get('/get-sub-categories', { category_id: categoryId }, function (data) {
            // Update the sub-category dropdown
            var subCategorySelect = $('#sub_category_id');
            subCategorySelect.empty(); // Clear existing options
            subCategorySelect.append($('<option>').text('Select an option').attr('disabled', 'disabled').attr('selected', 'selected'));
            $.each(data, function (key, value) {
                subCategorySelect.append($('<option>').text(value).attr('value', key));
            });
        });
    });

    // Handle city selection change
    $('#city_id').change(function () {
        var cityId = $(this).val();

        // Make an AJAX request to fetch places
        $.get('/get-places', { city_id: cityId }, function (data) {
            // Update the places dropdown
            var placeSelect = $('#place_id');
            placeSelect.empty(); // Clear existing options
            placeSelect.append($('<option>').text('Select an option').attr('disabled', 'disabled').attr('selected', 'selected'));
            $.each(data, function (key, value) {
                placeSelect.append($('<option>').text(value).attr('value', key));
            });
        });
    });

    $(document).ready(function () {
    // ... Your existing code ...

    // Handle city selection change
    $('#city_id').change(function () {
        var selectedCity = $('#city_id option:selected').text();
        $('#city').val(selectedCity);
    });

    // Handle place selection change
    $('#place_id').change(function () {
        var selectedPlace = $('#place_id option:selected').text();
        $('#place').val(selectedPlace);
    });

    // Handle category selection change
    $('#category_id').change(function () {
        var selectedCategory = $('#category_id option:selected').text();
        $('#category').val(selectedCategory);
    });

    // Handle sub-category selection change
    $('#sub_category_id').change(function () {
        var selectedSubCategory = $('#sub_category_id option:selected').text();
        $('#sub_category').val(selectedSubCategory);
    });

    // ... Your existing code ...
});

});

    </script>
  @endif
    {{-- <script>
        const fullscreenImage = document.getElementById('fullscreen-image');
        const exitFullscreenButton = document.getElementById('exit-fullscreen-button');

        fullscreenImage.addEventListener('click', () => {
            enterFullscreen();
        });

        exitFullscreenButton.addEventListener('click', () => {
            exitFullscreen();
        });

        function enterFullscreen() {
            if (fullscreenImage.requestFullscreen) {
                fullscreenImage.requestFullscreen();
            } else if (fullscreenImage.mozRequestFullScreen) { // Firefox
                fullscreenImage.mozRequestFullScreen();
            } else if (fullscreenImage.webkitRequestFullscreen) { // Chrome, Safari and Opera
                fullscreenImage.webkitRequestFullscreen();
            } else if (fullscreenImage.msRequestFullscreen) { // IE/Edge
                fullscreenImage.msRequestFullscreen();
            }
        }

        function exitFullscreen() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) { // Firefox
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) { // Chrome, Safari and Opera
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) { // IE/Edge
                document.msExitFullscreen();
            }
        }

        document.addEventListener('fullscreenchange', () => {
            if (document.fullscreenElement) {
                exitFullscreenButton.style.display = 'block';
            } else {
                exitFullscreenButton.style.display = 'none';
            }
        });
    </script> --}}
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>
</body>

</html>
