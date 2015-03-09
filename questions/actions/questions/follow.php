<?php
/**
 * Feature a question
 *
 * @package Elggincubator
 */

$question_guid = get_input('question_guid');
$action = get_input('action_type');
$uid=elgg_get_logged_in_user_guid();
$question = get_entity($question_guid);

if (!elgg_instanceof($question,'object')) {
	register_error(elgg_echo('not question'));
	forward(REFERER);
}

//get the action, is it to feature or unfeature
if ($action == "follow") {
	add_entity_relationship($uid, 'follow', $question_guid);
	system_message(elgg_echo('questions:follow'));
	
	add_to_river('river/relationship/follow', 'follow', $uid, $question_guid);	
} else {
	remove_entity_relationship($uid, 'follow', $question_guid);
	system_message(elgg_echo('questions:unfollow'));
}

forward(REFERER);
