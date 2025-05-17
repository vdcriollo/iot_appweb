
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	
    <title>{{ config('app.name', 'Laravel') }}</title>

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

	<!-- Main navbar -->
	
	<div class="navbar navbar-dark bg-primary navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">

		<div class="container-fluid">
			<div class="navbar-brand">
				<a href="{{ route('welcome') }}" class="d-inline-flex align-items-center">
					<img src="{{ asset('assets/images/logo_icon.svg') }}" alt="">
					<img src="{{ asset('assets/images/logo_text_light.svg') }}" class="d-none d-sm-inline-block h-16px ms-3" alt="">
				</a>
			</div>

			<div class="d-flex justify-content-end align-items-center ms-auto">

					@auth
						<ul class="navbar-nav flex-row">
							<li class="nav-item">
								<a href="{{ route('dashboard') }}" class="navbar-nav-link navbar-nav-link-icon rounded ms-1">
									<div class="d-flex align-items-center mx-md-1">
									<i class="fas fa-home"></i>
									<span class="d-none d-md-inline-block ms-2">Dashboard</span>
								</div>
								</a>
							</li>
						</ul>
					@else
					
					<ul class="navbar-nav flex-row">
						<li class="nav-item">
							<a href="{{ route('welcome') }}" class="navbar-nav-link navbar-nav-link-icon rounded ms-1 {{ Route::is('welcome')?'active fw-bold':'' }}">
								<div class="d-flex align-items-center mx-md-1">
								<i class="fas fa-home"></i>
								<span class="d-none d-md-inline-block ms-2">Inicio</span>
							</div>
							</a>
						</li>
						
						<li class="nav-item ">
							<a href="{{ route('login') }}" class="navbar-nav-link navbar-nav-link-icon rounded ms-1 {{ Route::is('login')?'active fw-bold':'' }}">
								<div class="d-flex align-items-center mx-md-1">
								<i class="fas fa-sign-in-alt"></i>
								<span class="d-none d-md-inline-block ms-2">Ingresar</span>
							</div>
							</a>
						</li>
					</ul>
					
				@endauth
				

				
			</div>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Content area -->
				<div class="content d-flex justify-content-center align-items-center">

					@yield('content')

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

	<script>
		$.validator.setDefaults({
			ignore: 'input[type=hidden], .select2-search__field',
			errorClass: 'is-invalid',
			validClass: 'is-valid',
			highlight: function(element) {
				$(element).addClass('is-invalid').removeClass('is-valid');
			},
			unhighlight: function(element) {
				$(element).removeClass('is-invalid').addClass('is-valid');
			},
			errorPlacement: function(error, element) {
				const feedbackContainer = $(element).closest('.form-floating').find('.invalid-feedback');

				if (feedbackContainer.length) {
					feedbackContainer.text(error.text()).show();
				} else {
					const newFeedback = $('<div class="invalid-feedback fw-bold"></div>').text(error.text());
					$(element).parent().append(newFeedback);
				}
			},
			submitHandler: function (form) {
				form.submit();
			}
		});

		$('#form_login').validate({
			rules: {
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 6
				}
			}
		});


</script>

</body>
</html>
