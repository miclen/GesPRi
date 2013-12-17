<?php include 'header.php'; ?>

<script type="text/javascript">
	$(document).ready( function() {
		$.getJSON( "dati3.json", function( data ) {
  			$.each( data, function( key, val ) {      
                            $("<tr id="+ key+"><td>"+val.nome+"</td><td>"+val.data+"</td><td>"+val.universita+"</td><td>"+val.dipartimento+"</td></tr>").appendTo("#articoli");
                            $("#"+key).click(function(){
                                $.each(data, function() {
                                    $("tr").css("background-color", "white");
                                });
                                $("#"+key).css("background-color","lightblue");
                                selezione = key;
                            });
                    });

		});
   
	});
</script>
<div class = "well-lg"></div>
<!-- Bottoni-->
<div class="row">
    <div class = "col-md-2" style = "margin-left:1%;">
        <button type = "button" class ="btn btn-default btn-block" onclick="location.href='modifica_utente.php?key='+selezione">Modifica </button>
        <button type = "button" class ="btn btn-default btn-block" onclick="location.href='elimina_bando.php?key='+selezione">Elimina</button>
    </div>

    <!-- Tabella-->
    <div class = "panel panel-primary col-md-8" style = "margin-left:2%;">
        <table class = "table">
            <thead>
                <th>Nome Utente</th>
                <th>Data di nascita</th>
                <th>Universit&agrave</th>
                <th>Dipartimento</th>
            </thead>                    
            <tbody id="articoli">
            </tbody>
        </table>
    </div>
</div>
</body></html>
