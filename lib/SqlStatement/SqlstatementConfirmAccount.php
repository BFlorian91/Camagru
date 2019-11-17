<?php
    class SqlstatementConfirmAccount extends Sqlstatement{

        public function __construct($key, $linkToDb, $record){
            parent::__construct($linkToDb, $record);
            $username = $this->_record->getUsername();
            $this->_sql = "UPDATE users SET confirme='1' WHERE username='$username' AND confirmkey='$key';";
        }

        public function getSql() {
            return $this->_sql;
        }
    }

?>