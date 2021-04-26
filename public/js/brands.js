$(function() {
		$.fn.dataTable.ext.errMode = 'throw';
			var table = $('#dataTable').DataTable({
	        "processing": true,
	        "serverSide": true,
	        "ajax": "list-brands",
	        "columns":[
	          {data:'name',name:'name'},
	          {data:"reference",name:'reference'},
	          {data: null, defaultContent:'<a rel="" class="consult btn btn-default" data-toggle="tooltip" title="Editar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></a>',name:'id', orderable: false, searchable: false,"className": "dt-center"},
	          {data: null, defaultContent:'<a rel="" class="delete btn btn-default" data-toggle="tooltip" title="Eliminar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg></a>',name:'id', orderable: false, searchable: false,"className": "dt-center"},
	        ],
	          "language": {
	              "url": "DataTables/Spanish.json"
          },
          
        });

		$( "#save" ).on( "click", function() {
		  $.ajax({
		    type: "POST",
		    url: "add-brands",
		    data: $('form#formbrands').serializeArray(),
		    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		    error: function(jqXhr, json, errorThrown){// this are default for ajax errors 
		        console.log('jaisjiasj')
		        var errors = jqXhr.responseJSON;
		        var errorsHtml = '';
		        $.each(errors['errors'], function (index, value) {
		            errorsHtml += '<li class="list-group-item alert alert-danger">' + value + '</li>';
		        });
		        
		        $("#errors").html(errorsHtml);
		    },
		    success: function(result) {
		      var data = JSON.parse(result);
		      table.ajax.reload();
		      
				if (data == 1) {
			    	$("#modalForm").modal("hide");
			    	limpiar_campos();
			    };
		    }
		  });
		});

		$('#dataTable tbody').on( 'click', 'a.consult', function () {
	        var data = table.row( $(this).parents('tr') ).data();
	        var id = data.id;
		    $.ajax({
			    type: "GET",
			    url: "edit-brands/"+id,
			    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			    error: function(jqXHR, textStatus, errorThrown) {
			      console.log(textStatus + "\n" + errorThrown);
			    },
			    success: function(result) {
			      var data = JSON.parse(result);
			      $("#id").val(data.id);
			      $("#nombre").val(data.name);
			      $("#referencia").val(data.reference);
				  $("#modalForm").modal("show");
			      
			    }
			  });
	    });


	    $('#dataTable tbody').on( 'click', 'a.delete', function () {
	        var data = table.row( $(this).parents('tr') ).data();
	        var id = data.id;
	        $("#confirmacionModal").modal("show");
	    	$('#confirmacionSi').on( 'click', function () {
		        $.ajax({
				    type: "POST",
				    url: "delete-brands",
				    data: {_token:$("[name='_token']").attr("value"), id:id},
				    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				    error: function(jqXHR, textStatus, errorThrown) {
				      console.log(textStatus + "\n" + errorThrown);
				    },
				    success: function(result) {
				      table.ajax.reload();
				      $("#confirmacionModal").modal("hide");
				    }
				});
		    });
	    });
});

function limpiar_campos() {
	$("#formbrands")[0].reset();
	$("#id").val('');
}