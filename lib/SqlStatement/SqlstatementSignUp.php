<?php
    class SqlstatementSignUp extends Sqlstatement{
        
        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $this->_sql = "INSERT INTO users(username, email, passwd) VALUES (:username, :email, :passwd);";
            $this->_successMsg = "you are succefully registered ! ";
        }
        
        public function bindParam() {
            $this->_pdoStatement->bindParam(':username', $this->_record->getUsername());
            $this->_pdoStatement->bindParam(':email', $this->_record->getEmail());
            $this->_pdoStatement->bindParam(':passwd', $this->_record->getHashPassword());
        }

        public function getSql() {
            return $this->_sql;
        }
    }
?>