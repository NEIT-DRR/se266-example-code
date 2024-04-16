<?php
    include __DIR__ . '/model/model_teams.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>NHL Teams</title>
</head>
<body>

    <div class="container">
                
        <div class="col-sm-12">
            <h1>NHL Teams</h1>
            <a class="btn btn-success" href="teams.php?action=add" style="margin: 1rem 0;">Add New Team</a>

        <?php 
        $teams = getTeams ();
        ?>
    
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Team Name</th>
                        <th>Confernece</th>
                        <th>Division</th>
                        <th>Points</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
            
                <?php foreach ($teams as $t): ?>
                    <tr>
                        <td><?= $t['id']; ?></td>
                        <td><?= $t['teamName']; ?></td>
                        <td><?= $t['teamConference']; ?></td> 
                        <td><?= $t['teamDivision']; ?></td>  
                        <td><?= $t['teamPoints']; ?></td>
                        <td><a class="btn btn-info" href="teams.php?action=edit&id=<?= $t['id'] ?>" style="text-decoration: none;">Edit</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        
            <br />
            <a class="btn btn-success" href="teams.php?action=add" style="margin: 1rem 0;">Add New Team</a>
        </div>
    </div>
</body>
</html>
