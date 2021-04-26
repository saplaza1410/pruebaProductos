@extends('layout.layout')

@section('content')
	<div class="col-md-12">
	
						
		<div class="row">
	        <div class="col-md-12 col-md-offset-2 p-3">
	                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="limpiar_campos()">Agregar Marcas</button>
	        </div>
	    </div>
	    
		<div class="table-responsive">
			<table id="dataTable" class="table table-bordered data-table-jquery">
				<thead>
					<tr>
		        		<td class="center"><b>NOMBRE</b></td>
		    			<td class="center"><b>REFENCIA</b></td>
				        <td class="center"></td>
				        <td class="center"></td>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>
	@include('brands.form')
	@include('brands.confirmacion')
@endsection
@section('script')
	<script src="{{ asset('js/brands.js') }}"></script>
@endsection