<?php

    include_once("../../Model/User/User_m.php");

    class User_c extends User_m {

        private $user;

        function __construct()
        {
            $this->user = new User_m();
        }

        public function getAllUser() {

            return $this->user->getAllUser();

        }

        public function searchUserAsEmailAndName($key) {

            return $this->user->searchUserAsEmailAndName($key);

        } 

    }