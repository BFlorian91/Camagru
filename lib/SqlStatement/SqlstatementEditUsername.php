<?php
    class SqlStatementEditUsername extends Sqlstatement{
    
        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $username = $_SESSION['user'];
            $this->_sql = "UPDATE users SET username=:username WHERE username='$username';";            
        }

        public function bindParam() {
            $this->_pdoStatement->bindParam(':username', $this->_record->getUsername());
        
        }

        public function getSql() {
            return $this->_sql;
        }
    }

?>