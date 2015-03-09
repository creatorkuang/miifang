<?php

/**
 * Prepare the add/edit form variables
 *
 * @param ElggObject $question A question object.
 * @return array
 */
function questions_prepare_form_vars($question = null) {

	// input names => defaults
	$values = array(
			'title' => '',
			'description' => '',
			'proccess' => '',
			'level' => '',
			'catagory' => '',
			'access_id' => ACCESS_DEFAULT,
			'tags' => '',
			'container_guid' => elgg_get_page_owner_guid(),
			'guid' => null,
			'entity' => $question,
			
	);

	if ($question) {
		foreach (array_keys($values) as $field) {
			if (isset($question->$field)) {
				$values[$field] = $question->$field;
			}
		}
	}

	if (elgg_is_sticky_form('question')) {
		$sticky_values = elgg_get_sticky_values('question');
		foreach ($sticky_values as $key => $value) {
			$values[$key] = $value;
		}
	}

	elgg_clear_sticky_form('question');

	return $values;
}


/**
 * Recurses the question tree and adds the breadcrumbs for all ancestors
 *
 * @param ElggObject $question Page entity
 */
function questions_prepare_parent_breadcrumbs($question) {
	if ($question && $question->parent_guid) {
		$parents = array();
		$parent = get_entity($question->parent_guid);
		while ($parent) {
			array_push($parents, $parent);
			$parent = get_entity($parent->parent_guid);
		}
		while ($parents) {
			$parent = array_pop($parents);
			if(!elgg_instanceof($parent, 'user')){
				elgg_push_breadcrumb($parent->title, $parent->getURL());
			}
			
		}
	}
}

/*
 * $guid the guid of the object
* $vars array();
*/
function related_objects_base_on_tags($guid,$limit,$vars = array()){

	// set the random related tags
	$object_tags=elgg_get_metadata(array('guids'=>$guid,'metastring_names'=>'tags'));
	if ($object_tags) {

		foreach ($object_tags as $tag)
		{
			$tag_list[] .=$tag->value_id;

		}
		$random_tag_id = $tag_list[ mt_rand(0, count($tag_list) - 1) ];

		$ramtag=get_metastring($random_tag_id);
		$object=get_entity($guid);
		$type=$object->getType();
		$subtype=$object->getSubtype();
		$defaults=array(

				'full_view'=>false,
				'pagination'=>false,
		);
		$vars = array_merge($defaults, $vars);
		$limit=$limit+1;
		$sametag_objects=elgg_get_entities_from_metadata(array(
				'metadata_names' => 'tags',
				'metadata_values' => $ramtag,
				'type' => $type,
				'subtype'=>$subtype,
				'limit'=>$limit
		));

		// delete the same object form related object result
		foreach ($sametag_objects as $stp){

			$stpguids[] .=$stp->getGUID();

		}
		$srlt=array_search("$guid",$stpguids);
		array_splice($sametag_objects,$srlt,1);

		return  elgg_view_entity_list($sametag_objects,$vars);

	}
}

// question get message by ajax
function question_get_messages_by_ajax(){
	$guid=get_input('owner_guid');
	
	$num_messages = (int)messages_count_unread();
	if ($num_messages != 0) {
		$list = elgg_list_entities_from_metadata(array(
				'type' => 'object',
				'subtype' => 'messages',
				'metadata_name_value_pairs' => array(
						'toId' =>$guid,
						'readYet' => 0,
				),
				'owner_guid' => $guid,
				'full_view' => false,
				'pagination' => false,
				'limit'=>5,
		));
	}else{
		$list=elgg_echo('messages:nomessages');
	}
	
	return $list;
	
}

function get_my_questions(){
	$title=elgg_echo('question:widget:ask');
	$owner=elgg_get_logged_in_user_entity();
	$questions=elgg_view_title($title);
	$questions .=elgg_list_entities(array(
			'type' => 'object',
			'subtype' => 'question-top',
			'limit' => 6,
			'owner_guid'=>$owner->guid,
			'full_view' => false,
			'pagination' => true,
			'list_class'=>'question-list brs ',
			'item_class'=>'question-item bx ',
			'view_toggle_type' => false
	));
	$body=elgg_view_layout('qq_two_column',array('content'=>$questions,'nav'=>''));
	$page=elgg_view_page($title,$body);
	return $page;
}

function get_questions_answer_by_me(){
	$title=elgg_echo('question:widget:answer');
	$owner=elgg_get_logged_in_user_entity();
	$questions=elgg_view_title($title);
	
	$questions .=elgg_list_entities(array(
			'type' => 'object',
			'subtype' => 'question',
			'limit' => 6,
			'owner_guid'=>$owner->guid,
			'full_view' => false,
			'pagination' => true,
			'list_class'=>'question-list brs ',
			'item_class'=>'question-item bx ',
			'view_toggle_type' => false
	));
	
	$body=elgg_view_layout('qq_two_column',array('content'=>$questions,'nav'=>''));
	$page=elgg_view_page($title,$body);
	return $page;
	
}

function get_better_list_based_on_thumbs($guid){
	$questions=elgg_get_entities_from_metadata(array(
			'type'=>'object',
			'subtype'=>'question',
			'metadata_name'=>'parent_guid',
			'metadata_value'=>$guid,
	));
	foreach ($questions as $object){
		$q_guids[].=$object->guid;
	}
	if($q_guids){
		$question_better_list=elgg_list_entities_from_annotation_calculation(array(
				'annotation_names'=>'thumbs',
				'guids'=>$q_guids,
				'list_class'=>'question-list brs',
				'item_class'=>'question-item bx',
				'limit'=>5,
	
		));
	}else{
		$question_better_list='';
	}
	
	return $question_better_list;
}