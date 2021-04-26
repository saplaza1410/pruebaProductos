<div class="modal fade bd-example-modal-lg" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Marcas</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<ul id="errors" class="list-group"></ul>
	        <form method="post" id="formbrands">
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
			            <label for="referencia" class="col-form-label">Referencia</label>
			            <input type="text" class="form-control" id="referencia" name="referencia" placeholder="Referencia: Alfanumérico">
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