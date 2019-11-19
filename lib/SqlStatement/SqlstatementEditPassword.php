<?php
    class SqlStatementEditPassword extends Sqlstatement{
        
        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $username = $_SESSION['user'];
            $this->_sql = "UPDATE users SET passwd=:passwd WHERE username='$username';";            
        }

        public function bindParam() {
            $this->_pdoStatement->bindParam(':passwd', $this->_record->getHashPassword());
        }

        public function getSql() {
            return $this->_sql;
        }
    }
?>