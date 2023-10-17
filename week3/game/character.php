<?php

abstract class Character{

    protected $playerName, $health, $attack, $defence, $magic, $range;
    protected static $playerCount;
    const MAX_HEALTH = 100;
    const MIN_HEALTH = 0;
  
    public function __construct($p, $h){

        $this->playerName = $p;
        $this->health = $h;
        $this->attack = 1;
        $this->defence = 1;
        $this->range = 1;
        $this->magic = 1;

        self::$playerCount++;
    }

    //Set & Get Player Name
    public function setPlayerName($p){
        $this->playerName = $p;
    }

    public function getPlayerName(){
        return $this->playerName;
    }

    //Set & Get Player Health
    public function setPlayerHealth($h){
        $this->health = $h;
    }

    public function getPlayerHealth(){
        return $this->health;
    }

    //Set & Get Player Attack
    public function setAttack($a){
        $this->attack = $a;
    }

    public function getAttack(){
        return $this->attack;
    }

    //Set & Get Player Defence
    public function setDefence($d){
        $this->defence = $d;
    }

    public function getDefence(){
        return $this->defence;
    }

    //Set & Get Player Magic
    public function setMagic($m){
        $this->magic = $m;
    }

    public function getMagic(){
        return $this->magic;
    }

    //Set & Get Player Range
    public function setRange($r){
        $this->range = $r;
    }

    public function getRange(){
        return $this->range;
    }

    //Get Player Stats
    public function getStats(){
        echo "👴: " . $this->getPlayerName() . " <br> ";
            if($this->getPlayerHealth() <= 0){
                echo "💀: DEAD" . "<br>" ;
            }else{
                echo "❤️: " . $this->getPlayerHealth() . "<br>";
            }
             echo
             "⚔️: " . $this->getAttack() . "<br>" .
             "🛡️: " . $this->getDefence() . "<br>" .
             "🏹: " . $this->getRange() . "<br>" .
             "🪄: " . $this->getMagic() . "<br>" 
        ;

        
    }

    //Get player count
    public static function getPlayerCount(){
        return self::$playerCount;
    }

    //Define standard methods for all sub classes
    abstract public function attack($p,$d);
    abstract public function heal($h);
}