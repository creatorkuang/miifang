<?php
/**
 * edit question page
 *

 */
gatekeeper();

$question_guid = get_input('guid');
$question = get_entity($question_guid);

if (!elgg_instanceof($question, 'object') || !$question->canEdit()) {
	register_error(elgg_echo('questions:unknown question'));
	forward(REFERRER);
}


$title = elgg_echo('question:edit');
elgg_push_breadcrumb($title);

$vars = questions_prepare_form_vars($question);
$content = elgg_view_form('questions/save', array(), $vars);

$body = elgg_view_layout('one_column', array(
	'filter' => '',
	'content' => $content,
	'title' => $title,
));

echo elgg_view_page($title, $body);