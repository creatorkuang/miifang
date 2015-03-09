<?php
/**
 * Question thumb up and down  action
*
*/

$entity_guid = (int) get_input('guid');
$action=get_input('action_type');

//check to see if the user has already thumbs up or down the questions
if (elgg_annotation_exists($entity_guid, 'thumbs')){
	system_message(elgg_echo("thumbs:already"));
	forward(REFERER);
}
// Let's see if we can get an entity with the specified GUID
$entity = get_entity($entity_guid);
if (!$entity) {
	register_error(elgg_echo("thumbs:notfound"));
	forward(REFERER);
}
if($action=="up"||$action=="down"){
	$user = elgg_get_logged_in_user_entity();
	if($action=="up"){
		$annotation = create_annotation($entity->guid,
				'thumbs',
				"1",
				"",
				$user->guid,
				2);
		$thumbup=true;
	}else{
		$annotation = create_annotation($entity->guid,
				'thumbs',
				"-1",
				"",
				$user->guid,
				2);
	}
}


// tell user annotation didn't work if that is the case
if (!$annotation) {
	register_error(elgg_echo("thumbs:failure"));
	forward(REFERER);
}

if($thumbup){
system_message(elgg_echo("thumbsup:success"));
}else{
system_message(elgg_echo("thumbsdown:success"));
}


forward(REFERER);
