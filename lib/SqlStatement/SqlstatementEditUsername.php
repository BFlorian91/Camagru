<?php
    class SqlStatementEditUsername extends Sqlstatement{
    
        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $username = $this->_record->getUsername();
            $email = $this->_record->getEmail();
            $this->_sql = "UPDATE users SET username='$username' WHERE email='$email';";            
        }

        public function getSql() {
            return $this->_sql;
        }
    }

?>