<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <title>Macy </title>
        <style>
            a:hover, a:active {
            }
        </style>
    </head>

    <body>
        <a href="../shop/shop.php" style='position:absolute; top:1210px; left:380px; width: 100px;'></br></a>
        <canvas id='canvas' width="1000px" height="2000px"></canvas>
        <p id='welcome' style='position:absolute; top:0px; left:50px; width: 100px;'>Welcome: <?php echo $_SESSION["name"]; ?></p>
        <a href="display_wishlist.php?friendName=<?php echo $_SESSION["name"]; ?>" style="position:absolute; top:65px; left:850px;">Wish List</a>
        <a href="chooseFriend.php?friendName=<?php echo $_SESSION["name"]; ?>" style="position:absolute; top:80px; left:850px;">Gift Friends!</a>
    </body>
    <footer>
        <script src="./main.js"></script>
    </footer>

</html>