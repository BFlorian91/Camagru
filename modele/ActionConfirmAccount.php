<?php
    class ActionConfirmAccount {
        private $_record;
        private $_linktobdd;
        private $_issuccess;
        private $_sqlCheckAlreadyConfirm;
        private $_sqlConfirmAccount;
        private $_rowCount;

        public function __construct($key, $username) {
            $this->_record = new DataUserRecord($username);
            $this->_linktobdd = new ConnectToBdd();
            $this->_linktobdd->connectToDb();
            $this->_sqlCheckAlreadyConfirm = new SqlstatementCheckAlreadyConfirm($this->_linktobdd, $this->_record);
            $this->_sqlConfirmAccount = new SqlstatementConfirmAccount($this->_linktobdd, $this->_record);
        }

        public function checkIfAlreadyConfirm() {
            $this->_sqlCheckAlreadyConfirm->prepare();
            $this->_sqlCheckAlreadyConfirm->execute();
            $this->_issuccess = $this->_sqlCheckAlreadyConfirm->getExecuteSuccess();
            $this->_rowCount = $this->_sqlCheckAlreadyConfirm->getRowCount();
            return $this->_rowCount;
        }

        public function confirmAccount() {
            $this->_sqlConfirmAccount->prepare();
            $this->_sqlConfirmAccount->execute();
            $this->_issuccess = $this->_sqlConfirmAccount->getExecuteSuccess();
            if ($this->_issuccess == true) {
                die('good your account has been confirmed');
            }
          }
    }
?>