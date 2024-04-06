<?php 

    if(!isset($_SESSION))
	{	
		$ok = @session_start();
		if($ok)
		{
		session_regenerate_id(true);
		}
	}
    if(!isset($_SESSION['id']))
    {
        die("Inicie uma sessão para acessar essa página!<p><a href=\"telaLogin.php\">Iniciar Sessão<a></p>");
    }
?>