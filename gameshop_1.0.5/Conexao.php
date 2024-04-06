<?php
 
abstract class Conexao 
{
    public static function getInstance() 
    {
        try
        {                  
            $pdo = new PDO("mysql:host=localhost;dbname=gameshop","root","");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(PDOException $e)
        {
            die("ERROR: Não foi possível conectar." . $e->getMessage());
        }
    }
}
?>
