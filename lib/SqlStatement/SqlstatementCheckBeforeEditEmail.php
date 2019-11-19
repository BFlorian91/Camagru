<?php 
    class SqlstatementCheckBeforeEditEmail extends Sqlstatement{
        
        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $this->_sql = "SELECT * FROM users WHERE email=:email";
        }

        public function bindParam() {
            $this->_pdoStatement->bindParam(':email', $this->_record->getEmail());
        }

        public function getSql() {
            return $this->_sql;
        }

    }
?>