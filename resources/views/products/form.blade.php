<div class="modal fade bd-example-modal-lg" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Productos</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<ul id="errors" class="list-group"></ul>
	        <form method="post" id="formproducts">
	        	{{ csrf_field() }}
	        	<input id="id" name="id" type="hidden">
	          <div class="col-md-12">
	          	<div class="row">
		          <div class="col-md-6">
			          <div class="form-group">
			            <label for="nombre" class="col-form-label">Nombre</label>
			            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre: Alfanumérico">
			          </div>
		          </div>
		          <div class="col-md-6">
					  <div class="form-group">
					    <label for="marca">Marca</label>
					    <select class="form-control" name="marca" id="marca">
					       <option>Seleccionar</option>
					       @foreach($marcas as $key=>$value)
					       <option value="{{ $key }}">{{ $value }}</option>
					       @endforeach
					    </select>
					  </div>
				  </div>
		          <div class="col-md-4">
			          <div class="form-group">
					    <label for="talla">Talla</label>
					    <select class="form-control" name="talla" id="talla">
					      @foreach($tallas as $key=>$value)
					       <option value="{{ $key }}">{{ $value }}</option>
					      @endforeach
					    </select>
					  </div>
				  </div>
				  
				  <div class="col-md-4">
			          <div class="form-group">
			            <label for="cantidad" class="col-form-label">Cantidad</label>
			            <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad: Numérico">
			          </div>
		          </div>
		          <div class="col-md-4">
			          <div class="form-group">
			            <label for="fecha_embarque" class="col-form-label">Fecha de Embarque</label>
			            <input type="date" class="form-control" id="fecha_embarque" name="fecha_embarque">
			          </div>
		          </div>
		          <div class="col-md-12">
			          <div class="form-group">
			            <label for="observaciones" class="col-form-label">Observaciones</label>
			            <textarea class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones: Alfanumérico"></textarea>
			          </div>
			      </div>
			    </div>
		      </div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" id="save" class="btn btn-primary">Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>