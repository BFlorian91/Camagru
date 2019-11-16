<?php
    class SendMail{
        private $_message;
        private $_header;
        private $_email;

        public function __construct($msg, $email) {
            $this->_message = setMessage($msg);
            $this->_email = $email;
        }

        public function getMessage() {
            return $this->_message;
        }

        public function setMessage($msg) {
            $this->_message = $msg;
        }

        public function setHeader() {
            $eol = "\r\n";
            $separator = md5(time());
            $this->_header = "From: name <noreply@42.com>" . $eol;
            $this->_header .= "MIME-Version: 1.0" . $eol;
            $this->_header .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
            $this->_header .= "Content-Transfer-Encoding: 7bit" . $eol;
        }

        public function sendmail() {
            mail($this->_email, "Confirmation de votre compte", $this->_message, $this->_header);
        }
    }
?>