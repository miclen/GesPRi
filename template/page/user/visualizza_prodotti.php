<?php include 'header.php'; ?>

<script type="text/javascript">
	$(document).ready( function() {
		$.getJSON( "dati.json", function( data ) {
  			$.each( data, function( key, val ) {      
                            $("<tr id="+ key+"><td>"+val.titolo+"</td><td>"+val.anno+"</td><td>"+val.autori+"</td><td>"+val.stato+"</td></tr>").appendTo("#articoli");
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
        <button type = "button" class ="btn btn-default btn-block" onclick="location.href='inserimento_manuale1.php'">Aggiungi prodotto </button>
        <button type = "button" class ="btn btn-default btn-block" onclick="location.href='modifica_prodotto.php?key='+selezione">Modifica prodotto </button>
        <button type = "button" class ="btn btn-default btn-block" onclick="location.href='rendi_definitivo.php?key='+selezione">Rendi definitivo </button>
        <button type = "button" class ="btn btn-default btn-block" onclick="location.href='elimina_prodotto.php?key='+selezione">Elimina prodotto</button>
    </div>
    <!-- Tabella-->
    <div class = "panel panel-primary col-md-8" style = "margin-left:2%;">
        <table class = "table">
            <thead>
                <th>Nome Prodotto</th>
                <th>Data Sottomissione</th>
                <th>Autori</th>
                <th>Stato</th>
            </thead>                    
            <tbody id="articoli">
            </tbody>
        </table>
    </div>
</div>
</body></html>