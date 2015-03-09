<?php

// Ensure we're logged in
if (!elgg_is_logged_in()) {
	forward();
}

// Make sure we can get the comment in question
$annotation_id = (int) get_input('annotation_id');
if ($reference = elgg_get_annotation_from_id($annotation_id)) {

	$entity = get_entity($reference->entity_guid);

	if ($reference->canEdit()) {
		$reference->delete();
		system_message(elgg_echo("reference:deleted"));
		forward($entity->getURL());
	}

} else {
	$url = "";
}

register_error(elgg_echo("reference:notdeleted"));
forward(REFERER);