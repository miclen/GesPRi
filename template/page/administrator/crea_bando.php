<?php include 'header.php'; ?>
<div >
	<br/>
	<form class="form-horizontal col-md-offset-1" role="form">
        	<div class="form-group">
			<label for="nome_bando" class="col-md-2 control-label">Nome Bando:</label>
			<div class="col-md-7">
	  			<input type="text" class="form-control" id="nome_bando" placeholder="nome bando">
          		</div>
          	</div>

		<div class="form-group">
        		<label for="data_apertura" class="col-md-2 control-label">Data Apertura:</label>
       			<div class="col-md-7">
       				<input type="date" class="form-control" id="data_apertura" placeholder="data_apertura">
      			</div>
		</div>

		<div class="form-group">
      			<label for="data_chiusura" class="col-md-2 control-label">Data Chiusura:</label>
       			<div class="col-md-7">
       				<input type="date" class="form-control" id="data_chiusura" placeholder="data_chiusura">
      			</div>
		</div>

		<div class="form-group">
      			<label for="n_min" class="col-md-2 control-label">Numero prodotti minimi Annuali</label>
       			<div class="col-md-7">
				<input type="number" class="form-control" id="n_min" placeholder="n_min">
                	</div>
		
		</div>

		<div class="form-group">
                	<div class="col-md-offset-6">
                    		<button type="button" class="btn btn-primary btn-lg" onclick="location.href='visualizza_bandi.php'">Conferma Bando</button>
                    		<button type="button" class="btn btn-danger btn-lg " onclick = "location.href='visualizza_bandi.php'">Annulla</button>
                	</div>
            	</div>
	</form>
</div>

</body>
</html>
