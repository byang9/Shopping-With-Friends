<?php
$person = $_GET['person'];
$item = $_GET['item'];
$vote = $_GET['v'];
if( ! $xml = simplexml_load_file('database.xml') ) 
{
    echo 'unable to load XML file';
}
else
{
    $people = $xml->person;
    foreach($people as $p)
    {
        if($p->id == $person)
        {
            foreach($p->wishlist->item as $i)
            {
                if($i->id==$item)
                {
                    if($vote==1)
                    {
                        $x=$i->likes;
                        $i->likes=$x+1;
                    }
                    else
                    {
                        $x=$i->dislikes;
                        $i->dislikes=$x+1;
                    }
                }
            }
        }
    }
    $xml->asXML('database.xml');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>