$(document).ready(function(){
	$('#myTable').dataTable({
		dom: "<'row'<'col-lg-6'Bl><'col-lg-6'f>>" + //botones, tamaño y búsqueda
		"<'row'<'col-lg-12'tr>>" + //tabla
		"<'row'<'col-lg-6'i><'col-lg-6'p>>", //información y paginación
		buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf']
	});
});

//https://datatables.net/examples/api/multi_filter_select.html

