<?php
    class SqlstatementSignUp extends Sqlstatement{
        
        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $this->_sql = "INSERT INTO users(username, email, passwd, confirmkey) VALUES (:username, :email, :passwd, :confirmkey);";
            $this->_successMsg = "you are succefully registered ! ";
        }
        
        public function bindParam() {
            $this->_pdoStatement->bindParam(':username', $this->_record->getUsername());
            $this->_pdoStatement->bindParam(':email', $this->_record->getEmail());
            $this->_pdoStatement->bindParam(':passwd', $this->_record->getHashPassword());
            $this->_pdoStatement->bindParam(':confirmkey', $this->_record->getConfirmkey());
        }

        public function getSql() {
            return $this->_sql;
        }
    }
?>