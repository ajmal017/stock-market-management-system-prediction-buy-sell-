<?php

include('mysqlconnect.php');
$email = ($_POST['email']);
$mobile = ($_POST['mobile']);

$otp = ($_POST['otp']);
$query = "UPDATE user SET activate='1' WHERE  email='" .$email. "' AND  mobile='" .$mobile. "' AND otp='" .$otp. "'";
$result = mysql_query($query);

/*
$sql    = "SELECT activate FROM user WHERE  email='" .$email. "' AND  mobile='" .$mobile. "' AND otp='" .$otp. "'";
$result = mysql_query($sql,$conn);
echo mysqli_fetch_assoc($result);
echo "$result";
echo "mysql_numrows($result);";
$row =mysql_query( $sql, $conn );

echo "$row";

*/
$activate = mysql_query("SELECT * from user WHERE  email='" .$email. "' AND  mobile='" .$mobile. "' AND otp='" .$otp. "'");
$activate = mysql_fetch_assoc($activate);
$activate = $activate['activate'];
if ($activate==1) {
	echo "Account Activated Successfully";

	echo '<div style=" background-image: url("../../stock-image.png");">
	<p><a href="../../../RISE-Multipurpose html template/template-assets/index.php">click here to go to home page</a></p>
	</div>';

	//echo("<a href="../../../RISE-Multipurpose html template\template-assets\index.php">Verify your OTP</a>");
}
else{
	echo "The details you have passed doesnot match";
}





if($result)
echo "yohoooo"; 
else
echo "sorry bro";

?>