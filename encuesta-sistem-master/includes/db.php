<?php

require_once(__DIR__ . '../../vendor/autoload.php');


$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

class DB {
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
        private $port;

    public function __construct(){
        $this->host = getenv("host");
        $this->db = getenv("db");
        $this->user = getenv("user");
        $this->password = getenv("password");
        $this->charset = 'utf8mb4';
                $this->port = getenv("port");
    }

    public function connect(){
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset . ";port=" . $this->port;

            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false];

        $pdo = new PDO($connection, $this->user, $this->password, $options);

        return $pdo;
        }catch(PDOException $e){
            print_r("Error connection: " . $e->getMessage());
        }
    }
}

echo $host;

?>