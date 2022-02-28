<?php
$server = "192.168.1.2";
$username = "conexion";
$password = "umlMySQL:#$2010";
$database = "uml";

/* $mysqli = new mysqli("192.168.1.2", $username, $password, $database);

if (!$mysqli) {
    echo "Error: No se pudo conectar a MySQL.";// . PHP_EOL;
    echo "errno de depuración: ";// . mysqli_connect_errno(); . PHP_EOL;
    echo "error de depuración: "; //. mysqli_connect_error();// . PHP_EOL;
    exit;
}

echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos UML es genial."; //. PHP_EOL;
echo "Información del host: " . mysqli_get_host_info($mysqli) . PHP_EOL; */

//mysqli_close($mysqli);



//PROBANDO CON CONEXION PDO

try{
    $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
    return $conn;
    } catch(PDOException $e){
        die("Conexion Fallida:".$e->getMessage());
    }
    
    
    if($conn){
        echo 'Conexion Exitosa';
    }else{
        echo 'No se pudo conectar';
    }
    

    $codigo = $_POST['codCarnet'];

?>
