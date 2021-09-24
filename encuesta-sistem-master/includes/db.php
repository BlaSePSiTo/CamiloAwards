<?php


class DB {
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
        private $port;

    public function __construct(){
        $this->host = 'sql5.freemysqlhosting.net';
        $this->db = 'sql5438734';
        $this->user = 'sql5438734';
        $this->password = "S45e6r8gVK";
        $this->charset = 'utf8mb4';
                $this->port = '3306';
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

?>