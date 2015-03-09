<?php
/**
 * Elgg question widget view
 *
 * @package Elggquestion
 */


$num = $vars['entity']->num_display;

$options = array(
	'type' => 'object',
	'subtype' => 'question-top',
	'container_guid' => $vars['entity']->owner_guid,
	'limit' => $num,
	'full_view' => FALSE,
	'pagination' => FALSE,
	'list_type'=>'gallery',
	'list_class'=>'question-list',
	'item_class'=>'w pbm mbs elgg-divide-bottom',
);
$content = elgg_list_entities($options);

echo $content;

if ($content) {
	$url = "questions/mine/" . elgg_get_page_owner_entity()->username;
	$more_link = elgg_view('output/url', array(
		'href' => $url,
		'text' => elgg_echo('question:more'),
		'is_trusted' => true,
	));
	echo "<span class=\"elgg-widget-more\">$more_link</span>";
} else {
	echo elgg_echo('question:none');
}
