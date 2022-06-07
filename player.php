<?php
    class Player{

        private $name;
        private $playerCity;

        public function __construct($name){
            $this->name = $name;
        }

        public function getCity(){
            return $this->playerCity;
        }

        public function getName(){
            return $this->name;
        }

        public function setCity($city){
            $this->playerCity = $city;
            return $this;
        }
    }
    ?>