<?php
include_once "header.php"
?>


<div class="container"><br><br><br>
    <h1><b>Number Guessing Game</b></h1>
    <h5>Rules:</h5>
    <h>
        First pick a number of attempts, 
        then guess a number between 1-10 until you guess the correct number or when you run out of guesses.
    </p>
    <form method="post" action="Number_guessing_game_play.php">
        <label for="num_attempts">pick a number of attempts:</label>
        <input type="number" id="num_attempts" name="num_attempts" value="10"><br><br><br>
        <input class="btn btn-outline-warning" type="submit" value="Start the game"><br><br>
    </form>
    <?php
    $_SESSION["num_guess_allowed"] = 0;
    $_SESSION["num_guess_left"] = 0;
    ?>
</div>

    <?php
    include_once "footer.php"
    ?>
