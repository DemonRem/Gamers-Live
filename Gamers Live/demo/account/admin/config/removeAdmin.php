<?php
error_reporting(0);



session_start();
include_once("../../../config.php");
include_once("../../../analyticstracking.php");

if ($_SESSION['access'] != true && $_SESSION['admin'] != true) {
    header( 'Location: '.$conf_site_url.'/account/login/?msg=Please login to view this page' ) ;
    exit;
}
$email = $_SESSION['email'];
$channel_id = $_SESSION['channel_id'];
$admin = $_SESSION['admin'];
$username = $_GET['user'];

    // if we continue then the user is not an admin and we should make him one
    $deleteAdminUserTable = mysql_query("UPDATE users SET admin='0' WHERE channel_id='$username'") or die(mysql_error());
    $deleteAdminChannelTable = mysql_query("UPDATE channels SET admin='0' WHERE channel_id='$username'") or die(mysql_error());
    header( 'Location: '.$conf_site_url.'/account/admin/config/?error=You have removed username: '.$username.' as an admin' );
?>