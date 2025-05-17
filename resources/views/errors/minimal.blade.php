
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	
    <title>@yield('title')</title>

	<!-- Global stylesheets -->
	<link href="{{ asset('assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">

	
	<link href="{{ asset('assets/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset('assets/demo/demo_configurator.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
	<!-- /core JS files -->

	
	<!-- Theme JS files -->

	<script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/vendor/forms/validation/validate.min.js') }}"></script>
	<script src="{{ asset('assets/js/vendor/forms/validation/messages_es.js') }}"></script>
	<script src="{{ asset('assets/js/vendor/forms/selects/select2.min.js') }}"></script>


	<script src="{{ asset('assets/js/app.js') }}"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Content area -->
				<div class="content d-flex justify-content-center align-items-center">

					<!-- Container -->
					<div class="flex-fill">

						<!-- Error title -->
						<div class="text-center mb-4">
							<img src="{{ asset('assets/images/error_bg.svg') }}" class="img-fluid mb-3" height="230" alt="">
							<h1 class="display-3 fw-semibold lh-1 mb-3">
                                 @yield('code')
                            </h1>
							<h6 class="w-md-25 mx-md-auto">
                                @yield('message')
                            </h6>
						</div>
						<!-- /error title -->


						<!-- Error content -->
						<div class="text-center">
							@auth
                            <a href="{{ route('dashboard') }}" class="btn btn-primary">
								<i class="ph-house me-2"></i>
								Regresar a dashboard
							</a>
                            @else
                            <a href="{{ route('welcome') }}" class="btn btn-primary">
								<i class="ph-house me-2"></i>
								Regresar a inicio
							</a>
                            @endauth
						</div>
						<!-- /error wrapper -->

					</div>
					<!-- /container -->

				</div>
				<!-- /content area -->


				<!-- Footer -->
				@include('layouts.footer')
				<!-- /footer -->

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->


	<!-- Demo config -->
	@include('layouts.config')
	<!-- /demo config -->

</body>
</html>
