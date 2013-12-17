<?php include 'header.php'; ?>
<script type="text/javascript">
	$(document).ready( function() {
		$.getJSON( "dati.json", function( data ) {
  			$.each( data, function( key, val ) {      
                            if (key == document.getElementById("selezione").getAttribute("value")) {

                            document.getElementById("titolo").setAttribute("value", val.titolo);
			    document.getElementById("autori").setAttribute("value", val.autori);
                            document.getElementById("anno").setAttribute("value", val.anno);
                            document.getElementById("tipologia").setAttribute("value", val.tipologia);
                            }
			});

		});
                   
	});
	
	
</script>

<div >
	    <input type = text  value = <?php echo '"'.$_POST['scelta'].'"'; ?> hidden readonly id = "selezione"> 

	<br/>
	<form class="form-horizontal col-md-offset-1" role="form">
        	<div class="form-group">
			<label for="titolo" class="col-md-2 control-label">Titolo:</label>
			<div class="col-md-7">
	  			<input type="text" class="form-control" id="titolo" placeholder="Titolo">
          		</div>
          	</div>

		<div class="form-group">
        		<label for="autori" class="col-md-2 control-label">Autore/i:</label>
       			<div class="col-md-7">
       				<input type="text" class="form-control" id="autori" placeholder="Autore/i">
      			</div>
		</div>

		<div class="form-group">
      			<label for="anno" class="col-md-2 control-label">Anno Pubblicazione:</label>
       			<div class="col-md-7">
				<select class="form-control" id = "anno">
				    <script>
				        var sel = document.getElementById('anno');
				        sel.options.length = 0;
				        var year = new Date().getFullYear();
				        for (i = 1980; i <= year; i++) {
				            sel.options[sel.options.length] = new Option(i);
				        }
				    </script>
				</select>
			</div>
		</div>

		<div class="form-group">
	                <label for="tipologia" class="col-md-2 control-label">Tipologia:</label>
	                <div class="col-md-7">
	  	              <select class="form-control" id = "tipologia">
					<option>Website</option>
                   			<option>Rivista</option>
                       		 	<option>Articolo su rivista</option>
                        		<option>Articolo su blog</option>
                        		<option>Paper</option>
                    		</select>
                	</div>
            	</div>

		<div class="form-group">
                	<div class="col-md-offset-7">
                    		<button type="submit" class="btn btn-success btn-lg" onclick="location.href='visualizza_prodotti.php'">Salva Modifiche</button>
                    		<button type="button" class="btn btn-danger btn-lg " onclick = "location.href='visualizza_prodotti.php'">Annulla</button>
                	</div>
            	</div>
	</form>
</div>

</body>
</html>
