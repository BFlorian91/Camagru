<?php
    class SqlStatementResetPassword extends Sqlstatement{

        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $this->_sql = "UPDATE users SET passwd=:passwd WHERE username=:username;";
        }

        public function bindParam() {
            $this->_pdoStatement->bindParam(':passwd', $this->_record->getHashPassword());
            $this->_pdoStatement->bindParam(':username', $this->_record->getUsername());
        }

        public function getSql() {
            return $this->_sql;
        }
    }
?>