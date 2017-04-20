<?php

include('mysqlconnect.php');

$name = ($_POST['name']);
$gender = ($_POST['gender']);
$email = ($_POST['email']);
$password = ($_POST['password']);
$pancard = ($_POST['pancard']);
$bankaccount = ($_POST['bankaccount']);

echo $imageName = addslashes($_FILES["idproof"]["name"]);
 $imageData = addslashes(file_get_contents($_FILES["idproof"]["tmp_name"]));
 echo ".....................";
echo $imageType = addslashes($_FILES["idproof"]["type"]);
echo ".......................";
 $image_size = getimagesize($_FILES["idproof"]["tmp_name"]);
print_r($image_size);

$link = mysqli_connect("localhost", "root", "","form");
$check = "SELECT * from user WHERE  name='$name'";
$executequery = mysqli_query($link,$check);
$num_rows = mysqli_num_rows($executequery);


if ($num_rows>0) {

	echo '<script type="text/javascript">alert("User already Exists");</script>';
	echo '<script type="text/javascript">window.location="form.html";</script>';
}

else{


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
/*  
$query = "INSERT INTO user (name,gender,email,password,pancard,bankaccount,idproof)
VALUES ('$name', '$gender', '$email','$password','$pancard','$bankaccount','$imageData')";

$result = mysql_query($query);

*/
}
/*
echo $_FILES["idproof"]["name"];

echo $_FILES["idproof"]["type"];

echo $_FILES["idproof"]["size"];

echo $_FILES["idproof"]["tmp_name"];

echo $_FILES["idproof"]["error"];

$imageName = addslashes($_FILES["idproof"]["name"]);
$imageData = addslashes(file_get_contents($_FILES["idproof"]["tmp_name"]));
$imageType = addslashes($_FILES["idproof"]["type"]);
$image_size = getimagesize($_FILES["idproof"]["tmp_name"]);


if($image_size == False){

	echo "thats not an image";
}

else
{


mysql_query("INSERT INTO user (idproof) VALUES('$imageData')");

echo "thats ..an image";
}

*/

echo '<div style=" background-image: url("stock-image.png");">
	<p><a href="sendOTP/sendOTP.php">click here to continue</a></p>
	</div>';

}
?>