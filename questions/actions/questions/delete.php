<?php
/**
 * Delete a question
 *
 * @package projects
 */

$guid = get_input('guid');
$question = get_entity($guid);

if (elgg_instanceof($question, 'object') && $question->canEdit()) {
	$container = get_entity($question->container_guid);
	
	// Bring all child elements forward
	$parent = $question->parent_guid;
	$children = elgg_get_entities_from_metadata(array(
			'metadata_name' => 'parent_guid',
			'metadata_value' => $question->getGUID()
	));
	if ($children) {
		foreach ($children as $child) {
			$child->parent_guid = $parent;
		}
	}
	if ($question->delete()) {
		system_message(elgg_echo("question:delete:success"));
		if ($parent) {
			if ($parent = get_entity($parent)) {
				forward($parent->getURL());
			}
		}
	}
}

register_error(elgg_echo("question:delete:failed"));
forward(REFERER);
