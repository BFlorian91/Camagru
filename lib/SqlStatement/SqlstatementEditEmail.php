<?php
    class SqlstatementEditEmail extends Sqlstatement{

        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $username = $_SESSION['user']; 
            $this->_sql = "UPDATE users SET email=:email WHERE username='$username';";            
        }

        public function bindParam() {
            $this->_pdoStatement->bindParam(':email', $this->_record->getEmail()); 
        }

        public function getSql() {
            return $this->_sql;
        }
    }
?>