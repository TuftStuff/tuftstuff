<?php
session_start();
if (!isset($_SESSION['user'])) {
        header("Location: login.html");
        exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Posts</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.php">
                        TuftStuff
                    </a>
                </li>
                <li>
                    <a href="Add.php">+ Add Post</a>
                </li>
		<li>
                    <a href="myposts.php">My Posts</a>
                </li>
                <li>
                    <a href="search.php">Search</a>
                </li>
                <li>
                    <a href="All.php">All</a>
                </li>
                <li>
                    <a href="ClubStuff.php">Club Stuff</a>
                </li>
                <li>
                    <a href="Services.php">Services</a>
                </li>
                <li>
                    <a href="StuffForSale.php">Stuff for Sale</a>
                </li>
                <li>
                    <a href="FreeStuff.php">Free Stuff</a>
                </li>
                <li>
                    <a href="Events.php">Events</a>
                </li>
                <li>
                    <a href="Housing.php">Housing</a>
                </li>
                <li>
                    <a href="LostFound.php">Lost & Found</a>
                </li>
                <li>
                    <a href="Carpool.php">Carpool</a>
                </li>
                <li>
                    <a href="About.php">About</a>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <p style = "color:#5CADFF; font-size: 40px; background:#432719"><a href="#menu-toggle" class="btn btn-link" id="menu-toggle"><img src = "https://www.etaadvertising.com/images/mobmenu.png" height = "30" width = "30"/></a> TuftStuff             <?php session_start();?>
                <?php if(isset($_SESSION['user'])): ?>
            <scan style = "font-size: 20px"><?= "Hello: ".$_SESSION['user']?></\
scan>
                <a href = "logout.php" class = "btn btn-default pull-right" id=\
"login_button" style = "color:#5CADFF; font-size: 20px; background: #432719; bo\
rder-color: #432719"> Logout </a>
                <?php else: ?>
                <a href = "login.html" class = "btn btn-default pull-right" id=\
"login_button" style = "color:#5CADFF; font-size: 20px; background: #432719; bo\
rder-color: #432719"> Login </a>
                <?php endif; ?></p>
        <div id="page-content-wrapper">
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12" style = "color: #5CADFF; font-size: 15px">
                        <html>
  <body>
      <p><center><h2 style = "color: #5CADFF; font-size: \      
15px">My Posts</h2></center>
                <hr />  
	      <?php 
session_start();
$connection = new MongoClient(); // connects to database
$db = $connection->selectDB("tuftstuff"); // connects to collection
$collection = $connection->selectCollection($db,"Clubs");
$search = array("Name"=>$_SESSION['user']);

$cursor = $collection->find($search); // makes cursor to loops through collection
foreach($cursor as $doc) {	
			   echo $doc["Type"].": ".$doc["Title"]."<br>";
			   echo "Location: ".$doc["Location"]."<br>";
			   echo "Time: ".$doc["Time"]."<br>";
			   echo "Description: ".$doc["Description"]."<br>";
$str = <<<'EOD'
<a onclick="return confirm('Are you sure?')" href=remove.php?id=
EOD;
			   echo $str.$doc['_id'].">Delete</a><br><br>";
}
?>
<hr />
      </p>
    </body>
</html>

                      
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
