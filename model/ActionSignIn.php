<?php
    class ActionSignIn{
        private $_recordDataUser;
        private $_connectToBdd;
        private $_sqlSignInStatement;
        private $_success;
        private $_rowCount;
        private $_successmsg;
        private $_errormsg;
        private $_data;

        public function __construct($username, $password) {
            $this->_recordDataUser = new DataUserRecord($username, $password);
            $this->_connectToBdd = new ConnectToBdd();
            $this->_connectToBdd->connectToDb();
            $this->_sqlSignInStatement = new SqlstatementSignIn($this->_connectToBdd, $this->_recordDataUser);
            $this->_success = false;
            $this->_rowCount = null;
            $this->_successmsg = '';
            $this->_errormsg = '';
            $this->_data = [];

        }

        public function setSuccesmsg($msg) {
            $this->_successmsg = "<div style=".'margin-top:100px;'."><div class=".'alert alert-success alert-dismissible fade show'." role=".'alert'.">your are logged " . $msg . "</div>"
            ."<button type=".'button'." class=".'close'." data-dismiss=".'alert'." aria-label=".'Close'.">
            <span aria-hidden=".'true'.">&times;</span>
          </button></div>";
        }

        public function getSuccessmsg() {
            return $this->_successmsg;
        }

        public function setErrorMsg($msg) {
            $this->_errormsg = $msg;
        }

        public function getErrorMsg() {
            return $this->_errormsg;
        }

        public function getSuccess() {
            return $this->_success;
        }

        public function signIn() {
            $this->_sqlSignInStatement->prepare();
            $this->_sqlSignInStatement->execute();
            $this->_success = $this->_sqlSignInStatement->getExecuteSuccess();
            $this->_rowCount = $this->_sqlSignInStatement->getRowCount();
            if ($this->_rowCount > 0 && $this->_success == true) {
                $this->_sqlSignInStatement->fetch();
                $this->_data = $this->_sqlSignInStatement->getDataArray();
                $checkPwd =  password_verify($this->_recordDataUser->getPassword(), $this->_data["passwd"]);
                if ($checkPwd) {
                    session_start();
                    $_SESSION['user'] = $this->_recordDataUser->getUsername();
                    $this->setSuccesmsg("your are logged " . $_SESSION['user']);
                } else {
                    $this->setErrorMsg("invalid username or password");
                }

            } else {
                $this->setErrorMsg("there is a probleme when log");
            }
        }
    }
?>