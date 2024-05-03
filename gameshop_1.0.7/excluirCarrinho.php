<?php
    include 'Conexao.php';

      
    $idUsuario = $_GET['id'];
    $idProduto = $_GET['idJogo'];

    // echo "USUARIO: " . $idUsuario . "<br>";
    // echo "PRODUTO: " . $idProduto;
    try 
    {
        $pdo = Conexao::getInstance();
        $sql = "DELETE FROM carrinho WHERE idUsuario_FK = $idUsuario AND idJogo = $idProduto";
        $stmt = $pdo->prepare($sql);
        //$stmt->bindValue(':id', $idProduto);
        $stmt->execute();
        header('Location:carrinho.php');

        //return TRUE;
    }
    catch (PDOException $erro) 
    {
        return $erro->getMessage();
    }

?>