@extends('_::layouts.master')

@section('menu')
		<li class="menu-item"><a href="{{ route('%UnitHint%.index') }}"><i class="fas fa-cube"></i> %UnitName%</a></li>
		<li class="menu-item"><a href="{{ route('%UnitHint%.create') }}"><i class="fas fa-plus-circle"></i> Agregar</a></li>
		
		{{-- Settings --}}
		<li class="menu-item"><a href="{{ route('%UnitHint%.settings') }}"><i class="fas fa-cogs"></i> Preferencias</a></li>
@stop

@section('main')
	@yield('content')
@stop

@push('css')
	{!! style('app_units/%UnitHint%/css/%UnitHint%.css') !!}
@endpush

@push('js')
	{!! script('app_units/%UnitHint%/js/%UnitHint%.js') !!}	
@endpush