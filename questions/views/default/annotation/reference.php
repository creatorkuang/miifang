<?php
/**
 * Elgg generic comment view
 *
 * @uses $vars['annotation']  ElggAnnotation object
 * @uses $vars['full_view']   Display fill view or brief view
 */

if (!isset($vars['annotation'])) {
	return true;
}

$reference = $vars['annotation'];

$entity = get_entity($reference->entity_guid);
$reference_owner = get_user($reference->owner_guid);
if (!$entity || !$reference_owner) {
	return true;
}



$reference_owner_icon = elgg_view_entity_icon($reference_owner, 'tiny');
//Add a menu to the annotation

$menu = elgg_view_menu('annotation', array(
		'annotation' => $reference,
		'sort_by' => 'priority',
		'class' => 'elgg-menu-hz float-alt',
));
$reference_text = $reference->value;	
	$body = <<<HTML
<div class="mbn">
	$menu
	
	$reference_text
</div>
HTML;
echo elgg_view_image_block($reference_owner_icon,  $body);

