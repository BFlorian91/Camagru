<?php
    class SqlstatementSignIn extends Sqlstatement{
        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $username = $this->_record->getUsername();
            $this->_sql = "SELECT * FROM users WHERE (username='$username' OR email='$username');";
            $this->_successMsg = "you are succefully logged ! ";
        }
        public function getSql() {
            return $this->_sql;
        }
    }
?>