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
        //cree une table qui stock la src des    
        public function initBdd() {
            $this->_installBdd->setSqlCreateDatabase('CREATE DATABASE camagru');
            $this->_installBdd->setSqlCreateTableUsers('CREATE TABLE camagru.users (
                id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                username varchar(255) NOT NULL,
                email varchar(255) NOT NULL,
                passwd varchar(255) NOT NULL,
                confirmkey varchar(255) NOT NULL,
                confirme varchar(10) NOT NULL DEFAULT 0,
                subemail varchar(10) NOT NULL DEFAULT 1
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;');
            $this->_installBdd->setSqlCreateTableImage('CREATE TABLE camagru.images (
                id INT NOT NULL AUTO_INCREMENT ,
                username VARCHAR(100) NOT NULL ,
                images VARCHAR(255) NOT NULL,
                likes INT NOT NULL ,
                PRIMARY KEY (id)) ENGINE = InnoDB;');
            $this->_installBdd->setSqlCreateTableComment('CREATE TABLE camagru.comment (
                id INT NOT NULL AUTO_INCREMENT ,
                images VARCHAR(255) NOT NULL,
                username VARCHAR(100) NOT NULL ,
                comment VARCHAR(300) NOT NULL ,
                comment_date DATETIME NOT NULL ,
                PRIMARY KEY (id)) ENGINE = InnoDB;');
            $this->_installBdd->installBdd();
            $this->_success = true;
        }
    }
    
?>
