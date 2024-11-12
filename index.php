<?php
$b1 = "enabled";
$b2 = "enabled";
$scoreone = isset($_GET['scoreone']) ? $_GET['scoreone'] : 0;
    

$scoretwo = isset($_GET['scoretwo']) ? $_GET['scoretwo'] : 0;
$number1 = rand(1, 6);
$number2 = rand(1, 6);
$diceImage = "dice.png";
$winner = "";

if (isset($_GET['restart'])) {
    $scoreone = 0;
    $scoretwo = 0;
}

if (isset($_GET['player1'])) {
    $b1 = "disabled";
    $scoreone += $number1;
    $diceImage = $number1 . ".png";
    if ($scoreone >= 50) {
        $winner = "Congratulations! Player 1 wins!";
    }
} else if (isset($_GET['player2'])) {
    $b2 = "disabled";
    $scoretwo += $number2;
    $diceImage = $number2 . ".png";
    if ($scoretwo >= 50) {
        $winner = "Congratulations! Player 2 wins!";
    }
}

if ($winner) {
    $b1 = "disabled";
    $b2 = "disabled";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dice Game</title>
   
</head>
<body>
    <div class="container">
        <h1>Dice Game</h1>
        <form action="http://localhost/DiceGame/index.php" method="get">
            <div class="scores">
                <div class="player">
                    <h2>Player 1</h2>
                    <p><?php echo $scoreone; ?></p>
                </div>
                <div class="player">
                    <h2>Player 2</h2>
                    <p><?php echo $scoretwo; ?></p>
                </div>
            </div>
            <div class="dice">
            <img src="<?php echo $diceImage; ?>" alt="Dice image" width="200">
            </div>
            <?php if ($winner): ?>
                <h2><?php echo $winner; ?></h2>
                <input type="submit" name="restart" value="Restart">
            <?php else: ?>
                <div class="buttons">
                    <input type="submit" name="player1" value="Player 1" <?php echo $b1; ?>>
                    <input type="submit" name="player2" value="Player 2" <?php echo $b2; ?>>
                </div>
            <?php endif; ?>
            <input type="hidden" name="scoreone" value="<?php echo $scoreone; ?>">
            <input type="hidden" name="scoretwo" value="<?php echo $scoretwo; ?>">
        </form>
    </div>
</body>
</html>