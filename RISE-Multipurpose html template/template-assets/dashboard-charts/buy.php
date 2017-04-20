<?php

include('mysqlconnect.php');

//echo "hhhhhheeeeeelllllllllllllllllloooooo";
$id = $_POST['id'];
$shares = $_POST['shares'];
$amount = (int)$_POST['amount'];
 /*echo $id;
 echo $shares;
 echo $amount;*/
 $id= mysql_escape_string($id);
 $shares = mysql_escape_string($shares);
 $amount = mysql_escape_string($amount);
/*	echo $id;
	echo "-----";
 echo $shares;
 echo "-----";
 echo $amount;
 echo "-----";
*/                         
   $result = mysql_query("SELECT * from portfolio where id='" .$id. "' AND shares='" .$shares. "' ");
        
    $row = mysql_fetch_assoc($result);
if (mysql_num_rows($result) > 0) {
	# code... rows should be 1 but i have take "> 0"
	$amount1 =  (int)$row["amount"];
	
	echo $amount1;   

	$amount += $amount1;
            echo "<<---amount1--";     
  echo $amount;
  
$query = "UPDATE portfolio SET amount='" .$amount. "' WHERE id='" .$id. "' AND shares='" .$shares. "'";

$result = mysql_query($query);
echo "---see result--";  
echo($result );

}

else{
echo "else part $id,$shares,$amount";
$query = "INSERT INTO portfolio (id,shares,amount)
VALUES ('$id', '$shares', '$amount')";

$result = mysql_query($query);
}	
	
		/*$query = mysqli_query($conn, "INSERT INTO finaldb (aadharno,age) values ('$aadhar','$age')");
		if($query)
		{
			echo "successful";
		} 
	
*/
?>