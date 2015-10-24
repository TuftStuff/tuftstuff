<?php
session_start();
if (!isset($_SESSION['user'])) {
	header("Location: login.html");
	exit();
}
if(isset($_POST['Title'])&&($_POST['Location'])&&($_POST['Time'])&&($_POST['Description'])) { // checks to see if all required info is present
$Title = $_POST['Title']; // stores input in variable
$Location = $_POST['Location'];
$Time = $_POST['Time'];
$Description = $_POST['Description'];
$Name = $_SESSION['user'];
$Type = $_POST['Type'];
/*echo $Type.": ".$Title."<br>"; // outputs input (might be removed later)
echo "Location: ".$Location."<br>";
echo "Time: ".$Time."<br>";
echo "Description: ".$Description."<br>";*/
$timezone = date_default_timezone_get(); // gets timezone(might remove)
$date = date('m/d/Y h:i:s a', time()); // gets date of input(to expire later)

$doc = array( // puts variables into document
    "Title" => $Title,
    "Name" => $Name,
    "Location" => $Location,
    "Time" => $Time,
    "Description" => $Description,
    "Submission" => $timezone,
    "Date" => $date,
    "Type" => $Type
);

$connection = new MongoClient(); // connects to database
$collection = $connection->tuftstuff->Clubs; // connects to collection

$collection->insert( $doc ); // puts document in collection
header("Location: index.php");
}
?>
