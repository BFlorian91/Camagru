<?php
    class SqlstatementIsUserUnSubEmail extends Sqlstatement{
        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $this->_sql = "SELECT subemail FROM users WHERE username=:username;";
        }

        public function bindParam() {
            $this->_pdoStatement->bindParam(":username", $this->_record->getUsername());
        }

        public function getSql() {
            return $this->_sql;
        }
    }
?>