<?php

include __DIR__ . '/goalie.php';
include __DIR__ . '/skater.php';

abstract class Player
{

    protected $playerName, $playerTeam, $playerNumber, $position;

    public function __construct($name, $team, $number, $pos){

        $this->playerName = $name;
        $this->playerTeam = $team;
        $this->playerNumber = $number;
        $this->playerPosition = $pos;
    
    }

    //Set team for player.
    public function setTeam($team){
        $this->playerTeam = $team;
    }

    //Get team for player.
    public function getTeam(){
        return $this->playerTeam;
    }

    //Get Player Name.
    public function getPlayerName(){
        return $this->playerName;
    }

    //Get Player Name.
    public function getPlayerNumber(){
        return $this->playerNumber;
    }

    //Get Player Name.
    public function getPlayerTeam(){
        return $this->playerTeam;
    }

    //Get Player Position.
    public function getPlayerPosition(){
        return $this->playerPosition;
    }

    //Get player stats.
    protected function getPlayerStats(){
        $stats = "<p><span style='font-weight: 900;'>Player Name:</span>" .  $this->getPlayerName() . "(#" . $this->getPlayerNumber() . ")</p>";
        $stats .= "<p><span style='font-weight: 900;'>Team:</span>" .  $this->getPlayerTeam() . "</p>";
        $stats .= "<p><span style='font-weight: 900;'>Position:</span>" .  $this->getPlayerPosition() . "</p>";

        return $stats;
    }
}