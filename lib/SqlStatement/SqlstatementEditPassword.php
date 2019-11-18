<?php
    class SqlStatementEditPassword extends Sqlstatement{
        
        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $password = $this->_record->getHashPassword();
            $username = $_SESSION['name'];
            $this->_sql = "UPDATE users SET passwd='$password' WHERE username='$username';";            
        }

        public function getSql() {
            return $this->_sql;
        }
    }
?>