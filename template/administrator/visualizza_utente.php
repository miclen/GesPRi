<?php include 'header.php'; ?>


<script type="text/javascript">
	$(document).ready( function() {
		$.getJSON( "dati3.json", function( data ) {
  			$.each( data, function( key, val ) {      
                            if (key == document.getElementById("selezione").getAttribute("value")) {

                            $("<tr><td ><strong>Nome: </strong></td><td>"+val.nome+"</td></tr>"+
                              "<tr><td><br></td></tr>"+
                              "<tr><td ><strong>Cognome: </strong></td><td>"+val.cognome+"</td></tr>"+
                              "<tr><td><br></td></tr>"+
                              "<tr><td ><strong>Data di nascita: </strong></td><td>"+val.data+"</td></tr>"+
                              "<tr><td><br></td></tr>"+
                              "<tr><td ><strong>Universit&agrave;: </strong></td><td>"+val.universita+"</td></tr>"+
                              "<tr><td><br></td></tr>"+
                              "<tr><td ><strong>Dipartimento: </strong></td><td>"+val.dipartimento+"</td></tr>"+
                              "").appendTo("#utente");
                            }
			});

		});
                   
	});
	
	
</script>


    <div class = "well-lg"></div>
    <input type = text  value = <?php echo '"'.$_POST['scelta'].'"'; ?> hidden readonly id = "selezione"> 
    <div class="col-md-offset-2">
        <table class = "col-md-8" id="utente"></table>
    </div>  
    
    </body>
</html>