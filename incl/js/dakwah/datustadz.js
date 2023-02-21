$(document).ready(function() {
				
    $('#tabelustadz').dataTable({
	
		"bProcessing": false,
		"bServerSide": true,
		"sAjaxSource": "incl/server_processing.php?var=ustadz&div="+document.getElementById('div').value,
		
		"aoColumns": [
			{ "sClass": "center" },
			null,
			null,
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
    window.location.href="dakwah/del_ustadz.php?id="+kode;
}