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
      			<label for="anno" class="col-md-2 control-label">Anno Pubblicazione:</label>
       			<div class="col-md-7">
       				<input type="text" class="form-control" id="anno" placeholder="anno">
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
                    		<button type="button" class="btn btn-primary btn-lg" onclick="location.href='visualizza_prodotti.php'">SalvaModifiche</button>
                    		<button type="button" class="btn btn-danger btn-lg " onclick = "location.href='visualizza_prodotti.php'">Annulla</button>
                	</div>
            	</div>
	</form>
</div>

</body>
</html>
