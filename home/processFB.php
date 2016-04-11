<?php
session_start();
$myName = $_GET["name"];
$frInd = 0;
while(1==1)
{
    if(isset($_GET["f".$frInd]))
    {
        $friends[$frInd]=$_GET["f".$frInd];
    }
    else break;
    $frInd++;
}
$_SESSION["name"] = $myName;
for($i = 0; $i < sizeOf($friends); $i++)
{
    $_SESSION["friend".$i]=$friends[$i];
}

if( ! $xml = simplexml_load_file('database.xml') ) 
{
    echo 'unable to load XML file';
}
else
{
    $nameFound = 0;
    foreach($xml->person as $p)
    {
        if($p->id==$myName)
        {
            $nameFound = 1;
            break;
        }
    }
    if($nameFound == 0)
    {
        $newel = $xml->addChild('person');
        $newel->addChild('id', $myName);
        $newel->addChild('name',$myName);
        $newel->addChild('wishlist');
        $xml->asXML("database.xml");
    }
}
header("Location: index.php");
?>
