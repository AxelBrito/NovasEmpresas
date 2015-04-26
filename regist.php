<?php 
//catches information from form
$RegNome=$_POST["registoNome"]; 
$RegEmail=$_POST["registoEmail"];
$RegPassw=$_POST["registoPassw"];

  
  
//connects to database
include("ligaBD.php"); 
  
//tests to see if there is already someone with this email
$existe="select * from registos where email='".$RegEmail."'"; 
$faz_existe=mysqli_query($ligabd, $existe); 
$jaexiste=mysqli_num_rows($faz_existe); 

//verifies if already exists
if($jaexiste==0){ 
    $insere="insert registos values('DEFAULT','".$RegNome."','".$RegEmail."','".$RegPassw."')"; 
    $faz_insere=mysqli_query($ligabd, $insere); 
	
	echo "<SCRIPT type='text/javascript'> 
        alert('Registado com sucesso!');
		top.location.reload();
    </SCRIPT>";
} 
else
{
	echo "<SCRIPT type='text/javascript'> 
        alert('Utilizador já registado!');
		top.location.reload();
    </SCRIPT>";
	
}

	die();
?>