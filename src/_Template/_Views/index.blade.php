@extends('%UnitHint%::layouts.master')

@section('document-title', '%UnitName%')

@section('content')

<div class="container-fluid mt-3">
	<h5 class="main-title">%UnitName%</h5>
	@card
	
	@endcard
</div>

@stop



@push('css')

@endpush

@push('js')

@endpush