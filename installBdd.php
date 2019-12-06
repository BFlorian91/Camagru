<?php
    
    class InstallBdd {
        
        private $_linkToDb;
        private $_sqlCreateTableUsers;
        private $_sqlCreateTableImage;
        private $_sqlCreateTableComment;
        private $_sqlCreateDatabase;
        private $_dsn;
        private $_sql;
        private $_user;
        private $_passwd;
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

        public function setSqlCreateTableUsers($sqlCreateTable) { 
            $this->_sqlCreateTableUsers = $sqlCreateTable;
        }

        public function getSqlCreateTableUsers() {
            return $this->_sqlCreateTableUsers;
        }

        public function setSqlCreateTableImage($sqlCreateTableImage) {
            $this->_sqlCreateTableImage = $sqlCreateTableImage;
        }

        public function getSqlCreateTableImage() {
            return $this->_sqlCreateTableImage;
        }

        public function setSqlCreateTableComment($sqlCreateTableComment) {
            $this->_sqlCreateTableComment = $sqlCreateTableComment;
        }

        public function getSqlCreateTableComment() {
            return $this->_sqlCreateTableComment;
        }

        //utilisation de pdo exec pour faire en sorte de cree une table
        public function installBdd() {
            $this->_recordData = new DataUserRecord('admin', 'ragnarosClassic213', 'root@localhost.fr');
            if ($this->_sqlCreateDatabase != null) {
                $this->_pdo->exec($this->_sqlCreateDatabase);
            }
            $this->_pdo->exec($this->_sqlCreateTable);
            $this->_pdo->exec($this->_sqlCreateTableImage);
            $this->_pdo->exec($this->_sqlCreateTableComment);
            $id = '0';
            $username = $this->_recordData->getUsername();
            $pass = $this->_recordData->getHashPassword();
            $email = $this->_recordData->getEmail();
            $confirmKey = $this->_recordData->getConfirmkey();
            $this->_linkToDb = new ConnectToBdd();
            $this->_linkToDb->connectToDb();
            $pdo = $this->_linkToDb->getPdo();
            if ($this->checkBeforeAddAdmin($pdo, $username) == true) {
                $req = $pdo->prepare("INSERT INTO users (id, username, email, passwd, confirmkey) VALUES ('".$id."', '".$username."', '".$email."', '".$pass."', '".$confirmKey."' )");
                $req->execute();
            }
        }

        public function checkBeforeAddAdmin($pdo, $username) {
            $this->_sql = "SELECT * FROM users WHERE username='$username'";
            $req = $pdo->prepare($this->_sql);
            $issuccess = $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            $count = $req->rowCount();
            if ($count == 0) {
                return true;
            } else {
                return false;
            }
        }

        public function setData() {
            $this->_dsn = 'mysql:port=8889;host=127.0.0.1';
            $this->_user = 'root';
            $this->_passwd = 'root';
            $this->_sql = '';
            $this->_pdo = new PDO($this->_dsn, $this->_user, $this->_passwd);
            $this->_sqlCreateDatabase = null;
            $this->_sqlCreateTable = null;
            $this->_sqlCreateTableImage = null;
            $this->_sqlCreateTableComment = null;
            $this->_sql = null;
        }
    }
?>