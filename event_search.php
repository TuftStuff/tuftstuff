// searches for event by title
<?php

$connection = new MongoClient(); // connects to database
$collection = $connection->tuftstuff->Events; // connects to collection

$cursor = $collection->find(); // makes cursor to loop through collection
$cursor->getNext();
$array = iterator_to_array($cursor);



echo "<form action="event_search.php" method="POST">"; // input for event to search for
echo "<p>Search for an event: ";
echo "<input type="text" name="search_event" /><br>";


if(isset($_POST['Title'])  // sets variable if there was input
$Search_event = $_POST['search_event'];


foreach ( $cursor as $id => $Event ) // loops through all events in collection
{
    if($Event["Title"] == $Search_event) { // searches for event in collection

    echo "Event: ".$Event["Title"]."<br>"; // outputs event info if found
    echo "Location: ".$Event["Location"]."<br>";
    echo "Time: ".$Event["Time"]."<br>";
    echo "Description: ".$Event["Description"]."<br>";

    echo " "."<br>";
}
}
?>
