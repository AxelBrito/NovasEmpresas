<?php
Session_start();
unset($_SESSION["name"]); // ou Session_destroy();
Session_destroy();
//header('Location: index.php');

echo "<SCRIPT type='text/javascript'>  
localStorage.setItem('loginstatus', 0);
		top.location.reload();
		location.reload();
    </SCRIPT>";

?>