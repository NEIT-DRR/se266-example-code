<?php

include ('character.php');
include ('wizard.php');
include ('ranger.php');

if (isset($_POST['p1_name'])) {
    $p1_name  = filter_input (INPUT_POST, 'p1_name');
    $p1_health    = filter_input (INPUT_POST, 'p1_health');
    $p2_name  = filter_input (INPUT_POST, 'p2_name');
    $p2_health    = filter_input (INPUT_POST, 'p2_health');
} else {
    $p1_name  = 'DougWizard';
    $p1_health = 100;
    $p2_name  = 'DougRanger';
    $p2_health = 100;
}

//init players / use values from inputs
$player1 = new Wizard($p1_name, $p1_health);
$player2 = new Ranger($p2_name, $p2_health);


if (isset($_POST['p1_attack'])) {
    $player1->attack($player2, 15);
} else if (isset($_POST['p1_heal'])) {
    $player1->heal(20);
}  else if (isset($_POST['p2_attack'])) {
    $player2->attack($player1, 15);
}  else if (isset($_POST['p2_heal'])) {
    $player2->heal(20);
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Brawl</title>
    <style type="text/css">
        form h1{
            text-align: center;
        }
        .wrapper{
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }
        .player{
            border: 2px solid black;
            padding: 2rem;
        }
        .controls{
            margin-top: 2rem;
        }

    </style>
</head>
<body>

    <form method="post">
    <h1>Class Brawl</h1>
        <div class="wrapper">
            
            <div class="player" style="<?php if ($player1->getPlayerHealth() <= 0): ?>border: 2px solid red;<?php endif; ?>">
            <h3>Player 1</h3>
                <?php
                    echo $player1->getStats();
                ?>

                    <input type="hidden" name="p1_name" value="<?= $player1->getPlayerName(); ?>" />
                    <input type="hidden" name="p1_health" value="<?= $player1->getPlayerHealth(); ?>" />

                    <div class="controls">
                        <input type="submit" name="p1_attack" value="Attack" />
                        <input type="submit" name="p1_heal" value="Heal" /><br />
                    </div>
            
            </div>

            
            <div class="player" style="<?php if ($player2->getPlayerHealth() <= 0): ?>border: 2px solid red;<?php endif; ?>">
            <h3>Player 2</h3>
                <?php
                    echo $player2->getStats();
                ?>

                    <input type="hidden" name="p2_name" value="<?= $player2->getPlayerName(); ?>" />
                    <input type="hidden" name="p2_health" value="<?= $player2->getPlayerHealth(); ?>" />

                    <div class="controls">
                        <input type="submit" name="p2_attack" value="Attack" />
                        <input type="submit" name="p2_heal" value="Heal" /><br />
                    </div>
            
            </div>
            
        </div>
    </form>
</body>
</html>