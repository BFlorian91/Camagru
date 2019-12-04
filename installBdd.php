<?php
    
    class InstallBdd {
        
        private $_linkToDb;
        private $_sqlCreateTable;
        private $_sqlCreateDatabase;
        private $_dsn;
        private $_user;
        private $_passwd;
        private $_sqlSignUp;
        private $_recordData;
    
        public function __construct() {
            $this->setData();
        }

        public function setSqlCreateDatabase($sqlCreateDatabase) {
            $this->_sqlCreateDatabase = $sqlCreateDatabase;
        }

        public function getSqlCreateDatabase() {
            return $this->_sqlCreateDatabase;
        }

        public function setSqlCreateTable($sqlCreateTable) { 
            $this->_sqlCreateTable = $sqlCreateTable;
        }

        public function getSqlCreateTable() {
            return $this->_sqlCreateTable;
        }


        //utilisation de pdo exec pour faire en sorte de cree une table
        public function installBdd() {
            $this->_recordData = new DataUserRecord('admin', 'ragnarosClassic213', 'root@localhost.fr');
            if ($this->_sqlCreateDatabase != null) {
                $this->_pdo->exec($this->_sqlCreateDatabase);
            }
            $this->_pdo->exec($this->_sqlCreateTable);
            $id = '0';
            $username = $this->_recordData->getUsername();
            $pass = $this->_recordData->getHashPassword();
            $email = $this->_recordData->getEmail();
            $confirmKey = $this->_recordData->getConfirmkey();
            $this->_linkToDb = new ConnectToBdd();
            $this->_linkToDb->connectToDb();
            $pdo = $this->_linkToDb->getPdo();
            $req = $pdo->prepare("INSERT INTO users (id, username, email, passwd, confirmkey) VALUES ('".$id."', '".$username."', '".$email."', '".$pass."', '".$confirmKey."' )");
            $req->execute();
        }        

        public function setData() {
            $this->_dsn = 'mysql:port=8889;host=127.0.0.1';
            $this->_user = 'root';
            $this->_passwd = 'root';
            $this->_pdo = new PDO($this->_dsn, $this->_user, $this->_passwd);
            $this->_sqlCreateDatabase = null;
            $this->_sqlCreateTable = null;
            $this->_sql = null;
        }
    }
?>