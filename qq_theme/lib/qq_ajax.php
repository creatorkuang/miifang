<?php 
function qq_ajax_get_questions(){
	$guid=get_input('guid');
	$questions=elgg_get_entities_from_relationship(array(
			'type'=>'object',
			'subtype'=>array('question','question-top'),
			'relationship'=>'follow',
			'inverse_relationship'=>FALSE,
			'relationship_guid'=>$guid,
			));
	foreach($questions as $question){
		$object_guids[].=$question->getGUID();
	}
        if(!$object_guids){
         $river=elgg_echo('river:no question');
         }else{
	$river =elgg_list_river(array(
			'object_guids'=>$object_guids,
			'action_types'=>array('create','reference'),
			'pagenation'=>true,
			'limit'=>15
			));
	
	}
        return $river;
}

function qq_ajax_get_follow_update(){
	$guid=get_input('guid');
	
	if(!$guid){
         $river=elgg_echo('river:not follow');
         }else{
         $river=elgg_list_river(array(
			'relationship'=>'friend',
			'relationship_guid'=>$guid,
			'pagenation'=>true,
			'limit'=>15
			));
         }
        return $river;
}