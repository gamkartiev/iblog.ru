<?php
// session_start();
if(($_GET['do']) == 'logout')
{
	unset($_SESSION['admin']);
	session_destroy();
}
if(!$_SESSION['admin'])
{
	header("Location: enter.php");
	exit;
}

?>
