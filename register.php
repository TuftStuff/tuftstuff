<?php
$ldap_server = "ldap.tuftstuff.me"; 
$ldap_conn = ldap_connect($ldap_server) or die("Could not connect");
$user_base = ",dc=tuftstuff,dc=me";
$user = "cn=".$_POST["user"].$user_base;
ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);
if ($ldap_conn) {
	if (ldap_bind($ldap_conn, $user, $_POST["pass"])) {
		session_start();
		$_SESSION['username'] = $_POST["user"];
		header("Location: index.html");
	} else {
		header("Location: login.html");
		exit();
	}
}
?>
