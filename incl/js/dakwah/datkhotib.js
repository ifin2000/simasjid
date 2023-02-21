$(document).ready(function() {
				
    $('#tabelkhotib').dataTable({
	
		"bProcessing": false,
		"bServerSide": true,
		"sAjaxSource": "incl/server_processing.php?var=khotib&div="+document.getElementById('div').value,
		
		"aoColumns": [
			{ "sClass": "center" },
			{ "sClass": "center" },
			null,
			null,
			null,
			{ "sClass": "center", "bSortable": false }
        ]
						
	});			
				
});

function notyConfirm(kode){
    noty({
        text: 'yakin ingin menghapus ini?',
        layout: 'topCenter',
        buttons: [
            {addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
                $noty.close();
                window.location.href="dakwah/del_khotib.php?id="+kode;
            }
            },
            {addClass: 'btn btn-danger btn-clean', text: 'Cancel', onClick: function($noty) {
                $noty.close();
               
                }
            }
        ]
    })                                                    
}  

function buka(kode){
    document.getElementById('ide').value=kode;
    $('#modal_small').modal({backdrop: "static", keyboard: false});
   
}
function del() {
    var kode = document.getElementById('ide').value;
    window.location.href="dakwah/del_khotib.php?id="+kode;
}