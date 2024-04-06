


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sem Sessão</title>
	<style>
        body
        {
            font-family: Arial, Helvetica, sans-serif;
            background: -webkit-gradient(linear, left top, right top, from(cyan), to(lightgreen)) ;
        }
        .aviso
        {
            background-color: rgba(0, 0, 0, 0.9);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            border-radius: 15px;
            color: white;
        }
		button
        {
            background-color: blue;
            border: none;
            border-radius: 15px;
            padding: 15px;
            width: 100% 
        }
        button:hover
        {
            background-color: red;
        }
    </style>
</head>
<body>

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
		echo "<div class=\"aviso\">";
        die("<h1>Inicie uma sessão para acessar essa página!</h1><p><button><a href=telaLogin.php>Iniciar Sessão<a></button></p>");
		echo "</div>";
    }
?>

</body>
</html>
