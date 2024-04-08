<?php

class Skater extends Player
{


    public function getPlayerStats(){
        
        $stats = "<h2>Skater Info</h2>";
        $stats .= parent::getPlayerStats();

        return $stats;
    }

}