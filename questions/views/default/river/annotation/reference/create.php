<?php
/**
 * Post reference river view
 */
$object = $vars['item']->getObjectEntity();
$reference = $vars['item']->getAnnotation();


echo elgg_view('river/elements/layout', array(
	'item' => $vars['item'],
	'message' => $reference->value,
));
