<?php





/* Credenciais do banco de dados. Supondo que você esteja executando o MySQL
servidor com configuração padrão (usuário 'root' sem senha) */
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'gameshop');
 
/* Tentativa de conexão com o banco de dados MySQL */
// try{
//     $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
//     // Defina o modo de erro PDO para exceção
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e){
//     die("ERROR: Não foi possível conectar." . $e->getMessage());
// }





























// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'gameshop');
 
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




// $usuario = 'root';
// $senha = '';
// $database = 'gameshop';
// $host = 'localhost';

// $mysqli = new mysqli($host, $usuario, $senha, $database);

// if($mysqli->error)
// {
//     die("Fala ao conectar com o banco de dados: ") . $mysqli->error;
// }






// abstract class Conexao 
// {
//     public static function getInstance() 
//     {
//         try 
//         {
//             $pdo = new PDO("mysql:host=localhost;dbname=gameshop","root","");
//             return $pdo;
//         } catch (PDOException $erro) 
//         {
//             echo $erro->getMessage();
//         }
        
//     }
// }
?>
