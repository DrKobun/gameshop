<?php
require_once 'conexao.php';

    if(isset($_FILES['arquivo']))
    {

        $arquivo = $_FILES['arquivo'];

        if($arquivo['error'])
        {
            die("falha ao enviar arquivo!");
        }

        $pasta = "arquivos/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        // if($extensao != "jpg" && $extensao != 'png')
        // {
        //     die("Tipo de arquivo não aceito!");
        // }
        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
        
        if($deu_certo)
        {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO game(path) VALUES ('$path')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            //$mysqli->query("INSERT INTO game(path) VALUES ('$path')");
            echo "arquivo enviado com sucesso!";
        }
        else
        {
            echo "deu ruim :(";
        }

    }
    $pdo = Conexao::getInstance();
    $sql = "SELECT path FROM game";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>