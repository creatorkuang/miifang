<?php
$title=elgg_echo('help:jobs');
$site_url=elgg_get_site_url();

$content=<<<HTML
<div class="pal">
<h2>Working at miifang：</h2>
<p>Miifang is a growing team that just need someone like you who is passion with web application and science research.
If you are a geek who believe in Web application innovation could challenge the status quo and totaly believe that your are a genius for this,
please contact us <a href="mailto:jobs@miifang.com">jobs@miifang.com</a> as soon as possible.Let's rock the world together!</p>
</div>
HTML;
$body=elgg_view_layout('ib_help',array('help_content'=>$content));

echo elgg_view_page($title,$body);
?>