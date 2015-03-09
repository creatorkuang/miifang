<?php
/**
 * add a new question
 *
 */

gatekeeper();

$container_guid = (int) get_input('guid');
$container = get_entity($container_guid);
if (!$container) {

}

$title=elgg_echo("questions:add");
elgg_push_breadcrumb($title);
$vars = questions_prepare_form_vars();
$content = elgg_view_form('questions/save', array('id'=>'question_form'), $vars);

$body = elgg_view_layout('qq_two_column', array(
	
	'content' => $content,
	'title' => $title,
));

echo elgg_view_page($title, $body);
