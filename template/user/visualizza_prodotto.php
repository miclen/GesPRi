<?php include 'header.php'; ?>


<script type="text/javascript">
	$(document).ready( function() {
		$.getJSON( "dati.json", function( data ) {
  			$.each( data, function( key, val ) {      
                            if (key == document.getElementById("selezione").getAttribute("value")) {

                            $("<tr><td ><strong>Titolo: </strong></td><td>"+val.titolo+"</td></tr>"+
                              "<tr><td><br></td></tr>"+
                              "<tr><td ><strong>Autori: </strong></td><td>"+val.autori+"</td></tr>"+
                              "<tr><td><br></td></tr>"+
                              "<tr><td ><strong>Anno Pubblicazione: </strong></td><td>"+val.anno+"</td></tr>"+
                              "<tr><td><br></td></tr>"+
                              "<tr><td ><strong>Stato: </strong></td><td>"+val.stato+"</td></tr>"+
                              "").appendTo("#articolo");
                            }
			});

		});
                   
	});
	
	
</script>


    <div class = "well-lg"></div>
    <input type = text  value = <?php echo '"'.$_POST['scelta'].'"'; ?> hidden readonly id = "selezione"> 
    <div class="col-md-offset-2">
        <table class = "col-md-8" id="articolo"></table>
    </div>  
    
    </body>
</html>