<?php
     
    include 'ClassGameDAO.php';

    $idProduto = $_POST["idProduto"];
    $idUsuario = $_POST["idUsuario"];
    
    

    $ClassGameDAO = new ClassGameDAO();
    $adicionar = $ClassGameDAO->adicionarCarrinho($idProduto, $idUsuario);


       
        
    header('Location: carrinho.php');
    exit;
 
?>