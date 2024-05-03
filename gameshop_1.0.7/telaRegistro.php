<?php
 include('Conexao.php');

 if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']))
 {
    if(strlen($_POST['nome']) == 0)
    {
        echo "insira seu nome de usuário!";
    } 
    else if(strlen($_POST['email']) == 0)
    {
        echo "insira seu email!";
    }
    else if(strlen($_POST['senha']) == 0)
    {
        echo "insira sua senha!";
    }
    else
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipoDaConta = $tipoConta = $_POST['tipoConta'];

        try 
        {
            
            $pdo = Conexao::getInstance();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO usuarios (nome, email, senha, tipoConta) VALUES (:nome, :email, :senha, :tipoConta)";
            $stmt = $pdo->prepare($sql);
        
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':tipoConta', $tipoDaConta);
            $stmt->execute();
        
            //echo $tipoDaConta;
            //echo "Dados inseridos com sucesso.";
            header('Location: telaLogin.php');
        } 
        catch(PDOException $e) 
        {
            echo "Erro: " . $e->getMessage();
        }
    }
 }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registre-se</title>
    <style>
        body
        {
            font-family: Arial, Helvetica, sans-serif;
            background: -webkit-gradient(linear, left top, right top, from(cyan), to(yellow)) ;
        }
        .form-cadastro
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
        .campo-escrito
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
        .vendedor
        {
            float: right;   
            margin-right: 10px;
        }
    </style>
    
</head>
<body>

    <div class="form-cadastro">

        <h2>Cadastro</h2>

        <form action="" method="post">

                <label>Nome</label>
                <input type="text" name="nome" value="" class="campo-escrito">
                <p></p>
                <label>Email</label>
                <input type="text" name="email" value="" class="campo-escrito">
                <p></p>
                <label>Senha</label>
                <input type="password" name="senha" value="" class="campo-escrito">         
                
                <label>
                    <h5>Você é um?</h5>
                    <input type="radio" name="tipoConta" value="0" > Comprador
                </label>

                <label class="vendedor">
                    <input type="radio" name="tipoConta" value="1" > Vendedor
                </label>
                
                <button type="submit">Criar Conta</button>
            
            <p style="margin-left: 40px">Já possiu uma conta? <a href="telaLogin.php">Entre aqui</a>.</p>
            
        </form>
    </div>    
</body>
</html>