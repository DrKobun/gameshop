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

        try {
            
            $pdo = Conexao::getInstance();
        
            // Definir o modo de erro do PDO como exceção
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // Preparar a declaração SQL para inserção
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
            $stmt = $pdo->prepare($sql);
        
            // Vincular parâmetros
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
        
            // Executar a consulta preparada
            $stmt->execute();
        
            echo "Dados inseridos com sucesso.";
            header('Location: telaLogin.php');
        } catch(PDOException $e) {
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

    <div class="form-cadastro">

        <h2>Cadastro</h2>

        <!-- action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" -->

        <form action="" method="post">

                <label>Nome</label>
                <input type="text" name="nome" value="">
                <p></p>
                <label>Email</label>
                <input type="text" name="email" value="">
                <p></p>
                <label>Senha</label>
                <input type="password" name="senha" value="">         
                <p></p>
                <button type="submit">Criar Conta</button>
                <!-- <input type="submit" value="Criar Conta"> -->
            
            <p style="margin-left: 10px">Já possiu uma conta? <a href="telaLogin.php">Entre aqui</a>.</p>
        </form>

    </div>    
</body>
</html>