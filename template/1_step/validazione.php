<?php include 'header.php'; ?>

<script type="text/javascript">
	$(document).ready( function() {
		$.getJSON( "dati.json", function( data ) {
  			$.each( data, function( key, val ) {      
                            $("<tr id="+ key+"><td>"+val.titolo+"</td><td>"+val.autori+"</td></tr>").appendTo("#articoli");
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
                
        <form method="post" action = "visualizza_prodotto.php" id = "visualizza" onsubmit="this.scelta.value = selezione">
            <input type = "text" hidden read-only name = "scelta">
            <button type = "submit" class ="btn btn-default btn-block">Visualizza prodotto </button>
        </form>
        </br>
	<form method="post" action="valida_prodotto.php" id = "modifica" onsubmit="this.scelta.value = selezione">
            <input type = "text" hidden read-only name = "scelta">
            <button type = "submit" class ="btn btn-default btn-block">Valida prodotto </button>
        </form>
	</br>
        <form method="post" action="rifiuta_prodotto.php"  id = "elimina" onsubmit="this.scelta.value = selezione">
            <input type = "text" hidden read-only name = "scelta">
            <button type = "submit" class ="btn btn-default btn-block">Rifiuta prodotto</button>
        </form>
    </div>
    <!-- Tabella-->
    <div class = "panel panel-primary col-md-8" style = "margin-left:2%;">
        <table class = "table">
            <thead>
                <th>Nome Prodotto</th>
                <th>Autori</th>
            </thead>                    
            <tbody id="articoli">
            </tbody>
        </table>
    </div>
</div>
</body></html>