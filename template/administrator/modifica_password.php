<?php include 'header.php'; ?>
    
        <br/><br/><br/>
	<form class="form-horizontal col-md-offset-2" role="form">
	    
            <div class="form-group">
      	    	<label for="passwordattuale" class="col-md-2 control-label">Inserisci password attuale:</label>
    		<div class="col-md-7">
    			<input type="password" class="form-control" id="passwordattuale" placeholder="Password Attuale">
                </div>
	    </div>
	    
	    <div class="form-group">
      	    	<label for="nuovapassword" class="col-md-2 control-label">Inserisci nuova password:</label>
    		<div class="col-md-7">
    			<input type="password" class="form-control" id="nuovapassword" placeholder="Nuova Password">
                </div>
	    </div>
	    
	    <div class="form-group">
      	    	<label for="confermapassword" class="col-md-2 control-label">Conferma nuova password:</label>
    		<div class="col-md-7">
    			<input type="password" class="form-control" id="confermapassword" placeholder="Conferma Password">
                </div>
	    </div>
	    
            <div class="form-group">
                <div class=" col-md-offset-6">
                    <button type="submit" class="btn btn-primary btn-lg">Conferma</button>
                    
                    <button type="button" class="btn btn-danger btn-lg col-md-offset-1">Annulla</button>
                </div>
            </div>
        </form>
    </body>
</html>