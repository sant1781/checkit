<?php
if(isset($_POST['showDesc'])){
   
    include 'connection.php';
			
	$deleteCheckQuery = "DELETE FROM checks WHERE Id = '$_POST[viewCheckIdDelete]'";
	
	if(!mysql_query($deleteCheckQuery)){
            /////////////////////////////
	}
	else{	
            if(mysql_affected_rows() !=0){  	
                echo '
                    <head>
                    <meta http-equiv="refresh" content="0">
                    </head>';
                    header("location: /checks.php");		 
             }else{
                header("location: /checks.php");	
            }	  
	}
    }
?>