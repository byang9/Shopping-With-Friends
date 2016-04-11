<?php
if(isset($_POST['friendName'])) echo 'Friend ' . $_POST['friendName'] . 'wishlist';

if( ! $xml = simplexml_load_file('database.xml') ) 
{
    echo 'unable to load XML file';
}
else
{
    $likeIcon = new DOMDocument();
    $likeIcon->loadXML(file_get_contents('like.svg'));
    $dislikeIcon = new DOMDocument();
    $dislikeIcon->loadXML(file_get_contents('dislike.svg'));
    $likeIcon=$likeIcon->getElementsByTagName('svg')->item(0)->C14N();
    $dislikeIcon=$dislikeIcon->getElementsByTagName('svg')->item(0)->C14N();
    
    $htmlOut = "<link rel='stylesheet' type='text/css' href='wishListStyle.css'>";
    $htmlOut = $htmlOut . "<div id='homeBtn'><a href='http://www.pseudodream.com/hackEmory/home/index.php'>Home</a></div>";
    $htmlOut = $htmlOut . "<div id='backBtn'><a href='chooseFriend.php'>Back to friends</a></div>\n";
    $htmlOut = $htmlOut . "<div id='titleDiv'>" . $_GET['friendName'] . "'s Wishlist</div><br>\n<div id='itemsList'>\n";
    foreach($xml->person as $p)
    {
        if($p->id == $_GET['friendName'])
        {
            
            $htmlOut = $htmlOut . "<div id='resultsHeader'>\n<div id='numResults'>" . sizeOf($p->wishlist->item) . " items</div>\n<div id='sortOptions'></div>\n</div>\n";
            foreach($p->wishlist->item as $i)
            {
                $htmlOut = $htmlOut . "<div class='item'>\n" . "<div class='item-pic'>\n</div>\n" . "<div class='item-title'>" . $i->id . "</div>" . "<div class='item-dislikes likeIm'><a href='vote.php?person=" . $p->id . "&item=" . $i->id . "&v=-1'>" . $dislikeIcon . "</a></div>\n<span class='item-dislikes likeTx'>" . $i->dislikes . "</span><span class='item-likes likeTx'>" . $i->likes . "</span><div class='item-likes likeIm'><a href='vote.php?person=" . $p->id . "&item=" . $i->id . "&v=1'>" . $likeIcon . "</a></div>\n<br><br>\n<div class='item-description'>Some nice description</div>\n" . "<div class='item-buyButton'>Buy gift</div>\n" . "</div>\n";
            }
        }
    }
    $htmlOut = $htmlOut . "</div>";
    echo $htmlOut;
    //echo $xml->person[0]->wishlist[0]->item[2]->id;
    
}
?>