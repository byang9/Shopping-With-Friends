<?php
session_start();
if(isset($_GET['itemID'])) echo 'Item ' . $_GET['itemID'] . ' added to wishlist!';
if(isset($_SESSION["name"])) echo $_SESSION["name"];
else echo 1;
if( ! $xml = simplexml_load_file('database.xml') ) 
{
    echo 'unable to load XML file';
}
else
{
    foreach($xml->person as $p)
    {
        if($_SESSION["name"]==$p->id)
        {
            $newel = $p->wishlist->addChild('item');
            $newel->addChild('id', $_GET['itemID']);
            $newel->addChild('likes', 0);
            $newel->addChild('dislikes', 0);
        }
    }
    $xml->asXML("database.xml");
}
header("Location: ".$_SERVER['HTTP_REFERER']);
?>