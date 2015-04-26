<?php

$email=$_POST["email"];
$pass=$_POST["pass"];

include("ligaBD.php");

$selecteduser="select * from registos where email='".$email."' and password='".$pass."'";


$verify_exist=mysqli_query($ligabd, $selecteduser);
$amount_record=mysqli_num_rows($verify_exist);

if($amount_record==1) //exists
{
	$regists=mysqli_fetch_array($verify_exist);
	
	Session_start();
	$_SESSION["name"]=$regists['first_name'];
	$_SESSION["email"]=$regists['email'];
	
	//header('Location: index.php');//all checked, going into the website registred.
	echo "<SCRIPT type='text/javascript'>  
		//alert('logado');
		top.location.reload();
		localStorage.setItem('loginstatus', 1);
    </SCRIPT>";
	
}
else
{
	Session_destroy();
	//header('Location: index.php');//if can't login, go back to login.html
	echo "<SCRIPT type='text/javascript'>  
	//alert('dados incorrectos!');
	localStorage.setItem('loginstatus', 0);
		top.location.reload();
		location.reload();
    </SCRIPT>";
}
?>