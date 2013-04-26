<?php
error_reporting(0);
include_once("../../config.php");
include_once("../../analyticstracking.php");
session_start();

if ($_SESSION['access'] != true) {
    $login_box = ' <div class="top_login_box"><a href="'.$conf_site_url.'/account/login/">Sign in</a><a href="'.$conf_site_url.'/account/register/">Register</a></div>';
}else{
    $login_box = '<div class="top_login_box"><a href="'.$conf_site_url.'/account/logout/">Logout</a><a href="'.$conf_site_url.'/account/">Account</a></div>';
}
if ($_SESSION['access'] != true) {
    header( 'Location: '.$conf_site_url.'/account/login/?msg=Please login to view this page' ) ;
    exit;
}
$channel_id = $_SESSION['channel_id'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
            <?=$login_box?>
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
                            <li><a href="<?=$conf_site_url?>/account/partner/"><span>Partner</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/ topmenu -->
        </div>
    </div>
    <!--/ header -->

    <!-- middle -->
    <div class="middle">
        <div class="container_12">
            <?php
            // we first get all events that are featured
            $date = time();
            $events = mysql_query("SELECT * FROM events WHERE auther='$channel_id'") or die(mysql_error());
            ?>
            <div class="back_title">
                <div class="back_inner">
                    <a href="<?=$conf_site_url?>"><span>Home</span></a>
                </div>
            </div>
            <center>
                <a href="<?=$conf_site_url?>/account/?<?=SID; ?>" class="button_link"><span>Account Overview</span></a><a href="<?=$conf_site_url?>/account/channel/?<?=SID; ?>" class="button_link"><span>Channel</span></a><a href="<?=$conf_site_url?>/events/manage/?<?=SID; ?>" class="button_link btn_black"><span>Events</span></a><a href="<?=$conf_site_url?>/account/settings/?<?=SID; ?>" class="button_link"><span>Settings</span></a><a href="<?=$conf_site_url?>/account/partner/?<?=SID; ?>" class="button_link"><span>Partner</span></a><a href="<?=$conf_site_url?>/account/help/?<?=SID; ?>" class="button_link"><span>Support</span></a>
            </center>
            <div class="divider_space_thin"></div>
            <!-- content -->
            <div class="grid_8 content">

                <h1>My Events</h1><br />
                <div class="post-list">

                    <?php
                    $time = time();
                    // we now echo them
                    while($eventsRow = mysql_fetch_array($events)){
                        echo '<div class="post-list">';
                        echo '<div class="featured_list">';
                        echo '<ul>';
                        echo '<li><h3>'.$eventsRow['title'].'</h3>';
                        echo '<div class="post-share">';
                        echo substr($eventsRow['msg'], 0, 300).'... <a href="'.$conf_site_url.'/events/view/?id='.$eventsRow['id'].'"><b>Read more</b></a>';
                        echo '</div>';
                        echo '<div class="meta-date">Start in: '.round(($eventsRow['startDate']-$time) / (60*60)).' hour(s).<br>From '.date('d/m-Y G:i', $eventsRow['startDate'])." GMT +1".' to '.date('d/m-Y G:i', $eventsRow['endDate'])." GMT +1".', so about '.round(($eventsRow['endDate']-$eventsRow['startDate']) / (60*60)).' hour(s) in duration</div>';
                        echo '</li></ul><a href="edit.php?id='.$eventsRow['id'].'" class="button_link"><span>Edit event</span></a></div>';
                        echo '</div>';
                        echo '<div class="clear"></div>';
                    }
                    ?>
                    <div class="clear"></div>
                </div>
            </div>
            <!--/ content -->

            <!-- sidebar -->
            <div class="grid_4 sidebar">

                <div class="widget-container widget_text">
                    <a href="../create/" class="button_link"><span>Submit event</span></a><br>
                    <a href="../" class="button_link"><span>Back to events</span></a><br>
                </div>

                <div class="post-share">
                    <a href="<?=$conf_site_url?>/twitter/" class="btn-share"><img src="<?=$conf_site_url?>/images/share_twitter.png" width="79" height="25" alt="" /></a> <a href="<?=$conf_site_url?>/facebook/" class="btn-share"><img src="<?=$conf_site_url?>/images/share_facebook.png" width="88" height="25" alt="" /></a>
                </div>
            </div>
            <!--/ sidebar -->



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
