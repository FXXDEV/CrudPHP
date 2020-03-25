<?php



require __DIR__ . "/../vendor/autoload.php";

use PHPUnit\Framework\TestCase;


class CustomerTest extends TestCase{
    
    
    static private $pdo = null; 
    private $conn = null;

    final public function testCustomer(){

        $driver = DATA_LAYER_CONFIG["driver"].":dbname=".DATA_LAYER_CONFIG["dbname"].';host:'.DATA_LAYER_CONFIG["host"].":".DATA_LAYER_CONFIG["port"];
        $database = DATA_LAYER_CONFIG["dbname"];
        $user = DATA_LAYER_CONFIG["username"];
        $password = DATA_LAYER_CONFIG["passwd"];
        $pdo = new PDO($driver, $user, $password);
        
        $this->conn = $this->createDefaultDBConnection($pdo, $database);
        return $this->conn;

    }


}
