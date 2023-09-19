<?php
include_once "header.php"
?>


<div class="container"><br><br><br>
    <h1><b>Hangman game</b></h1>
    <h5>Rules:</h5>
    <p>
        The object of hangman is to guess the secret word before the stick figure is hung. 
        Players take turns selecting letters to narrow the word down. 
        Players can take turns or work together. 
        Gameplay continues until the players guess the word or they run out of guesses and the stick figure is hung.
    </p>
    <form method="post" action="Hangman_play(2).php">
        <input type="submit" value="Start the game" class="btn btn-outline-warning"><br><br>
    </form>
</div

<?php
include_once "footer.php"
?>
