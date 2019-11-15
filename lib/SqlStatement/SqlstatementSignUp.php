<?php
    class SqlstatementSignUp extends Sqlstatement{
        
        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $this->_sql = "INSERT INTO users(username, email, password) VALUES (:username, email, :password);";
            $this->_successMsg = "you are succefully registered ! ";
        }
        
        public function bindParam() {
            $this->_pdoStatement->bindParam(':username', $this->record->getUsername());
            $this->_pdoStatement->bindParam(':email', $this->record->getEmail());
            $this->_pdoStatement->bindParam(':password', $this->record->getPassword());
        }

        public function getSql() {
            return $this->sql;
        }
    }
?>