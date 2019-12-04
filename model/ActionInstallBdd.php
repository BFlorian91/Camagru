<?php
        class ActionInstallBdd {

        private $_success;
        private $_installBdd;

        public function __construct() {
            $this->_success = false;
            $this->_installBdd = new InstallBdd();
        }

        public function getSuccess() {
            return $this->_success;
        }

        public function initBdd() {
            $this->_installBdd->setSqlCreateDatabase('CREATE DATABASE camagru');
            $this->_installBdd->setSqlCreateTable('CREATE TABLE camagru.users (
                id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                username varchar(255) NOT NULL,
                email varchar(255) NOT NULL,
                passwd varchar(255) NOT NULL,
                confirmkey varchar(255) NOT NULL,
                confirme varchar(10) NOT NULL DEFAULT 0,
                subemail varchar(10) NOT NULL DEFAULT 1
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;');
            $this->_installBdd->installBdd();
            $this->_success = true;
        }
    }
    
?>