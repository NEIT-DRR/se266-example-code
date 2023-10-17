<?php

//Ranger sub-class
class Ranger extends Character{

    public function __construct($p, $h){
        parent::__construct($p, $h);
        $this->setRange(5);
        $this->setDefence(3);
    }

    public function heal($healAmt){
        if ($this->health + $healAmt > self::MAX_HEALTH) {
            $this->setPlayerHealth(100);
        }else{
            $this->health += $healAmt;
        }
    }

    public function attack($p, $damageAmt){
        if($p->health - $damageAmt <= self::MIN_HEALTH){
            $p->setPlayerHealth(0);
        }else{
            $p->health -= $damageAmt;
        }
    }
}