<?php include 'header.php'; ?>
        
        <div class = "well-lg"></div>
    
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                      <span class="sr-only"></span>
                    </div>
                </div>
            </div>
        </div>
        
        <form class = "form-horizontal col-md-offset-1" role = "form">
            <div class="form-group">
                <label for="titolo" class="col-md-2 control-label">Titolo:</label>
                <div class="col-md-7">
                    <p class="form-control-static">{Titolo}</p>
                </div>
            </div>
                
            <div class="form-group">
                <label for="autori" class="col-md-2 control-label">Autore/i:</label>
                <div class="col-md-7">
                    <p class="form-control-static">{Autore}</p>
                </div>
            </div>
            
            <div class="form-group">
                <label for="anno" class="col-md-2 control-label">Anno Pubblicazione:</label>
                <div class="col-md-7">
                    <p class="form-control-static">{Anno/Data Pubblicazione}</p>
                </div>
            </div>
                
            <div class="form-group">
                <label for="tipologia" class="col-md-2 control-label">Tipologia:</label>
                <div class="col-md-7">
                    <p class="form-control-static">{Tipologia scelta}</p>
                </div>
            </div>
        <!-- Bottone per passare alla fase successiva/tornare alla fase precedente-->
            <div class="form-group">
                <div class="col-md-offset-6">
                    <button type="button" class="btn btn-success btn-lg" onclick = "location.href='inserimento_manuale3.php'">Salva in modalit&agrave; <br>provvisoria</button>
                    <button type="button" class="btn btn-danger btn-lg col-md-offset-1" onclick = "location.href='inserimento_manuale2.php'">Passo Precedente</button>
                </div>
            </div>
        </form>  
    </body>
</html>