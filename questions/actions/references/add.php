<?php
/**
 * Elgg add references action
 *
 */


$title = strip_tags(get_input('title'));
$address = get_input('address');
$container_guid = get_input('container_guid');

if ($address && !preg_match("#^((ht|f)tps?:)?//#i", $address)) {
	$address = "http://$address";
}

// Let's see if we can get an entity with the specified GUID
$entity = get_entity($container_guid);
if (!$entity) {
	register_error(elgg_echo("question:notfound"));
	forward(REFERER);
}

$referene_link=elgg_view('output/url',array('href'=>$address,'is_trusted'=>true,'text'=>$title,'target'=>'blank'));
$user = elgg_get_logged_in_user_entity();

$annotation = create_annotation($entity->guid,
								'reference',
								$referene_link,
								"",
								$user->guid,
								$entity->access_id);

// tell user annotation posted
if (!$annotation) {
	register_error(elgg_echo("reference:failure"));
	forward(REFERER);
}

// notify if poster wasn't owner
if ($entity->owner_guid != $user->guid) {

	notify_user($entity->owner_guid,
				$user->guid,
				elgg_echo('reference:subject'),
				elgg_echo('reference:body', array(
					$user->name,
					$entity->getURL(),
					$entity->title,
					$referene_link,
				))
			);
} 

system_message(elgg_echo("reference:posted"));

//add to river
add_to_river('river/annotation/reference/create', 'reference', $user->guid, $entity->guid, "", 0, $annotation);

// Forward to the page the action occurred on
forward(REFERER);
