<?php
include('Conexao.php');

if(isset($_POST['email']) && isset($_POST['senha'])) 
{
    if (strlen($_POST['email']) == 0) 
    {
        echo "Preencha seu email";
    } elseif (strlen($_POST['senha']) == 0) 
    {
        echo "Preencha sua senha";
    } 
    else 
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try 
        {
            $pdo = Conexao::getInstance();

            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
            $stmt->execute();
            
            if ($stmt->rowCount() == 1) 
            {
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                
                session_start();
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];
                
                
                header("Location: index.php");
                exit(); 
            } 
            else 
            {
                echo "Usuário ou senha incorretos";
            }
        } catch(PDOException $e) 
        {
            echo "Falha na execução do código SQL: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body
        {
            font-family: Arial, Helvetica, sans-serif;
            background: -webkit-gradient(linear, left top, right top, from(cyan), to(lightgreen)) ;
        }
        .form-login
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
        input
        {
            padding: 10px;
            border: none;
            outline: none;
            font-size: 15px;
            width: 92%;
            border-radius: 10px;
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
        <div class="form-login">
            <h1>Login</h1>
            <form action="" method="POST" style="">
                <label for="">Email</label>
                <br>
                <input type="text" name="email" placeholder="Nome">
                <br><br>
                <label for="">Senha</label>
                <br>
                <input type="password" name="senha" placeholder="Senha">
                <br><br>
                <button type="submit">Entrar</button>
                <p>Não possui uma conta? <a href="telaRegistro.php">Registre-se</a></p>
            </form>
        </div>
</body>
</html>