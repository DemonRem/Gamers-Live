<!-- slider -->

<?php
// last update was on 12/02/2013

$inc_path = $_SERVER['DOCUMENT_ROOT'];
$inc_path .= "/config.php";
include_once($inc_path);
?>
<div class="header_slider">
    
    <ul id="slider1" class="bxSlider">
     <li style="background: url('images/frontpage/slider/slider_1_3.png') no-repeat scroll center 0 transparent;">
        <div class="fakeimg"></div>
        <div class="slide-text-wrapper">
            <div class="slide-text-content">
            <div class="meta-date"><span class="ico_cat"><em>Other</em></span> Friday 15th of September</div>
            <a href="<?=$conf_blog?>events/demo-super-meat-boy-world-record/" class="slide-title"><strong>Placeholder<br />Super Meat Boy<br />World Record Attempt!</strong></a>
            <div class="slide-button"><a href="<?=$conf_blog?>events/demo-super-meat-boy-world-record/" class="button_link"><span>Read More</span></a></div>
            </div>
        </div>
      </li>

    </ul>	
</div>
<!--/ slider -->