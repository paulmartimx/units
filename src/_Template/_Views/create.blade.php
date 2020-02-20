@extends('%UnitHint%::layouts.master')

@section('document-title', 'Agregar %UnitName%')

@section('content')


<div class="container-fluid mt-3">
	<h5 class="main-title">%UnitName%</h5>
	
	<form method="POST" action="{{ route('%UnitHint%.store') }}" enctype="multipart/form-data">
		@csrf

	@card

		<div class="form-group">
			<div class="row">
				<div class="col-12 col-md-3">
					Título:
				</div>
				<div class="col-12 col-md-9">
					<input type="text" name="title" class="form-control" required>
				</div>
			</div>
		</div>
	

	@endcard

	<div class="form-group mt-3 mb-3 text-right">
		<button type="submit" class="btn btn-primary">GUARDAR</button>
	</div>
	
	</form>
</div>

@stop



@push('css')

@endpush

@push('js')

@endpush