<?php
abstract class Conexao 
{
    public static function getInstance() 
    {
        try 
        {
            $pdo = new PDO("mysql:host=localhost;dbname=gameshop","root","");
            return $pdo;
        } catch (PDOException $erro) 
        {
            echo $erro->getMessage();
        }
    }
}
?>
