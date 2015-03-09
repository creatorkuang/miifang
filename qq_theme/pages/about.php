<?php
$title=elgg_echo('help:privacy');
$site_url=elgg_get_site_url();

$content=<<<HTML
<h3>About Miifang：</h3>
<p>Miifang is a social Q&A platform that focus on solving question of unknown world.</p>
<h3>Vision：</h3>
<p>Collective intelligence to explore unknown world.</p>
<h3>Why we build miifang?：</h3>
<p>As you know, most of the Q&A platform are focus on helping you to solve the problem that someone else in the world might know the answer, which i called solving problem in known world. But for unknown world,maybe nobody could give you the answer,but most of us could help you see the different aspect of the question by questioning you a question and giving you some related references or cues.So we create miifang for collecting intelligence from crowd to give you more useful questions and references so that you could find your way to the answer quickly. </p>
HTML;
$body=elgg_view_layout('ib_help',array('help_content'=>$content));

echo elgg_view_page($title,$body);
?>