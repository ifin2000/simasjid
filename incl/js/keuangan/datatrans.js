$(document).ready(function() {
				
    $('#tabeltrans').dataTable({
	
		"bProcessing": false,
		"bServerSide": true,
		"sAjaxSource": "incl/server_processing.php?var=dattrans&div="+document.getElementById('div').value,
		
		"aoColumns": [
			{ "sClass": "center" },
			null,
			null,
			{ "sClass": "center" },
			null,
			{ "sClass": "center", "bSortable": false }
        ]
						
	});			
				
});

function buka(kode){
    document.getElementById('ide').value=kode;
    $('#modal_small').modal({backdrop: "static", keyboard: false});
   
}
function del() {
    var kode = document.getElementById('ide').value;
    window.location.href="keuangan/del_trans.php?id="+kode;
}