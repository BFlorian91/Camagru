<?php
    class SqlStatementEditUsername extends Sqlstatement{
    
        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $this->_sql = "UPDATE users SET username=:username WHERE email=:email;";            
        }

        public function bindParam() {
            $this->_pdoStatement->bindParam(':username', $this->_record->getUsername());
            $this->_pdoStatement->bindParam(':email', $this->_record->getEmail());
        
        }

        public function getSql() {
            return $this->_sql;
        }
    }

?>