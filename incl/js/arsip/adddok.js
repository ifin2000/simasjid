$(function() {  
    $("#hakakses").autocomplete({
      minLength:2 ,
        source: 'arsip/suggest_nama.php',
        open: function(event, ui) {
            
            var autocomplete = $(".ui-autocomplete:visible");
            var oldTop = autocomplete.offset().top;
            var newTop = oldTop - $("#hakakses").height() + 25;
            autocomplete.css("top", newTop);
            
        }
    });
});