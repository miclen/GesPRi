<?php include 'header.php'; ?>
        <script>
            $(document).ready(function() {
            $("body").css("overflow", "hidden");
            });
        </script>

        <script>
            function goForward(id){
                var num = parseInt(id);
                document.getElementById(num).style.visibility = "hidden";
                document.getElementById(num).style.position = "absolute";
                num++;
                document.getElementById(num).style.visibility = "visible";
                document.getElementById(num).style.position = "relative";
            }
            function goBackward(id){
                var num = parseInt(id);
                document.getElementById(num).style.visibility = "hidden";
                document.getElementById(num).style.position = "absolute";
                num--;
                document.getElementById(num).style.visibility = "visible";
                document.getElementById(num).style.position = "relative";
            }
        </script>
        
        <div class = "well-lg"> </div>  
        
        <form class="form-horizontal col-md-offset-1" role="form">
            
            <div id = "1" style = "visibility : visible;">
                <p class="col-md-offset-2"><b>Passo 1</b></hp>
                <div class="row">
                    <div class="col-md-offset-2 col-md-7">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="33"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                <span class="sr-only">33% Complete</span>
                            </div>
                        </div>
                    </div>
                </div> 

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
                        <button type="button" class="btn btn-primary btn-lg" onclick=goForward("1")>Passo successivo</button>
                        <button type="button" class="btn btn-danger btn-lg col-md-offset-1" onclick = "location.href='visualizza_prodotti.php'">Annulla</button>
                    </div>
                </div>
            </div>
    
            <div id = "2" style = "visibility : hidden;">
                <p class="col-md-offset-2"><b>Passo 2</b></hp>
                <div class="row">
                    <div class="col-md-offset-2 col-md-7">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="66"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 66%">
                              <span class="sr-only">66% Complete</span>
                            </div>
                        </div>
                    </div>
                </div> 

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
                    <button type="button" class="btn btn-primary btn-lg" onclick = goForward("2")>Passo successivo</button>
                    <button type="button" class="btn btn-danger btn-lg col-md-offset-1" onclick = goBackward("2")>Passo Precedente</button>
                </div>
            </div>
            </div>
    
       
            <div id = "3" style = "visibility : hidden;">
                <div class="row">
                    <p class="col-md-offset-2"><b>Passo 3</b></hp>
                    <div class="col-md-offset-2 col-md-7">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="100"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                <span class="sr-only">100% Complete</span>
                            </div>
                        </div>
                    </div>
                </div> 
                
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
                    <button type="submit" class="btn btn-success btn-lg">Salva in modalit&agrave; <br>provvisoria</button>
                    <button type="button" class="btn btn-danger btn-lg col-md-offset-1" onclick = goBackward("3")>Passo Precedente</button>
                </div>
            </div>
            </div>
       
        </form>    
    </body>
</html>