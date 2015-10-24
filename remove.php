<?php
session_start();
if (!isset($_SESSION['user'])) {
        header("Location: login.html");
        exit();
}
$connection = new MongoClient(); // connects to database
$db = $connection->selectDB("tuftstuff"); // connects to collection
$collection = $connection->selectCollection($db,"Clubs");
$search = array("_id"=>new MongoId($_GET["id"]));
$cursor = $collection->find($search); // makes cursor to loops through collection	
$doc = $cursor->getNext();
session_start();
if ($_SESSION['user'] == $doc['Name']) {
	$collection->remove($doc);
}
header("Location: myposts.php");
?>
