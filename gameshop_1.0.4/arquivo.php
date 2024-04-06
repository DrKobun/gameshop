<?php

require_once 'conexao.php';

if(isset($_FILES['arquivo']))
    {

        $arquivo = $_FILES['arquivo'];

        $pasta = "arquivos/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
            
        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
        
        if($deu_certo)
        {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO game(path) VALUES ('$path')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

        }

    }

    $pdo = Conexao::getInstance();
    $sql = "SELECT path FROM game";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

  
?>