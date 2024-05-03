<?php

if(!isset($_SESSION))
{
    $ok = @session_start();
	if($ok)
	{
	session_regenerate_id(true);
	}
}

session_destroy();

header('Location: telaLogin.php');

?>