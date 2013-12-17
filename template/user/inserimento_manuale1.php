<?php include 'header.php'; ?>
        <div class = "well-lg"> </div>
    
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="progress">
                    <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                      <span class="sr-only">45% Complete</span>
                    </div>
                </div>
            </div>
        </div>   
        
        <form class="form-horizontal col-md-offset-1    " role="form">
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
            <!-- Bottone per passare alla fase successiva/annullare l'operazione-->
            <div class="form-group">
                <div class="col-md-offset-6">
                    <button type="button" class="btn btn-primary btn-lg" onclick="location.href='inserimento_manuale2.php'">Passo successivo</button>
                    <button type="button" class="btn btn-danger btn-lg col-md-offset-1" onclick = "location.href='visualizza_prodotti.php'">Annulla</button>
                </div>
            </div>
        </form>    
    </body>
</html>