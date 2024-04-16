<?php

    include (__DIR__ . '/db.php');


    function getTeams () {
        global $db;
        
        $results = [];

        $stmt = $db->prepare("SELECT * FROM  teams ORDER BY teamConference, teamDivision, teamPoints DESC"); 
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return ($results);
    }

    function getTeam($id) {
        global $db;
        
        $result = [];

        $stmt = $db->prepare("SELECT * FROM  teams WHERE id = :i"); 
        
        $binds = array(
            ":i" => $id,
        );

        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return ($result);
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
    
    function updateTeam ($id, $tName, $tConference, $tDivision, $tPoints) {
        global $db;

        $result = "";
        $sql = "UPDATE teams SET teamName = :n, teamConference = :c, teamDivision = :d, teamPoints = :p WHERE id = :id";
        $stmt = $db->prepare($sql);

        $binds = array(
            ":n" => $tName,
            ":c" => $tConference,
            ":d" => $tDivision,
            ":p" => $tPoints,
            ":id" => $id
        );
        
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = 'Data Added';
        }
        
        return ($result);
    }

    function deleteTeam ($id) {
        global $db;
        
        $results = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM teams WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        
        return ($results);
    }
?>

