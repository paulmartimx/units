<!DOCTYPE html>
<html lang="es-MX">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#58bb49">
	<meta name="msapplication-TileColor" content="#00aba9">
	<meta name="theme-color" content="#ccdbcc">
	@hasSection('meta-description')
	<meta name="description" content="@yield('meta-description')">
	@endif

	@include('%UnitHint%::includes.header-codes')

	<title>@yield('document-title') - {{ config('app.name') }}</title>

	{!! style('assets/app.css') !!}
	@stack('css')
</head>

<body>

	@include('%UnitHint%::includes.opening-codes')

	<section id="app">
		@include('%UnitHint%::includes.header')
		@yield('content')
		@include('%UnitHint%::includes.footer')
	</section>

	{!! script('assets/app.js') !!}
	@stack('js')

	@include('%UnitHint%::includes.closing-codes')
</body>
</html>