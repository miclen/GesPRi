<?php include 'header.php'; ?>
<div >
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
      			<label for="ID" class="col-md-2 control-label">ID:</label>
       			<div class="col-md-7">
       				<input type="text" class="form-control" id="id" placeholder="ID">
      			</div>
		</div>

		<div class="form-group">
      			<label for="anno_da" class="col-md-2 control-label">Anno da:</label>
       			<div class="col-md-3">
       				<select class="form-control" id = "anno_da">
              				<script>
       					var sel = document.getElementById('anno_da');
                         		sel.options.length = 0;
                      			var year = new Date().getFullYear();
      					for (i = 1980; i <= year; i++) {
                                	sel.options[sel.options.length] = new Option(i);}
                        		</script>
                    		</select>
                	</div>

		

      			<label for="anno_a" class="col-md-1 control-label">A:</label>
       			<div class="col-md-3">
       				<select class="form-control" id = "anno_a">
              				<script>
       					var sel = document.getElementById('anno_a');
                         		sel.options.length = 0;
                      			var year = new Date().getFullYear();
      					for (i = 1980; i <= year; i++) {
                                	sel.options[sel.options.length] = new Option(i);}
                        		</script>
                    		</select>
                	</div>
		</div>
		<div class="form-group">
                	<div class="col-md-offset-7">
                    		<button type="button" class="btn btn-primary btn-lg" onclick="location.href='risultati_ricerca.php'">Cerca</button>
                    		<button type="button" class="btn btn-danger btn-lg " onclick = "location.href='visualizza_prodotti.php'">Annulla</button>
                	</div>
            	</div>
	</form>
</div>

</body>
</html>
