<?php
$ligabd=mysqli_connect('127.0.0.1','ne_admin','12345'); //login to mySQL

if(!$ligabd)
{
echo"<br> Error: Unable to connect to mySQL"; exit;
}

$chooseBD=mysqli_select_db($ligabd,'novas_empresasDB'); //Selects Database on mySQL

if(!$chooseBD)
{
echo"<br> Error: Cannot find Database"; exit;
}

?>