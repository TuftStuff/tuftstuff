<?php
$connection = new MongoClient();
$db = $connection->selectDB("tuftstuff");
$all = $db->listCollections();

foreach($all as $collection) {
$cursor = $collection->find();
$cursor->getNext();
$array = iterator_to_array($cursor);
foreach ( $cursor as $id => $collection )
{
    //echo "$id: ";
    //var_dump( $collection );
    echo $collection["Type"].": ".$collection["Title"]."<br>";
    echo "Location: ".$collection["Location"]."<br>";
    echo "Time: ".$collection["Time"]."<br>";
    echo "Description: ".$collection["Description"]."<br>";
    
    echo " "."<br>";

}
}
/*
$collection = $connection->tuftstuff->Clubs;
$cursor = $collection->find();
$cursor->getNext();
$array = iterator_to_array($cursor);
foreach ( $cursor as $id => $Clubs )
{
    //echo "$id: ";
    //var_dump( $Clubs );
    echo "Club: ".$Clubs["Title"]."<br>";
    echo "Location: ".$Clubs["Location"]."<br>";
    echo "Time: ".$Clubs["Time"]."<br>";
    echo "Description: ".$Clubs["Description"]."<br>";
    
    echo " "."<br>";

}

$collection = $connection->tuftstuff->FreeStuff;
$cursor = $collection->find();
$cursor->getNext();
$array = iterator_to_array($cursor);
foreach ( $cursor as $id => $FreeStuff )
{
    //echo "$id: ";
    //var_dump( $FreeStuff );
    echo "Free Thing: ".$FreeStuff["Title"]."<br>";
    echo "Location: ".$FreeStuff["Location"]."<br>";
    echo "Time: ".$FreeStuff["Time"]."<br>";
    echo "Description: ".$FreeStuff["Description"]."<br>";

    echo " "."<br>";

}

$collection = $connection->tuftstuff->Lost;
$cursor = $collection->find();
$cursor->getNext();
$array = iterator_to_array($cursor);
foreach ( $cursor as $id => $Lost )
{
    //echo "$id: ";
    //var_dump( $Lost );
    echo "Lost Item: ".$Lost["Title"]."<br>";
    echo "Location: ".$Lost["Location"]."<br>";
    echo "Time: ".$Lost["Time"]."<br>";
    echo "Description: ".$Lost["Description"]."<br>";

    echo " "."<br>";

}

$collection = $connection->tuftstuff->Services;
$cursor = $collection->find();
$cursor->getNext();
$array = iterator_to_array($cursor);
foreach ( $cursor as $id => $Services )
{
    //echo "$id: ";
    //var_dump($Services );
    echo "Service: ".$Services["Title"]."<br>";
    echo "Location: ".$Services["Location"]."<br>";
    echo "Time: ".$Services["Time"]."<br>";
    echo "Description: ".$Services["Description"]."<br>";

    echo " "."<br>";

}

$collection = $connection->tuftstuff->StuffForSale;
$cursor = $collection->find();
$cursor->getNext();
$array = iterator_to_array($cursor);
foreach ( $cursor as $id => $StuffForSale )
{
    //echo "$id: ";
    //var_dump( $StuffForSale);
    echo "For Sale: ".$StuffForSale["Title"]."<br>";
    echo "Location: ".$StuffForSale["Location"]."<br>";
    echo "Time: ".$StuffForSale["Time"]."<br>";
    echo "Description: ".$StuffForSale["Description"]."<br>";

    echo " "."<br>";

}*/
?>
