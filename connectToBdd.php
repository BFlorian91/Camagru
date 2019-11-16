<?php
    class ConnectToBdd {
        private $_dsn;
        private $_user;
        private $_passwd;
        private $_pdo;
    
        public function __construct() {
            $this->_dsn = 'mysql:dbname=camagru;port=8889;host=127.0.0.1';
            $this->_user = 'root';
            $this->_passwd = 'root';
            $this->_pdo = '';
        }

        public function getPdo() {
            return $this->_pdo;
        }

        public function connectToDb() {
            try {
                $this->_pdo = new PDO($this->_dsn, $this->_user, $this->_passwd);
            } catch (PDOException $e) {
                echo 'Connexion échouée : ' . $e->getMessage();
            }
        }
    }
?>