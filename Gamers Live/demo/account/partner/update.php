<?php
error_reporting(0);
include_once("../../config.php");
include_once("../../analyticstracking.php");


session_start();

if ($_SESSION['access'] != true) {
	header( 'Location: '.$conf_site_url.'/account/login/?msg=Please login to view this page' ) ;	
	exit;
}
$email = $_SESSION['email'];
$channel_id = $_SESSION['channel_id'];

$value = $_POST['value'];

$msg = $_GET["msg"];
if($msg == ""){
header( 'Location: '.$conf_site_url.'/account/partner/?<? SID; ?>' );
}


			
// connect to database

			
// select thje database we need


// update data with msg

if($msg == "ads"){	

$ads_update = mysql_query("UPDATE channels SET ads='$value' WHERE channel_id='$channel_id'") or die(mysql_error());
	
}

if($msg == "video_ads"){	

$video_ads_update = mysql_query("UPDATE channels SET ad_level='$value' WHERE channel_id='$channel_id'") or die(mysql_error());
	
}

if($msg == "tip"){	

$tips_ads_update = mysql_query("UPDATE channels SET donate='$value' WHERE channel_id='$channel_id'") or die(mysql_error());
	
}

if($msg == "pay_email"){	

$pemail_ads_update = mysql_query("UPDATE channels SET payment_email='$value' WHERE channel_id='$channel_id'") or die(mysql_error());
	
}

if($msg == "pay_gateway"){	

$pgate_ads_update = mysql_query("UPDATE channels SET payment_gateway='$value' WHERE channel_id='$channel_id'") or die(mysql_error());
	
}

if($msg == "feature_img"){

    $feature_img_update = mysql_query("UPDATE channels SET feature_img='$value' WHERE channel_id='$channel_id'") or die(mysql_error());

}

if($msg == "to_remove_ads"){

    $to_remove_ads_update = mysql_query("UPDATE channels SET ads_disable='$value' WHERE channel_id='$channel_id'") or die(mysql_error());

}



header( 'Location: '.$conf_site_url.'/account/partner/?msg='.$msg.'') ;	
?>