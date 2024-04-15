<?php

    include (__DIR__ . '/db.php');

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    function getTeams () {
        global $db;
        
        $results = [];

        $stmt = $db->prepare("SELECT * FROM  teams ORDER BY teamConference, teamDivision, teamPoints DESC"); 
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                 
         }
         
         return ($results);
    }
    
    
    function addTeam ($tName, $tConference, $tDivision, $tPoints) {
        global $db;
        $result = "";
        $sql = "INSERT INTO teams set teamName = :n, teamConference = :c, teamDivision = :d, teamPoints = :p";
        $stmt = $db->prepare($sql);

        $binds = array(
            ":n" => $tName,
            ":c" => $tConference,
            ":d" => $tDivision,
            ":p" => $tPoints
            
            
        );
        
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = 'Data Added';
        }
        
        return ($result);
    }
   
    
    
    
   
    

?>

