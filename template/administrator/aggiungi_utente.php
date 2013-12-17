<?php include 'header.php'; ?>
<div >
	<br/>
	<form class="form-horizontal col-md-offset-1" role="form">
        	<div class="form-group">
			<label for="nome_utente" class="col-md-2 control-label">Nome Utente:</label>
			<div class="col-md-7">
	  			<input type="text" class="form-control" id="nome_utente" placeholder="nome Utente">
          		</div>
          	</div>

		<div class="form-group">
        		<label for="nome" class="col-md-2 control-label">Nome:</label>
       			<div class="col-md-7">
       				<input type="text" class="form-control" id="nome_utente" placeholder="nome">
      			</div>
		</div>

		<div class="form-group">
      			<label for="cognome" class="col-md-2 control-label">Cognome:</label>
       			<div class="col-md-7">
       				<input type="text" class="form-control" id="cognome" placeholder="cognome">
      			</div>
		</div>

		<div class="form-group">
      			<label for="anno" class="col-md-2 control-label">Anno</label>
       			<div class="col-md-3">
				<input type="date" class="form-control" id="anno" placeholder="anno">
                	</div>
		
		</div>
		
		<div class="form-group">
      			<label for="comune" class="col-md-2 control-label">Comune di nascita:</label>
       			<div class="col-md-7">
       				<input type="text" class="form-control" id="comune" placeholder="comune di nascita">
      			</div>
		</div>

		<div class="form-group">
      			<label for="provincia" class="col-md-2 control-label">Provincia:</label>
       			<div class="col-md-7">
       				<input type="text" class="form-control" id="provincia" placeholder="provincia">
      			</div>
		</div>
		
		<div class="form-group">
      			<label for="tipo_account" class="col-md-2 control-label">Tipologia Account:</label>
       			<div class="col-md-7">
       				<input type="text" class="form-control" id="tipo_account" placeholder="tipo Account">
      			</div>
		</div>
		
		<div class="form-group">
      			<label for="email" class="col-md-2 control-label">Email Ateneo:</label>
       			<div class="col-md-7">
       				<input type="text" class="form-control" id="email" placeholder="@unisa.it">
      			</div>
		</div>
		
		<div class="form-group">
      			<label for="universita" class="col-md-2 control-label">Universit&agrave:</label>
       			<div class="col-md-7">
       				<input type="text" class="form-control" id="universita" placeholder="università">
      			</div>
		</div>

		<div class="form-group">
      			<label for="dipartimento" class="col-md-2 control-label">Dipartimento:</label>
       			<div class="col-md-7">
       				<input type="text" class="form-control" id="dipartimento" placeholder="dipartimento">
      			</div>
		</div>


		<div class="form-group">
                	<div class="col-md-offset-7">
                    		<button type="button" class="btn btn-primary btn-lg" onclick="location.href='visualizza_utenti.php'">Registra</button>
                    		<button type="button" class="btn btn-danger btn-lg " onclick = "location.href='visualizza_utenti.php'">Annulla</button>
                	</div>
            	</div>
	</form>
</div>

</body>
</html>
