$(function() {  
    $("#nama").autocomplete({
      minLength:2 ,
        source: 'dakwah/suggest_nama.php?var=ustadz',
        open: function(event, ui) {
            
            var autocomplete = $(".ui-autocomplete:visible");
            var oldTop = autocomplete.offset().top;
            var newTop = oldTop - $("#nama").height() + 25;
            autocomplete.css("top", newTop);
            
        }
    });
});

$(function() {  
    $("#bilal").autocomplete({
      minLength:2 ,
        source: 'dakwah/suggest_nama.php?var=muadzin',
        open: function(event, ui) {
            
            var autocomplete = $(".ui-autocomplete:visible");
            var oldTop = autocomplete.offset().top;
            var newTop = oldTop - $("#bilal").height() + 25;
            autocomplete.css("top", newTop);
            
        }
    });
});

$(function() {  
    $("#muadzin").autocomplete({
      minLength:2 ,
        source: 'dakwah/suggest_nama.php?var=muadzin',
        open: function(event, ui) {
            
            var autocomplete = $(".ui-autocomplete:visible");
            var oldTop = autocomplete.offset().top;
            var newTop = oldTop - $("#muadzin").height() + 25;
            autocomplete.css("top", newTop);
            
        }
    });
});