<?php
    class SqlstatementUnSubEmail extends Sqlstatement {

        public function __construct($linkToDb, $record) {
            parent::__construct($linkToDb, $record);
            $username = $_SESSION['user'];
            $this->_sql = "UPDATE users SET subemail='0' WHERE username='$username';";
        }

        public function getSql() {
            return $this->_sql;
        }
    }
?>