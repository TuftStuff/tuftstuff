<?php
$ldap_server = "ldaps://ldap.tufts.edu"; 
$ldap_conn = ldap_connect($ldap_server, 389) or die("Could not connect");
$base = "ou=people,dc=tufts,dc=edu";
$filter = "uid=".$_POST["user"];
$attr = array("cn");
$search = ldap_search($ldap_conn, $base, $filter);
$first = ldap_first_entry($ldap_conn, $search);
$cn = ldap_first_attribute($ldap_conn, $first);
$dn = ldap_get_dn($ldap_conn, $first);
if (ldap_bind($ldap_conn, $dn, $_POST["pass"])) {
	session_start();
	$_SESSION['user']=$_POST["user"];
	$_SESSION['name']=$cn;
	header("Location: index.php");
} else {
	header("Location: login.html");
exit();
}
?>
