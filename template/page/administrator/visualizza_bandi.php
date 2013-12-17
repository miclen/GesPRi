<?php include 'header.php'; ?>

<script type="text/javascript">
	$(document).ready( function() {
		$.getJSON( "dati2.json", function( data ) {
  			$.each( data, function( key, val ) {      
                            $("<tr id="+ key+"><td>"+val.nome+"</td><td>"+val.data_apertura+"</td><td>"+val.data_chiusura+"</td><td>"+val.n_min+"</td></tr>").appendTo("#articoli");
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
        <button type = "button" class ="btn btn-default btn-block" onclick="location.href='crea_bando.php'">Crea Bando </button>
        <button type = "button" class ="btn btn-default btn-block" onclick="location.href='modifica_bando.php?key='+selezione">Modifica Bando </button>
    </div>

    <!-- Tabella-->
    <div class = "panel panel-primary col-md-8" style = "margin-left:2%;">
        <table class = "table">
            <thead>
                <th>Nome Bando</th>
                <th>Data di Apertura</th>
                <th>Data di Chiusura</th>
                <th>Numero di prodotti minimi annuali</th>
            </thead>                    
            <tbody id="articoli">
            </tbody>
        </table>
    </div>
</div>
</body></html>
