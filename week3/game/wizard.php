<?php 

//Wizard sub-class
class Wizard extends Character{

    public function __construct($p, $h){
        parent::__construct($p, $h);
        $this->setMagic(5);
        $this->setDefence(2);
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