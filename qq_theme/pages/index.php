<?php 
if(elgg_is_logged_in()){
	forward('activity');
}

$logo=elgg_view('output/img',array('src'=>elgg_get_site_url().'mod/qq_theme/graphics/logo.png','title'=>elgg_echo('sitename')));

$login_url = elgg_get_site_url();
if (elgg_get_config('http_login')) {
	$login_url = str_replace("http:", "http:", elgg_get_site_url());
}
$login=elgg_view_form('index-login', array('action' => "{$login_url}action/login"), array('returntoreferer' => TRUE));

$slogan=elgg_echo('slogan');
$apply=elgg_view('output/url',array('href'=>'register','text'=>elgg_echo('Sign up'),'class'=>'elgg-button-index','style'=>'padding:10px 20px;font-size:2em;'));
$footer=elgg_view('page/elements/footer');
$body=<<<html

<div id='index-top' class="pam">
	<div class="fl mtm">
	$logo
	<div id='slogan' class="pas">
	$slogan
	</div>	
	</div>
	<div class="fl w300 mal">
	 $login
	</div>
	<div class="clearfloat"></div>
	
</div> 
<div id='index-bottom'>
	<div id="apply">
	$apply
	</div>
	<div style="margin-top:10%;margin-left:30%">
	$footer
	</div>
</div>

html;
echo elgg_view_page($title,$body,'index');
?>