<?php
session_start();
$i=0;
$htmlOut = '';
$htmlOut = $htmlOut . '<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">';
$htmlOut = $htmlOut . '<button type="button"><a href="index.php">Home</a></button><div class="container"><h2>Friend List</h2><ul class="list-group">';
while(1==1)
{
    if(isset($_SESSION["friend".$i]))
    {
        $htmlOut = $htmlOut . '<a href="display_wishlist.php?friendName=' . $_SESSION["friend".$i] . '"><li class="list-group-item">' . $_SESSION["friend".$i] . '</li></a>';
    }
    else
    {
        break;
    }
    $i++;
}
$htmlOut = $htmlOut . "</ul></div>";
echo $htmlOut;
?>