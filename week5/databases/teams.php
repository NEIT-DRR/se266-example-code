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

<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $error = "";
    
     // let's figure out if we're doing update or add
    if (isset($_GET['action'])) {
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'id');

        if($action == 'edit'){
            $team = getTeam($id);
            $teamName = $team['teamName'];
            $teamConference = $team['teamConference'];
            $teamDivision = $team['teamDivision'];
            $teamPoints = $team['teamPoints'];
        }else{
            $teamName = "";
            $teamConference = "";
            $teamDivision = "";
            $teamPoints = 0;

        }
    } 

    if (isset($_POST['storeTeam'])) {
        $teamName = filter_input(INPUT_POST, 'name');
        $teamConference = filter_input(INPUT_POST, 'conference');
        $teamDivision = filter_input(INPUT_POST, 'division');
        $teamPoints = filter_input(INPUT_POST, 'points', FILTER_VALIDATE_FLOAT);
        
        if ($teamName == "") $error .= "<li>Please provide team name</li>";
        if ($teamConference == "") $error .= "<li>Please provide team conference</li>";
        if ($teamDivision == "") $error .= "<li>Please provide team division</li>";
        if ($teamPoints == "") $error .= "<li>Please provide team points (#)</li>";
    }


    if (isset($_POST['storeTeam']) && $error == "" && $action == 'add'){
        addTeam ($teamName, $teamConference, $teamDivision, $teamPoints);
        header('Location: ../databases/teams.view.php');
        exit;
    }

    if (isset($_POST['storeTeam']) && $error == "" && $action == 'edit'){
        updateTeam ($id, $teamName, $teamConference, $teamDivision, $teamPoints);
        header('Location: ../databases/teams.view.php');
        exit;
    }

    if(isset($_POST['deleteTeam'])){
        deleteTeam($id);
        header('Location: ../databases/teams.view.php');
        exit;
    }

?>

    <style type="text/css">
        .wrapper {
            display: grid;
            grid-template-columns: 180px 400px;
        }
        .label {
            text-align: right;
            padding-right: 10px;
            margin-bottom: 5px;
            color: #111;
        }
        label {
            font-weight: bold;
        }
        .mar12{
            margin-left: 12rem;
        }
        input[type=text] {width: 200px;}
        .error {color: red;}
        div {margin-top: 5px;}
    </style>

        <div class="container">
            <div class="col-sm-12"> 
                <a class='mar12' href="../databases/teams.view.php">Back to View All Teams</a>
                <h2 class='mar12'><?= ucfirst($action); ?> NHL Team</h2>
                <form name="teams" method="post">
                    <?php
                        if ($error != ""):
                    ?>      
                    <div class="error">
                        <p>Please fix the following and resubmit</p>
                        <ul>
                            <?php echo $error; ?>
                        </ul>
                    </div>
                    <?php
                        endif;
                    ?>
                    <div class="wrapper">
                        <div class="label">
                            <label>Team Name:</label>
                        </div>
                        <div>
                            <input type="text" name="name" class="form-control" value="<?= $teamName; ?>" />
                        </div>
                        <div class="label">
                            <label>Conference:</label>
                        </div>
                        <div>
                            <input type="text" name="conference" class="form-control" value="<?= $teamConference; ?>" />
                        </div>
                        <div class="label">
                            <label>Division:</label>
                        </div>
                        <div>
                            <input type="text" name="division" class="form-control" value="<?= $teamDivision; ?>" />
                        </div>
                        <div class="label">
                            <label>Points:</label>
                        </div>
                        <div>
                            <input type="text" name="points" class="form-control" value="<?= $teamPoints; ?>" />
                        </div>
                        <div>
                            &nbsp;
                        </div>
                        <div>
                            <input class="<?= $action == 'edit' ? 'btn btn-info' : 'btn btn-success'; ?>" type="submit" name="storeTeam" value="<?= ucfirst($action); ?> NHL Team Information" />
                        </div>  
                        <div>
                            &nbsp;
                        </div>             
                        <div>
                            <?php if($action == 'edit'): ?><input class="btn btn-danger" type="submit" name="deleteTeam" value="DELETE NHL Team" /><?php endif; ?>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>