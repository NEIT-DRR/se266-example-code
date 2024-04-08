<?php

class Goalie extends Player
{

 

    public function getPlayerStats(){
        
        $stats = "<h2>Goalie Info</h2>";
        $stats .= parent::getPlayerStats();

        return $stats;
        
    }

}