@extends('%UnitHint%::layouts.master')

@section('document-title', 'Preferencias del módulo %UnitName%')

@section('main')
	<div class="container-fluid mt-3">

		<h4 class="main-title">Preferencias del módulo %UnitName%</h4>

		<form id="module-settings" method="POST" action="{{ route('update-module-settings') }}">		
		@csrf

		<input type="hidden" name="module" value="%UnitHint%">
		
		@card
			<div class="form-group">
				<div class="row">
					<div class="col-12 col-md-3 font-weight-bold text-primary">
						Enviar notificaciones a un canal de Slack
					</div>
					<div class="col-12 col-md-9">

						<ul class="d-flex flex-wrap gutter-30px">
                            <li class="mb-3">
                                <div class="field-wrap">
                                    <input class="input-radio" id="rdi-1" name="slack" type="radio" value="true" {{ checked(true, module_setting('%UnitHint%', 'slack')) }}>
                                    <label for="rdi-1">Activar</label>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div class="field-wrap">
                                    <input class="input-radio" id="rdi-2" name="slack" type="radio" value="false" {{ checked(false, module_setting('%UnitHint%', 'slack')) }}>
                                    <label for="rdi-2">Desactivar</label>
                                </div>
                            </li>                            
                        </ul>
						
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-12 col-md-3 font-weight-bold text-primary">
						URL del Webhook:
					</div>
					<div class="col-12 col-md-9">
						<input type="text" class="input-bordered" name="slack_hook" value="{{ module_setting('%UnitHint%', 'slack_hook') }}">
					</div>
				</div>
			</div>
		@endcard

		<div class="form-group mt-3">
			<div class="row">				
				<div class="col-12 text-right">
					<button type="submit" class="btn btn-primary"><i class="fas fa-save align-baseline"></i> Guardar preferencias</button>
				</div>
			</div>
		</div>
			
		</form>
		
	</div>
@stop



@push('css')
	<style type="text/css">
		input[type=checkbox] {
		  transform: scale(1.4);
		}
	</style>
@endpush

@push('js')

@endpush