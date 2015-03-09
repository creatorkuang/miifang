<?php
$object = $vars['item']->getObjectEntity();
$id = $vars['item']->annotation_id;
$message=elgg_list_river(array('id'=>$id,'list_class'=>'forward-list'));



echo elgg_view('river/elements/layout', array(
		'item' => $vars['item'],
		'message' => $message,
));
