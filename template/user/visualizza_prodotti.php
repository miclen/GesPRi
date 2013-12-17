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
			$("#articolo1").css("background-color","lightblue");
			selezione = "articolo1";
			});

		});
   
	});
	
	
</script>
    
<div class = "well-lg"></div>
        <!-- Bottoni-->
<div class="row">
    <div class = "col-md-2" style = "margin-left:1%;">
        
        <button type = "button" class ="btn btn-default btn-block" onclick="location.href='inserimento_manuale.php'">Aggiungi prodotto </button>
        <br>
        <form method="post" action = "visualizza_prodotto.php" id = "visualizza" onsubmit="this.scelta.value = selezione">
            <input type = "text" hidden read-only name = "scelta">
            <button type = "submit" class ="btn btn-default btn-block">Visualizza prodotto </button>
        </form>
	<br>
        <form method="post" action="modifica_prodotto.php" id = "modifica" onsubmit="this.scelta.value = selezione">
            <input type = "text" hidden read-only name = "scelta">
            <button type = "submit" class ="btn btn-default btn-block">Modifica prodotto </button>
        </form>
	<br>
        <form method="post" action="rendi_definitivo.php" id = "definitivo" onsubmit="this.scelta.value = selezione">
            <input type = "text" hidden read-only name = "scelta">
            <button type = "submit" class ="btn btn-default btn-block">Rendi definitivo </button>
        </form>
	<br>
        <form method="post" action="elimina_prodotto.php"  id = "elimina" onsubmit="this.scelta.value = selezione">
            <input type = "text" hidden read-only name = "scelta">
            <button type = "submit" class ="btn btn-default btn-block">Elimina prodotto</button>
        </form>
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