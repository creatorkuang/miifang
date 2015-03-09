<?php
/**
 * All questions  
 *
 */
if (!elgg_is_logged_in()){
	forward('');
}

elgg_register_title_button();
$offset = (int)get_input('offset', 0);
$selected_tab = get_input('filter','recommend');
switch ($selected_tab) {
	case 'hottest':
		$content = elgg_list_entities_from_relationship_count(array(
		'type' => 'object',
		'subtype' => 'question-top',
		'relationship'=>'follow',
		'limit' => 6,
		'offset' => $offset,
		'full_view' => false,
		'pagination' => true,
		'list_class'=>'question-list brs',
		'item_class'=>'question-item bx',
		'view_toggle_type' => false
		));
		if (!$content) {
			$content = elgg_echo('questions:none');
		}
		break;
	case 'recommend':
		$content = elgg_list_entities_from_annotation_calculation(array(
		'type' => 'object',
		'subtype' => 'question-top',
		'limit' => 6,
		'annotation_names' =>'thumbs',
		'offset' => $offset,
		'pagination' => true,
		'full_view' => false,
		'list_class'=>'question-list brs',
		'item_class'=>'question-item bx',
		'view_toggle_type' => false
		));

		if (!$content) {
			$content = elgg_echo('questions:none');
		}
		break;
	case 'newest':
	default:
		$content = elgg_list_entities(array(
		'type' => 'object',
		'subtype' =>  array('question','question-top'),
		'limit' => 6,
		'offset' => $offset,
		'full_view' => false,
		'pagination' => true,
		'list_class'=>'question-list brs',
		'item_class'=>'question-item bx',
		'view_toggle_type' => false
	));
		if (!$content) {
			$content = elgg_echo('questions:none');
		}
		break;
}
$fliter = elgg_view('questions/fliter_menu', array('selected' => $selected_tab));



$title = elgg_echo('questions:everyone');

$body = elgg_view_layout('one_column', array(
	'fliter'=>$fliter,
	'content' => $content,
	'title' => $title,
	'nav'=>'',
	
));

echo elgg_view_page($title, $body);