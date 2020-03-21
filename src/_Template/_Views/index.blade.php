@extends('%UnitHint%::layouts.master')

@section('document-title', '%UnitName%')
@section('nav-current', '%UnitHint%')

@section('content')

<div class="container-fluid mt-3">
	<h5 class="main-title">%UnitName%</h5>	
</div>

@stop



@push('css')

@endpush

@push('js')

@endpush