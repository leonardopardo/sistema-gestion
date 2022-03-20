<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>@yield('title') - SiGEx </title>
		<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="icon" href="https://via.placeholder.com/32x32" type="image/x-icon"/>
		<script src={{ asset('assets/js/plugin/webfont/webfont.min.js') }}></script>
        <script>
            WebFont.load({
                google: {
                    "families":["Lato:300,400,700,900"]
                },
                custom: {
                    "families":[
                        "Flaticon",
                        "Font Awesome 5 Solid",
                        "Font Awesome 5 Regular",
                        "Font Awesome 5 Brands",
                        "simple-line-icons"
                    ],
                    urls: [
                        '{{ asset('assets/css/fonts.min.css') }}'
                    ]
                },
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
		@include('layouts.base._styles')
		@stack('styles')
	</head>
	<body>
        @inject('one_drive', 'App\Helpers\TokenCache')
		<div class="wrapper">
			{{-- Top--}}
			@include('layouts.base._topbar')

			{{-- Side --}}
			@include('layouts.base._sidebar')

			<div class="main-panel">

				<div class="content">

					{{-- Panel Header --}}
					@yield('panel-header')

					{{-- Breadcrumb --}}
					@yield('breadcrumb')

					{{-- Content --}}
					@yield('content')

				</div>

				{{-- Footer --}}
				@include('layouts.base._footer')

			</div>

			{{-- QuickSidebar --}}
			@include('layouts.base._quick_sidebar')

		</div>

		{{-- VUE JS --}}
		<script src="{{ asset('assets/js/app.js') }}"></script>


		@include('layouts.base._scripts')

        @stack('scripts')
	</body>
</html>
