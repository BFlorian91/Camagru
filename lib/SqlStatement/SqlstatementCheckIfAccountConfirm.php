<?php
    class SqlstatementCheckIfAccountConfirm extends Sqlstatement{

        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $username = $this->_record->getUsername();
            $this->_sql = "SELECT * FROM users WHERE username='$username';";
        }

        public function getSql() {
            return $this->_sql;
        }
    }
?>