@extends('layout.layout')

@section('content')
	<!-- Large modal -->
	<div class="col-md-12">
	
						
		<div class="row">
	        <div class="col-md-12 col-md-offset-2 p-3">
	                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="limpiar_campos()">Agregar Producto</button>
	        </div>
	    </div>
	    
		<div class="table-responsive">
			<table id="dataTable" class="table table-bordered data-table-jquery">
				<thead>
					<tr>
		        		<td class="center"><b>NOMBRE DEL PRODUCTO</b></td>
		    			<td class="center"><b>MARCA</b></td>
		    			<td class="center"><b>TALLA</b></td>
		            	<td class="center"><b>OBSERVACIONES</b></td>
		    			<td class="center"><b>CANTIDAD EN INVENTARIO</b></td>
		    			<td class="center"><b>FECHA DE EMBARQUE</b></td>
				        <td class="center"></td>
				        <td class="center"></td>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>

	@include('products.form')
	@include('products.confirmacion')
@endsection
@section('script')
	<script src="{{ asset('js/products.js') }}"></script>
@endsection