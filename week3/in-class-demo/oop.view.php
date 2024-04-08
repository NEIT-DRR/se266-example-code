<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/team.php'; ?>
<?php include __DIR__ . '/player.php'; ?>

<h2>Team View. OOP Demo</h2>

<?php 

$bos = new Team('Bruins', 99);
$ny = new Team('Rangers', 100);
$fl = new Team('Panthers', 98);

?>

<h2>Team Stats</h2>
<p><span style="font-weight: 900;">Team Name:</span><?= $ny->getTeamName(); ?></p>
<p><span style="font-weight: 900;">Points:</span><?= $ny->getPoints(); ?></p>

<hr />

<p style="font-style: italic;">Calling setPoints() function to change points value and then display the new value below...</p>

<hr />

<?php $ny->setPoints(105); ?>

<h2>Team Stats</h2>
<p><span style="font-weight: 900;">Team Name:</span><?= $ny->getTeamName(); ?></p>
<p><span style="font-weight: 900;">Points:</span><?= $ny->getPoints(); ?></p>

<hr />
<p><span style="font-weight: 900;">Team Count:</span><?= $ny->getTeamCount(); ?></p>

<hr />

<p style="font-style: italic;">Calling subclass' from our abstract Player class...</p>

<hr />
<?php //$coyle = new Player('Charlie Coyle', 'Bruins', 13, 'C'); ?>

<?php $pastrnak = new Skater('David Pastrnak', 'Bruins', 88, 'RW'); ?>
<?php $swayman = new Goalie('Jeremy Swayman', 'Bruins', 1, 'G'); ?>

<?= $pastrnak->getPlayerStats(); ?>
<?= $swayman->getPlayerStats(); ?> 



<?php include __DIR__ . '/../includes/footer.php'; ?>