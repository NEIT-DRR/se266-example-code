<?php
    include __DIR__ . '/model/model_teams.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teams</title>
</head>
<body>
    

<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $error = "";
    $teamName = "";
    $teamConference = "";
    $teamDivision = "";
    $teamPoints = 0;
   
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
        }
        label {
           font-weight: bold;
        }
        input[type=text] {width: 200px;}
        .error {color: red;}
        div {margin-top: 5px;}
    </style>

    <?php
        if (isset($_POST['storeTeam']) && $error == ""):
            $result = addTeam ($teamName, $teamConference, $teamDivision, $teamPoints);
    ?>
        <h2>New team was added</h2>
        
        <ul>
            <li><?php echo "Name: $teamName"; ?></li>
        </ul>
        <a href="teams.view.php">View All NHL Teams</a>
    <?php
            exit;
        endif;
    ?>
    <h2>New NHL Team</h2>

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
                <input type="text" name="name" value="<?= $teamName; ?>" />
            </div>
            <div class="label">
                <label>Conference:</label>
            </div>
            <div>
                <input type="text" name="conference" value="<?= $teamConference; ?>" />
            </div>
            <div class="label">
                <label>Division:</label>
            </div>
            <div>
                <input type="text" name="division"  value="<?= $teamDivision; ?>" />
            </div>
            <div class="label">
                <label>Points:</label>
            </div>
            <div>
                <input type="text" name="points"  value="<?= $teamPoints; ?>" />
            </div>

            <div>
                &nbsp;
            </div>
            <div>
                <input type="submit" name="storeTeam" value="Store NHL Team Information" />
            </div>
           
        </div>

       
    </form>
    <p>
       
    </p>


    </body>
</html>