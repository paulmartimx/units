@extends('_::layouts.master')

@section('main')
	@yield('content')
@stop

@push('css')
	{!! style('app_units/%UnitHint%/css/%UnitHint%.css') !!}
@endpush

@push('js')
	{!! script('app_units/%UnitHint%/js/%UnitHint%.js') !!}	
@endpush