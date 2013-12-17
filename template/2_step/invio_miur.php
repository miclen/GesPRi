<?php include 'header.php'; ?>

<script type="text/javascript">
	$(document).ready( function() {
		$.getJSON( "dati.json", function( data ) {
  			$.each( data, function( key, val ) {      
                            $("<tr id="+ key+"><td><input type=\"checkbox\" name=\"invio\"></td><td>"
			      +val.titolo+"</td><td>"+val.autori+"</td></tr>").appendTo("#articoli");
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

<!-- Tabella-->
    <div class="row">
	<div class="col-md-2" style = "margin-left:1%;">
		<form method="post" action = "visualizza_prodotto.php" id = "visualizza" onsubmit="this.scelta.value = selezione">
	        <input type = "text" hidden read-only name = "scelta">
	        <button type = "submit" class ="btn btn-default btn-block">Visualizza prodotto </button>
	    </form>
	</div>
	
<form method="post" action="#">
	<div class = " panel panel-primary col-md-8 " style = "margin-left:2%;">
	    <table class = "table">
	        <thead>
		    <th>Seleziona</th>
	            <th>Nome Prodotto</th>
	            <th>Autori</th>
	        </thead>                    
	        <tbody id="articoli">
	        </tbody>
	    </table>
	</div>
    </div>
    <div class="col-md-2 col-md-offset-8">
	<button type="submit" class="btn btn-block btn-success btn-lg" onclick="location.href='invia.php'">Invia prodotti </br>al MIUR</button>
    </div>
</form>


</body>
</html>