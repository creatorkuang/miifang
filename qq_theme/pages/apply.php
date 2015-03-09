<?php
$logo=elgg_view('output/img',array('src'=>elgg_get_site_url().'mod/qq_theme/graphics/logo.png','title'=>'Q&Q'));
$logo=elgg_view('output/url',array('href'=>elgg_get_site_url(),'text'=>$logo));
$slogan=elgg_echo('slogan');

$apply=elgg_view_form('apply');

$body=<<<html
<div id='index-top' class="pam">
	<div class="fl mtm">
	$logo
	<div id='slogan' class="pas">
	$slogan
	</div>
	</div>
	<div class="fl w300 mal">
	 $apply
	</div>

	
</div> 


html;

echo elgg_view_page($title,$body,'index');