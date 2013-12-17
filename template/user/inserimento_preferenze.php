<?php include 'header.php'; ?>

<script type="text/javascript">
	$(document).ready( function() {
		$.getJSON( "dati.json", function( data ) {
  			$.each( data, function( key, val ) {      
                            $("<tr id="+ key+"><td>"+val.titolo+"</td><td>"+val.anno+"</td><td>"+val.autori+"</td><td>"+
			      "                        <select id = \"preferenza\">"+
								"<option>1</option>"+
								"<option>2</option>"+
								"<option>3</option>"+
								"<option>4</option>"+
								"<option>5</option>"+
							"</select>"+
							"</td></tr>").appendTo("#articoli");
                    });

		});
   
	});
</script>
    
<div class = "well-lg"></div>
        <!-- Bottoni-->
<div class="row">
    
    <!-- Tabella-->
    <div class="col-md-offset-2">
	<div class = "panel panel-primary col-md-10" style = "margin-left:2%;">
	    <table class = "table">
	        <thead>
	            <th>Nome Prodotto</th>
	            <th>Data Sottomissione</th>
	            <th>Autori</th>
	            <th>Preferenza</th>
	        </thead>                    
	        <tbody id="articoli">
	        </tbody>
	    </table>
	</div>
    </div>
    <div class = "col-md-offset-8 col-md-3" style = "margin-left:1%;">        
        <form method="post" action = "salva_preferenze.php" id = "visualizza" onsubmit="this.scelta.value = selezione">
            <input type = "text" hidden read-only name = "scelta">
            <button type = "submit" class ="btn btn-success">Salva Preferenze</button>
        </form>
	<button type = "button" class ="btn btn-danger" onclick="location.href='home.php'">Annulla</button>
    </div>
</div>
</body></html>