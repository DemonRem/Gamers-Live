<?php
error_reporting(0);
session_start();

include_once("../config.php");
include_once("../analyticstracking.php");

include_once("".$conf_ht_docs_gl."/analyticstracking.php");
if ($_SESSION['access'] != true) {
	header( 'Location: '.$conf_site_url.'/account/login/?msg=Please login to view this page' ) ;	
	exit;
}
$email = $_SESSION['email'];
$channel_id = $_SESSION['channel_id'];
$admin = $_SESSION['admin'];

			
			// select features streamer who is online / active
			
			$result = mysql_query("SELECT * FROM subscribtions WHERE fan_channel_id='$channel_id'") or die(mysql_error());
			
			$result_channel = mysql_query("SELECT * FROM channels WHERE channel_id='$channel_id'");
			$row_channel = mysql_fetch_array($result_channel);
			$server_rtmp = $row_channel['server_rtmp'];
			$stream_key = $row_channel['stream_key'];


$result_user = mysql_query("SELECT * FROM users WHERE email='$email'");
$row_user = mysql_fetch_array($result_user);

$welcome = $row_user['first_time_login'];
if($welcome == "1"){
    header( 'Location: '.$conf_site_url.'/account/welcome.php' ) ;
}
					
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="ThemeFuse" />
<meta name="Description" content="A short description of your company" />
<meta name="Keywords" content="Some keywords that best describe your business" />
<title><?=$conf_site_name?></title>
<link rel="shortcut icon" href="<?=$conf_site_url?>/favicon.ico" />
<link href="<?=$conf_site_url?>/style.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?=$conf_site_url?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=$conf_site_url?>/js/preloadCssImages.js"></script>
<script type="text/javascript" src="<?=$conf_site_url?>/js/jquery.color.js"></script>

<script type="text/javascript" language="JavaScript" src="<?=$conf_site_url?>/js/general.js"></script>
<script type="text/javascript" language="JavaScript" src="<?=$conf_site_url?>/js/jquery.tools.min.js"></script>
<script type="text/javascript" language="JavaScript" src="<?=$conf_site_url?>/js/jquery.easing.1.3.js"></script>

<script type="text/javascript" language="JavaScript" src="<?=$conf_site_url?>/js/slides.jquery.js"></script>

<link rel="stylesheet" href="<?=$conf_site_url?>/css/prettyPhoto.css" type="text/css" media="screen" />
<script src="<?=$conf_site_url?>/js/jquery.prettyPhoto.js" type="text/javascript"></script>

<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="<?=$conf_site_url?>css/ie.css" />
<![endif]-->
</head>

<body>
<div class="body_wrap thinpage">

<div class="header_image" style="background-image:url(<?=$conf_site_url?>/images/header.png)">&nbsp;</div>

<div class="header_menu">
	<div class="container">
		<div class="logo"><a href="<?=$conf_site_url?>/"><img src="<?=$conf_site_url?>/images/logo.png" alt="" /></a></div>
        <div class="top_login_box"><a href="<?=$conf_site_url?>/account/logout/?<?=SID; ?>">Logout</a><a href="<?=$conf_site_url?>/account/settings/?<?=SID; ?>">Settings</a></div>
                <div class="top_search">
        	<form id="searchForm" action="<?=$conf_site_url?>/browse/" method="get">
                <fieldset>
                	<input type="submit" id="searchSubmit" value="" />
                    <div class="input">
                        <input type="text" name="s" id="s" value="Type & press enter" />
                    </div>                    
                </fieldset>
            </form>
        </div>
        
          <!-- topmenu -->
        <div class="topmenu">
                    <ul class="dropdown">
                        <li><a href="<?=$conf_site_url?>/browse/?s=league+of+legends"><span>LoL</span></a></li>
                        <li><a href="<?=$conf_site_url?>/browse/?s=dota+2"><span>Dota 2</span></a></li>
                        <li><a href="<?=$conf_site_url?>/browse/?s=Heroes+of+Newerth"><span>HoN</span></a></li>
                        <li><a href="<?=$conf_site_url?>/browse/?s=Star+Craft+2"><span>SC 2</span></a></li>
                        <li><a href="<?=$conf_site_url?>/browse/?s=World+Of+Warcraft"><span>WoW</span></a></li>
                        <li><a href="<?=$conf_site_url?>/browse/?s=Call+Of+Duty"><span>Call Of Duty</span></a></li>
                        <li><a href="<?=$conf_site_url?>/browse/?s=Minecraft"><span>Minecraft</span></a></li>
                        <li><a href="<?=$conf_site_url?>/browse/"><span>Other</span></a></li>
                        <li><a href="<?=$conf_site_url?>/events/"><span>Events</span></a></li>
                        <li><a href="#"><span>More</span></a>                        
                        	<ul>
                                
                                <li><a href="<?=$conf_site_url?>/company/support/"><span>Contact</span></a></li>
                                <li><a href="<?=$conf_site_url?>/account/partner/?<?=SID; ?>"><span>Partner</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
        	<!--/ topmenu -->
    </div>
</div>     	
<!--/ header -->



<!-- middle -->
<div class="middle full_width">
<div class="container_12">

	<div class="back_title">
    	<div class="back_inner">
		<a href="<?=$conf_site_url?>/account/?"<? SID;?><span>Home</span></a>
        </div>
    </div> 	 
   
    
    <!-- content -->
    <div class="content"><br />
        <!-- account menu -->
    <center>
    <a href="<?=$conf_site_url?>/account/?<?=SID; ?>" class="button_link btn_black"><span>Account Overview</span></a><a href="<?=$conf_site_url?>/account/channel/?<?=SID; ?>" class="button_link"><span>Channel</span></a><a href="<?=$conf_site_url?>/events/manage/?<?=SID; ?>" class="button_link"><span>Events</span></a><a href="<?=$conf_site_url?>/account/settings/?<?=SID; ?>" class="button_link"><span>Settings</span></a><a href="<?=$conf_site_url?>/account/partner/?<?=SID; ?>" class="button_link"><span>Partner</span></a><a href="<?=$conf_site_url?>/account/help/?<?=SID; ?>" class="button_link"><span>Support</span></a>
	<?php
error_reporting(0);

 if($admin == true){ 
	echo "<a href='".$conf_site_url."/account/admin/?' class='button_link btn_red'><span>Admin CP</span></a>";
	} ?>

        <br><h1>Welcome <?=$channel_id?></h1>
        <i><a href="<?=$conf_site_url?>/user/<?=$channel_id?>/"><?=$conf_site_url?>/user/<?=$channel_id?>/</a></i>
    </center>    
    <!-- account menu end -->

        <h2>Upcomming subscribed events</h2>
        <?php
        // we will now check if there is any upcomming events that we have subscribed for
        $time = time();
        $time4 = time() + 14400;
        $eventsGet = mysql_query("SELECT * FROM event_wanna WHERE viewer='$channel_id' AND startDate >= '$time' ORDER BY startDate")or die(mysql_error());
        $count = mysql_num_rows($eventsGet);
        if($count >= 1){
            while($eventsGetRow = mysql_fetch_array($eventsGet)){
                // we now echo them
                $id = $eventsGetRow['event_id'];
                $events = mysql_query("SELECT * FROM events WHERE id = '$id'") or die(mysql_error());
                while($eventsRow = mysql_fetch_array($events)){
                    echo '<div class="post-list">';
                    echo '<div class="featured_list">';
                    echo '<ul>';
                    echo '<li>';
                    if($eventsRow['startDate'] <= $time4){
                        echo "<h3>This event is starting in: ".round(($eventsRow['startDate']-$time)/60)." minute(s)</h3>";
                    }
                    echo '<h3>'.$eventsRow['title'].'</h3>';
                    echo '<div class="post-share">';
                    echo substr($eventsRow['msg'], 0, 350).'... <a href="'.$conf_site_url.'/events/view/?id='.$eventsRow['id'].'"><b>Read more</b></a>';
                    echo '</div>';
                    echo '<div class="meta-date">Start in: '.round(($eventsRow['startDate']-$time) / (60*60)).' hour(s).<br>From '.date('d/m-Y G:i', $eventsRow['startDate'])." GMT +1".' to '.date('d/m-Y G:i', $eventsRow['endDate'])." GMT +1".', so about '.round(($eventsRow['endDate']-$eventsRow['startDate']) / (60*60)).' hour(s) in duration</div>';
                    echo '</li></ul></div>';
                    echo '</div>';
                    echo '<div class="clear"></div>';
                }
            }
        }else{
            echo '<center><h3>There are no subscribed upcomming events!</h3></center>';
        }
        ?>
       <h2>Your channel subscriptions</h2>
    <div class="styled_table table_white"/>
    
                        <?php
error_reporting(0);


					echo "<table width='100%' cellpadding='0' cellspacing='0'>
					<tbody>
					<thead>
					<tr>
						<th></th>
						<th>Title</th>
						<th>Streamer</th>
						<th>Game</th>
						<th>Viewers</th>
						<th>Channel Link</th>
					</tr>
					</thead>";
					
					while($row = mysql_fetch_array($result))
					{
						// get info from our channel
						
						
						$res1 = mysql_query("SELECT * FROM channels WHERE channel_id='".$row['owner_channel_id']."' ORDER BY viewers DESC LIMIT 20") or die(mysql_error());
						
						while($r1 = mysql_fetch_array($res1))
						{
                            echo "<tr>";
                                echo "<td><center><img src='".$conf_site_url."/user/" . $r1['channel_id'] . "/avatar.png' height='50' width='50'></center></td>";
                            echo "<td>" . $r1['title'] . "</td>";
                            echo "<td>" . $r1['channel_id'] . "</td>";
                            echo "<td>" . $r1['game'] . "</td>";
                            echo "<td>" . $r1['viewers'] . "</td>";
                            echo "<td><a class='colorButton' href='".$conf_site_url."/user/" . $r1['channel_id'] . "/?".SID."'><span class='pointer'>Watch Live</span></a></td>";
                            echo "</tr>";
						}
					}
						echo "<tbody>
						</table>";
					?>
</div>
                    <h3 class="toggle box">Start Streaming <i>(do not show others this info)</i><span class="ico"></span></h3>
                    <div class="toggle_content boxed" style="display: none;">
                         <h2>xSplit:</h2>
						 <strong>RTMP URL: </strong><?=$server_rtmp?><?=$channel_id?>/?streamKey=<?=$stream_key?><br />
                         <strong>Stream Name:</strong> <?=$channel_id?><br /><br />
                         <h2>FFSplit:</h2>
						 <strong>RTMP URL:</strong> <?=$server_rtmp?><?=$channel_id?>/?streamKey=<?=$stream_key?>/<?=$channel_id?>
                    </div>
    </div>
    <!--/ content --> 
    
   
    <div class="clear"></div>
    
</div>
</div>
<!--/ middle -->

<div class="footer">
<div class="footer_inner">
<div class="container_12">
	
    <div class="grid_8">
    	<h3><?=$conf_site_name?></h3>   
		
        <div class="copyright">
		<?=$conf_site_copy?> <br /><a href="<?=$conf_site_url?>/company/legal/">Terms of Service</a> - <a href="<?=$conf_site_url?>/company/support/">Contact</a> -
		<a href="<?=$conf_site_url?>/company/legal/">Privacy guidelines</a> - <a href="<?=$conf_site_url?>/company/support/">Advertise with Us</a></p>
		</div>          
    </div>
    
    <div class="grid_4">
    	<h3>Follow us</h3>
        <div class="footer_social">
        	<a href="<?=$conf_site_url?>/facebook/" class="icon-facebook">Facebook</a> 
            <a href="<?=$conf_site_url?>/twitter/" class="icon-twitter">Twitter</a>
            <a href="<?=$conf_site_url?>/rss/" class="icon-rss">RSS</a>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="clear"></div>
</div>
</div>
</div>   

</div>   
</body>
</html>
