<?php
    class ActionEditEmail {
        private $_linktodb;
        private $_record;
        private $_sqlstatementEditEmail;
        private $_sqlstatementCheckBeforeEditEmail;
        private $_success;
        private $_rowCount;

        public function __construct($email) {
            $this->_linktodb = new ConnectToBdd();
            $this->_linktodb->connectToDb();
            $this->_record = new DataUserRecord(null, null, $email);
            $this->_sqlstatementEditEmail = new SqlstatementEditEmail($this->_linktodb, $this->_record);
            $this->_sqlstatementCheckBeforeEditEmail = new SqlstatementCheckBeforeEditEmail($this->_linktodb, $this->_record);
            $this->_rowCount = null;
            $this->_success = null;
        }

        public function getSuccess() {
            return $this->_success;
        }

        public function editEmail() {
            $this->_sqlstatementCheckBeforeEditEmail->prepare();
            $this->_sqlstatementCheckBeforeEditEmail->bindParam();
            $this->_sqlstatementCheckBeforeEditEmail->execute();
            $this->_rowCount = $this->_sqlstatementCheckBeforeEditEmail->getRowCount();
            if ($this->_rowCount == 0) {
                $this->_sqlstatementEditEmail->prepare();
                $this->_sqlstatementEditEmail->bindParam();
                $this->_sqlstatementEditEmail->execute();
                $this->_success = $this->_sqlstatementEditEmail->getExecuteSuccess();
            } else {
                $this->_success = false;
            }
        }
    }
?>