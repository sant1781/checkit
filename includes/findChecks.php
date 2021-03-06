<?php
    include 'Connection.php';

    // Created an query called "findCheckTypesQuery" to return the related fields from the checktype table to be used to populate the form fields 
	
    $findCheckQuery = $db->query("SELECT checks.Description, checks.Id, checks.TypeId, checktype.Code FROM checks, checktype WHERE checks.TypeId = checktype.Id");
	
    echo "<form action = '#' method = 'post' class = 'checkForm' id = 'checkEditForm'>";
    
    while($row =$findCheckQuery->fetch(PDO::FETCH_ASSOC)){
	$checkId = $row['Id'];
        $checkTypeId = $row['TypeId'];
        $checkDescription = $row['Description'];
        $checkIds = $row['Id'];
        $checkTypeIds = $row['TypeId'];
        $checkDescriptions = $row['Description'];
	$checkTypeCode = $row['Code'];
	$allText="$checkId,$checkTypeId,$checkDescription,$checkIds,$checkTypeIds,$checkDescriptions";
	
	echo "<tr>";
            echo "<td>" . $checkDescription . "</td>";
            echo "<td>" . $checkTypeCode . "</td>";
            echo "<td><input type='radio' name='checks' value='$allText' /></td>";
            echo "<input name = 'checks' type = 'hidden' value ='0' />"; // set a default value for radio buttons, will allow a value to be posted regardless 
        echo "</tr>";
    }
     echo "<input type='hidden' id ='showDescs' name='showDesc' class='details' />";   
     echo "</form>"; 
?>
<html>
   
<script language="JavaScript"> 
  
    var checkDetails = document.forms['checkEditForm'].elements['checks'];
    var result;
    
    for (var i=0, len=checkDetails.length; i<len; i++) {
        
        checkDetails[i].onclick = function(){
            this.form.showDesc.value = this.value;
            x =this.value;
            //document.getElementById("showDesc").innerHTML=x;
        
            result = x.split(',');
            document.getElementById("viewCheckIdEdit").value = result[0];
            document.getElementById("viewCheckTypeIdEdit").value = result[1];
            document.getElementById("showDescEdit").value = result[2];
            document.getElementById("viewCheckIdDelete").value = result[3];
            document.getElementById("viewCheckTypeIdDelete").value = result[4];
            document.getElementById("showDescDelete").value = result[5];
        };
    }  	
</script>
</html>
