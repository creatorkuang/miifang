<?php
/**
 * New question river entry
 *
 * @package projects
 */

$object = $vars['item']->getObjectEntity();
$excerpt = elgg_get_excerpt($object->description,140);
if($excerpt){
$excerpt.=elgg_view('output/url',array('href'=>$object->getURL(),'text'=>'...More'));
}

echo elgg_view('river/elements/layout', array(
	'item' => $vars['item'],
	'message' =>$excerpt,

));
