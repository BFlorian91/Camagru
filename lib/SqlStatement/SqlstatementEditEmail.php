<?php
    class SqlstatementEditEmail extends Sqlstatement{

        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $email = $this->_record->getEmail();
            $username = $_SESSION['name']; 
            $this->_sql = "UPDATE users SET email='$email' WHERE username='$username';";            
        }

        public function getSql() {
            return $this->_sql;
        }
    }
?>