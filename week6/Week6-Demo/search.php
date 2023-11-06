<?php
session_start();

if(!isset($_SESSION['user'])){
    header('Location: restricted.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Search NFL Teams</title>
</head>
<body>
    
    <div class="container">
                
     <div class="col-sm-12">
        <h1>NFL Teams</h1>
       
        
        <a href="view_teams.php">View All Teams</a>

    <?php
        
        include __DIR__ . '/model/model_teams.php';
        include __DIR__ . '/functions.php';


        if (isset($_POST['search'])) {
            $teamName = filter_input(INPUT_POST, 'team_name');
            $division = filter_input(INPUT_POST, 'division');
        }else{
            $teamName = '';
            $division = '';
        }


        $teams = searchTeams($teamName, $division);
        
    ?>

    <form method="POST" name="search_teams">
        <div class="wrapper">
            <div class="label">
                <label>Team Name:</label>
            </div>
            <div>
                <input type="text" name="team_name" value="<?= $teamName; ?>" />
            </div>
            <div class="label">
                <label>Divison:</label>
            </div>
            <div>
                <input type="text" name="division" value="<?= $division; ?>" />
            </div>

            <div>
                &nbsp;
            </div>
            <div>
                <input type="submit" name="search" value="Search" />
            </div>
           
        </div>
    </form>
  
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Team Name</th>
                    <th>Division</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
           
            
            <?php foreach ($teams as $t):                 
            ?>
                <tr>
                    <td>
                        <!-- FORM FOR DELETE FUNCTIONALITY -->
                        <form action='view_teams.php' method='post'>
                            <input type="hidden" name="teamId" value="<?= $t['id'];?>"/>
                            <input class="" type="submit" name="deleteTeam" value="Delete" />
                            <?= $t['id']; ?>
                        </form>
                    </td>
                    <td><?= $t['teamName']; ?></td>
                    <td><?= $t['division']; ?></td> 
                    <!-- LINK FOR UPDATE FUNCTIONALITY -> Look at how we are passing in our ID using PHP! -->
                    <td><a href="edit_team.php?action=Update&teamId=<?= $t['id']; ?>">Edit</a></td>        
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        
        <br />
    </div>
    </div>
</body>
</html>
