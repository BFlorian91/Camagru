<?php
    class SqlStatementCheckBeforeSignUp extends Sqlstatement{

        public function __construct($linkToDb, $record){
            parent::__construct($linkToDb, $record);
            $username = $this->_record->getUsername();
            $email = $this->_record->getEmail();
            $this->_sql = "SELECT * FROM users WHERE (email='$email' AND username='$username');";
        }

        public function getSql() {
            return $this->_sql;
        }

    }
?>