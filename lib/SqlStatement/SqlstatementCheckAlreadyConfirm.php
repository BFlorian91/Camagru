<?php
    class SqlstatementCheckAlreadyConfirm extends Sqlstatement{

        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $username = $this->_record->getUsername();
            $key = $this->_record->getConfirmkey();
            $this->_sql = "SELECT * FROM users WHERE username='$username' AND confirmkey='$key'";
            $this->_successMsg = "request succefully sent";            
        }

        public function getSql() {
            return $this->_sql;
        }

    }

?>