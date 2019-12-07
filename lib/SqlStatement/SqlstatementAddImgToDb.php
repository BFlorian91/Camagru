<?php
    class SqlstatementAddImgToDb extends Sqlstatement{

        private $_data;
        public function __construct($linkToDb, $record, $data) {
            parent::__construct($linkToDb, $record);
            $this->_data = $data;
            $this->_sql = "INSERT INTO images(username, images, likes) VALUES (:username, :images, :likes);";
        }

        public function getSql() {
            return $this->_sql;
        }

        public function bindParam() {
            $this->_pdoStatement->bindParam(':username', $this->_data[1]);
            $this->_pdoStatement->bindParam(':images', $this->_data[0]);
            $this->_pdoStatement->bindParam(':likes', $this->_data[2]);
        }
    }
?>