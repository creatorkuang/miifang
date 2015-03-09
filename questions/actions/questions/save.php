<?php
$title = strip_tags(get_input('title'));
$description = get_input('description');
$tags = get_input('tags');
$proccess = get_input('proccess');
$level = get_input('level');
$cat = get_input('catagory');
$parent_guid = get_input('parent_guid');
if(!$parent_guid){
	$parent_guid=elgg_get_logged_in_user_guid();	
}
$question_guid = (int)get_input('question_guid');
$container=get_entity($parent_guid);

elgg_make_sticky_form('question');
if (!$title) {
	register_error(elgg_echo('questions:error:no_title'));
	forward(REFERER);
}
if ($question_guid) {
	$question = get_entity($question_guid);
	
	if (!elgg_instanceof($question,'object') || !$question->canEdit()) {
		register_error(elgg_echo('questions:error:no_save'));
		forward(REFERER);
	}
	$new_page = false;
} else {
	$question = new ElggObject();
	if(!elgg_instanceof($container, 'user')){
	$question->subtype = 'question';
	}else{
	$question->subtype = 'question-top';
	}
	$question->access_id = 1;

	$question->parent_guid=$parent_guid;
	
	$new_page = true;
}

$question->title = $title;
$question->description = $description;
$tagarray = string_to_tag_array($tags);
$question->tags = $tagarray;
$question->proccess = $proccess;
$question->level = $level;
$question->catagory = $cat;
// need to add check to make sure user can write to container



if ($question->save()) {

	elgg_clear_sticky_form('question');

	system_message(elgg_echo('questions:saved'));

	if ($new_page) {
		
		create_annotation($question->getGUID(), 'thumbs', 0,integer, 0, 2);
		add_to_river('river/object/question/create', 'create', elgg_get_logged_in_user_guid(), $question->getGUID(),1,0,0);
	}

	forward($question->getURL());
} else {
	register_error(elgg_echo('questions:error:no_save'));
	forward(REFERER);
}
?>