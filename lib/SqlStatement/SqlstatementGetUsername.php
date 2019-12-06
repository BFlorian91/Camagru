<?php
    class SqlstatementGetUsername extends Sqlstatement{
        
        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $email = $this->_record->getEmail();
            $this->_sql = "SELECT * FROM users WHERE email='$email'";
        }

        public function getSql() {
            return $this->_sql;
        }
    }
?>