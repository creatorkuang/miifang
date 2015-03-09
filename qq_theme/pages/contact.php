<?php
$title=elgg_echo('help:contact');
$site_url=elgg_get_site_url();


$content=<<<HTML
<div class="pal">
Contact：
<a href="mailto:contact@miifang.com">contact@miifang.com</a>
</div>
HTML;
$body=elgg_view_layout('ib_help',array('help_content'=>$content));

echo elgg_view_page($title,$body);
?>