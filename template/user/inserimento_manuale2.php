<?php include 'header.php'; ?>
   
        <div class = "well-lg"></div>
    
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
                      <span class="sr-only"></span>
                    </div>
                </div>
            </div>
        </div>   
        
        <form class="form-horizontal col-md-offset-1" role="form">
            <div class="form-group">
                <label for="formato" class="col-md-2 control-label">Formato della pubblicazione:</label>
                <div class="col-md-7">
                    <select class="form-control" id = "formato">
                        <option>PDF</option>
                        <option>DOCX</option>
                        <option>DVI</option>
                        <option>HTML</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="lingua" class="col-md-2 control-label">Lingua pubblicazione:</label>
                <div class="col-md-7">
                    <select class="form-control" id = "lingua">
                        <option>Inglese</option>
                        <option>Italiano</option>
                        <option>Francese</option>
                        <option>Spagnolo</option>
                    </select>
                </div>
            </div>
            
            
            <div class="form-group">
                <label for="doi" class="col-md-2 control-label">Codice DOI:</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" id="doi" placeholder="Codice DOI">
                </div>
            </div>
            <!-- Bottone per passare alla fase successiva/tornare alla fase precedente-->
            <div class="form-group">
                <div class="col-md-offset-6">
                    <button type="button" class="btn btn-primary btn-lg" onclick = "location.href='inserimento_manuale3.php'">Passo successivo</button>
                    <button type="button" class="btn btn-danger btn-lg col-md-offset-1" onclick = "location.href='inserimento_manuale1.php'">Passo Precedente</button>
                </div>
            </div>
        </form>
    </body>    
</html>