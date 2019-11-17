<?php
    class SqlstatementCheckAlreadyConfirm extends Sqlstatement{

        public function __construct($key, $linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $username = $this->_record->getUsername();
            $this->_sql = "SELECT * FROM users WHERE username='$username' AND confirmkey='$key'";
            $this->_successMsg = "request succefully sent";            
        }

        public function getSql() {
            return $this->_sql;
        }

    }

?>