<?php
/**
 * questions start.php
 */

elgg_register_event_handler('init', 'system', 'questions_init');

function questions_init() {
	//register library for questions
	$root = dirname(__FILE__);
	elgg_register_library('elgg:questions', "$root/lib/questions.php");
	
	// Register actions
	$action_dir = "$root/actions";
	elgg_register_action('questions/save', "$action_dir/questions/save.php");
	elgg_register_action('questions/delete', "$action_dir/questions/delete.php");
	elgg_register_action('questions/thumbs', "$action_dir/questions/thumbs.php");
	elgg_register_action('references/add', "$action_dir/references/add.php");
	elgg_register_action('references/delete', "$action_dir/references/delete.php");
	
	//featured action
	elgg_register_action('questions/follow', "$action_dir/questions/follow.php");
	
	//register widget
	elgg_register_widget_type('question-top', elgg_echo("Questions"), elgg_echo("question-top:widget:description"));
	elgg_register_widget_type('question', elgg_echo("Answers"), elgg_echo("question:widget:description"));
	elgg_register_widget_type('friendsof', elgg_echo("Followers"), elgg_echo("follower:widget:description"));
	
        elgg_register_entity_type('object', 'question');
	elgg_register_entity_type('object', 'question-top');

	// Extend the main CSS file
	elgg_extend_view('css/elgg', 'questions/css');

	// Add a menu item to the main site menu
	$item = new ElggMenuItem('questions', elgg_echo('questions:menu'), 'questions/all');
	elgg_register_menu_item('site', $item);
	
	
	//register page_handler
	elgg_register_page_handler('questions', 'questions_page_handler');
	
	// Register a URL handler for questions
	elgg_register_entity_url_handler('object', 'question', 'question_url');
	elgg_register_entity_url_handler('object', 'question-top', 'question_url');
	elgg_register_plugin_hook_handler('register', 'menu:entity', 'questions_entity_menu_setup');
	
	elgg_register_plugin_hook_handler('register', 'menu:annotation', 'reference_annotation_menu_setup');
}
function questions_page_handler($page) {

	elgg_load_library('elgg:questions');

	

	elgg_push_breadcrumb(elgg_echo('questions:everyone'), 'questions/all');

	$pages = dirname(__FILE__) . '/pages/questions';

	
	switch ($page[0]) {
		case 'owner':
			include "$pages/owner.php";
			break;
		case 'friends':
			include "$pages/friends.php";
			break;
		case 'view':
			set_input('guid', $page[1]);
			include "$pages/view.php";
			break;
		case 'add':
			set_input('guid', $page[1]);
			include "$pages/add.php";
			break;
		case 'edit':
			set_input('guid', $page[1]);
			include "$pages/edit.php";
			break;
		case 'all':
			include "$pages/all.php";
			break;
		case 'inbox':
			gatekeeper();
			$params=question_get_messages_by_ajax();

			break;
		case 'mine':
			$params=get_my_questions();
			break;
		case 'answer':
			$params=get_questions_answer_by_me();
			break;
		default:
			return false;
		
	}
	echo $params;
	return true;
}

function question_url($entity) {
	global $CONFIG;

	$title = $entity->title;
	$title = elgg_get_friendly_title($title);
	return $CONFIG->url . "questions/view/" . $entity->getGUID() . "/" . $title;
}

//add a delete link to the reference annotation
function reference_annotation_menu_setup($hook, $type, $return, $params) {
	$annotation = $params['annotation'];

	if ($annotation->name == 'reference' && $annotation->canEdit()) {
		$url = elgg_http_add_url_query_elements('action/references/delete', array(
				'annotation_id' => $annotation->id,
		));

		$options = array(
				'name' => 'delete',
				'href' => $url,
				'text' => "<span class=\"elgg-icon elgg-icon-delete\"></span>",
				'confirm' => elgg_echo('deleteconfirm'),
				'encode_text' => false
		);
		$return[] = ElggMenuItem::factory($options);
	}

	return $return;
}
function questions_entity_menu_setup($hook, $type, $return, $params) {
	if (elgg_in_context('widgets')) {
		return $return;
	}

	$entity = $params['entity'];
	$handler = elgg_extract('handler', $params, false);

	

	foreach ($return as $index => $item) {
		if (in_array($item->getName(), array('access','likes'))) {
			unset($return[$index]);
		}
	}

	return $return;
}