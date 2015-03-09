<?php
$item_id=get_input('item_id');
$user_id=get_input('user_id');

$items=elgg_get_river(array('id'=>$item_id));
$item=$items[0];
$object = $item->getObjectEntity();
$object_owner=$object->owner_guid;
if($user_id==$object_owner){
	register_error(elgg_echo('could not forward your own questions'));
	forward(REFERER);
}
$question_guid=$object->getGUID();

if (!elgg_instanceof($object,'object')) {
	register_error(elgg_echo('not question'));
	forward(REFERER);
}


add_entity_relationship($user_id, 'forward', $question_guid);

add_to_river('river/relationship/forward', 'forward', $user_id, $question_guid,'',0,$item_id);

forward(REFERER);

