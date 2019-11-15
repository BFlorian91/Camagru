<?php
    class ConnectToBdd {
        private $dsn;
        private $user;
        private $passwd;
        private $pdo;
    
        public function __construct() {
            $this->dsn = 'mysql:dbname=camagru;host=127.0.0.1';
            $this->user = 'root';
            $this->passwd = 'root';
            $this->pdo = '';
        }

        public function getPdo() {
            return $this->pdo;
        }

        public function connectToDb() {
            try {
                $this->pdo = new PDO($this->dsn, $this->user, $this->passwd);
            } catch (PDOException $e) {
                echo 'Connexion échouée : ' . $e->getMessage();
            }
        }
    }
?>