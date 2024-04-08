<?php

class Team
{
    private $teamName;
    private $points;

    private static $teamCount=0;

    public function __construct($name, $pnts) {
      // gets called when we do something like: $t = new Team() outside of the class

        $this->teamName = $name;
        $this->points = $pnts;

        self::$teamCount++;
    }

   //set team name
    public function setTeamName($name) 
    {
        $this->teamName = $name;
    } 

    //set points
    public function setPoints($pnts) 
    {
        $this->points = $pnts;
    } 

    //get team name
    public function getTeamName() 
    {
        return $this->teamName;
    }

    //get points
    public function getPoints() 
    {
        return $this->points;
    } 

    //get Team Count
    public static function getTeamCount() 
    {
        return Team::$teamCount;
    }
}