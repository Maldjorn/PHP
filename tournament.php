<?php
    require_once "player.php";

    class Tournament{

        private $tournamentDate;
        private $tournamentName;
        private $players = [];
        public $pairs;

        public function __construct($tournamentName, $tournamentDate = null){
            $this->tournamentName = $tournamentName;
            if($tournamentDate == null){
                $this->tournamentDate = new DateTime("today");
            }else{
                $this->tournamentDate = DateTime::createFromFormat('Y.m.d', $tournamentDate);
            }
              
        }

        public function addPlayer($player){
            $this->players[] = $player;
            return $this;
        }
        
        public function moveArray()
        {
            $playersCount = count($this->players);
            for($i = 1; $i < $playersCount-1; $i++)
            {
                $buff = $this->players[$i];
                $this->players[$i] = $this->players[$i+1];
                $this->players[$i+1] = $buff; 
            }
        }

        public function printArray(){
            $playersCount = count($this->players);
            for($i = 0; $i < $playersCount; $i++){
                echo " ".$this->players[$i]->name." ".$this->players[$i]->getCity();
            }
        }
        public function addZero(){
            $playersCount = count($this->players);
            
        }
        public function pairsSelection(){
            $playersCount = count($this->players);
            if($this->players[0]->getCity() != NULL){
                if(($playersCount % 2) == 0){
                    $this -> pairs ="<br>".$this->players[0]->getName()." (".$this->players[0]->getCity().") "." - ".$this->players[$playersCount-1]->getName()." (".$this->players[$playersCount-1]->getCity().")";
                    for($i = 1; $i < $playersCount / 2; $i++){
                        if($this->players[$i]->getName() == "0" || $this->players[$playersCount- $i]->getName() == "0" )
                        {
                            continue;
                        }
                        $this -> pairs .="<br>".$this->players[$i]->getName()." (".$this->players[$i]->getCity().") " ." - ".$this->players[$playersCount- $i ]->getName()." (".$this->players[$playersCount- $i ]->getCity().")"; 
                    }
                }
                else{
                    array_push($this->players,new Player("0"));
                    $this -> pairs ="<br>".$this->players[0]->getName()." (".$this->players[0]->getCity().") "." - ".$this->players[$playersCount-1]->getName()." (".$this->players[$playersCount-1]->getCity().")";
                    for($i = 1; $i < (($playersCount / 2) - 1) ; $i+=1){
                        $this -> pairs .="<br>".$this->players[$i]->getName()." (".$this->players[$i]->getCity().") " ." - ".$this->players[$playersCount- $i ]->getName()." (".$this->players[$playersCount- $i ]->getCity().")";; 
                    }
                }
                
            }else{
                if(($playersCount % 2) == 0){
                    if($this->players[0]->getName() != "0" || $this->players[$playersCount-1]->getName() != "0" ){
                    $this -> pairs ="<br>".$this->players[0]->getName()." - ".$this->players[$playersCount-1]->getName();
                    }
                    for($i = 1; $i < $playersCount / 2; $i++){
                        if($this->players[$i]->getName() == "0" || $this->players[$playersCount- $i-1]->getName() == "0" )
                        {
                            continue;
                        }
                        $this -> pairs .="<br>".$this->players[$i]->getName().$this->players[$i]->getCity()." - ".$this->players[$playersCount- $i - 1]->getName().$this->players[$playersCount- $i - 1]->getCity(); 
                    }
                }
                else{
                    array_push($this->players,new Player("0"));
                    for($i = 1; $i < (($playersCount / 2)  ); $i+=1){
                        if($this->players[$i]->getName() == "0" || $this->players[$playersCount- $i-1]->getName() == "0" )
                        {
                            continue;
                        }
                        $this -> pairs .="<br>".$this->players[$i]->getName()." - ".$this->players[$playersCount- $i ]->getName(); 
                    }
                }
            }
            echo $this->pairs;
        }
        
        public function createPairs(){

            $playersCount = count($this->players);
            if($playersCount % 2 != 0 && $playersCount > 4)
            {
                for($i = 0; $i < $playersCount; $i++){
                    echo "<br>";                
                    echo $this->tournamentName.", ".$this->tournamentDate->modify("+1 day")->format("d.m.Y");
                    $this->pairsSelection();
                    $this->moveArray();
                }
            }
            else{
                for($i = 0; $i < $playersCount-1; $i++){
                    echo "<br>";                
                    echo $this->tournamentName.", ".$this->tournamentDate->modify("+1 day")->format("d.m.Y");
                    $this->pairsSelection();
                    $this->moveArray();
                }
            }
        }

    }
?>
