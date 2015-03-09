<?php
 
    function qq_theme_init() {
        elgg_extend_view('css/elgg', 'qq_theme/css');
     
        elgg_register_plugin_hook_handler('index', 'system', 'qq_index');
        
        $menus=array('about','jobs','service','privacy','feedback','contact','apply');
        foreach($menus as $menu){
       elgg_register_page_handler($menu, $menu.'_page_handler');       
        }
       //re-register river page
       elgg_register_page_handler('activity', 'river_page_handler');
       
       //re-construct the notification setting page
       elgg_register_page_handler('notifications', 'qq_notifications_page_handler');
       // re-construct the avater and profile edit page
       elgg_register_page_handler('avatar', 'qq_avatar_page_handler');
       elgg_register_page_handler('profile', 'qq_profile_page_handler');
       elgg_register_page_handler('settings', 'qq_usersettings_page_handler');
       
       //unregister the file page handler and menu and widget
       elgg_unregister_page_handler('file');
       elgg_unregister_plugin_hook_handler('register', 'menu:owner_block', 'file_owner_block_menu');
       elgg_unregister_widget_type('filerepo');
       
       // re-construct the friends and friendsof page
       elgg_register_page_handler('friends', 'qq_friends_page');
       elgg_register_page_handler('friendsof', 'qq_friendsof_page');
      
       elgg_register_simplecache_view('qq_theme/css');
       elgg_register_simplecache_view('page/elements/header');
       
    // action
       $root = dirname(__FILE__);
       elgg_register_action('apply', "$root/actions/apply.php",'public');
       elgg_register_action('feedback', "$root/actions/feedback.php");
       
       elgg_register_action('forward', "$root/actions/forward.php");
       
      //unregister comment and add other link
      elgg_register_plugin_hook_handler('register', 'menu:river', 'question_river_menu_setup');
    
      //ajax controller page
      elgg_register_page_handler('qq_ajax', 'qq_ajax_page_handler');
      elgg_register_library('elgg:qq_ajax', "$root/lib/qq_ajax.php");
      
     
    
    }
 function qq_index() {
 	
    if (!include_once(dirname(dirname(__FILE__)) . "/qq_theme/pages/index.php"))
        return false;
 
    return true;
}


function apply_page_handler() {
	
	include(dirname(dirname(__FILE__)) . "/qq_theme/pages/apply.php");
	return true;
}


function about_page_handler() {
	include(dirname(dirname(__FILE__)) . "/qq_theme/pages/about.php");
	return true;
}
function contact_page_handler() {
	include(dirname(dirname(__FILE__)) . "/qq_theme/pages/contact.php");
	return true;
}
function service_page_handler() {
	include(dirname(dirname(__FILE__)) . "/qq_theme/pages/service.php");
	return true;
}
function privacy_page_handler() {
	include(dirname(dirname(__FILE__)) . "/qq_theme/pages/privacy.php");
	return true;
}
function feedback_page_handler() {
	include(dirname(dirname(__FILE__)) . "/qq_theme/pages/feedback.php");
	return true;
}
function jobs_page_handler() {
	include(dirname(dirname(__FILE__)) . "/qq_theme/pages/jobs.php");
	return true;
}

function river_page_handler() {
	include(dirname(dirname(__FILE__)) . "/qq_theme/pages/river.php");
	return true;
}

function qq_friends_page($page) {
	$username=$page[0];
	$user=get_user_by_username($username);
	set_page_owner($user->getGUID());
	include(dirname(dirname(__FILE__)) . "/qq_theme/pages/friends/index.php");
	return true;
}
function qq_friendsof_page($page) {
	$username=$page[0];
	$user=get_user_by_username($username);
	set_page_owner($user->getGUID());
	include(dirname(dirname(__FILE__)) . "/qq_theme/pages/friends/of.php");
	return true;
}

function question_river_menu_setup($hook, $type, $return, $params){
	if (elgg_is_logged_in()) {
		foreach ($return as $index => $item) {
			if (in_array($item->getName(), array('comment'))) {
				unset($return[$index]);
			}
		}
		$item = $params['item'];
		$object = $item->getObjectEntity();
		if($item->annotation_id != 0 || !$object || $item->action_type=='follow'){
			return $return;
		}
		if (elgg_instanceof($object, 'object','question-top')||elgg_instanceof($object, 'object','question')) {
			
			$options = array(
					'name' => 'question',
					'href' => "#question-$object->guid",
					'text' => elgg_view_icon('speech-bubble'),
					'title' => elgg_echo('question:this'),
					'rel' => 'toggle',
					'priority' => 50,
			);
			$return[] = ElggMenuItem::factory($options);
			//forward
			$item_id=$item->id;
			$options = array(
					'name' => 'forward',
					'href'=>elgg_get_site_url().'action/forward?item_id='.$item_id.'&user_id='.elgg_get_logged_in_user_guid(),
					'is_action'=>true,
					'id' => "forward-$object->guid",
					'text' => elgg_view_icon('redo'),
					'title' => elgg_echo('forward:this'),
					'priority' => 40,
			);
			$return[] = ElggMenuItem::factory($options);
		}
		
		
		
		
		
	}

	return $return;
}

function qq_ajax_page_handler($page){
	elgg_load_library('elgg:qq_ajax');
	$pages = dirname(__FILE__) . '/pages/qq_ajax';
	switch ($page[0]) {
		case 'question_update':
			$params=qq_ajax_get_questions();
			break;
		case 'follow_update':
			$params=qq_ajax_get_follow_update();
			break;
	
		default:
			return false;
	}
	echo $params;
	return true;
	
}

function qq_notifications_page_handler(){
	if (!isset($page[0])) {
		$page[0] = 'personal';
	}
	
	$base = elgg_get_plugins_path() . 'notifications';
	
	include(dirname(dirname(__FILE__)) . "/qq_theme/pages/notifications/index.php");
	
	return true;
}

function qq_avatar_page_handler($page){
	global $CONFIG;
	$user=get_user_by_username($page[1]);
	if($user){
		elgg_set_page_owner_guid($user->getGUID());
	}
	if($page[0]=='edit'){
		include(dirname(dirname(__FILE__)) . "/qq_theme/pages/avatar/edit.php");	
		return true;
	}else{
		return elgg_avatar_page_handler($page);
	}
	return false;
}

function qq_profile_page_handler($page){
	global $CONFIG;

  $user = get_user_by_username($page[0]);
 elgg_set_page_owner_guid($user->guid);

 if ($page[1] == 'edit') {
    include(dirname(dirname(__FILE__)) . "/qq_theme/pages/profile/edit.php");
      return true;
   }else{
    return profile_page_handler($page);
   	
   }
   return false;
	
}
function qq_usersettings_page_handler($page) {
	global $CONFIG;

	if (!isset($page[0])) {
		$page[0] = 'user';
	}

	if (isset($page[1])) {
		$user = get_user_by_username($page[1]);
		elgg_set_page_owner_guid($user->guid);
	} else {
		$user = elgg_get_logged_in_user_guid();
		elgg_set_page_owner_guid($user->guid);
	}

	elgg_push_breadcrumb(elgg_echo('settings'), "settings/user/$user->username");

	
	if($page[0]=='user'){
		include(dirname(dirname(__FILE__)) . "/qq_theme/pages/settings/account.php");
		return true;
	}else{
		return usersettings_page_handler($page);
	}


}
    elgg_register_event_handler('init', 'system', 'qq_theme_init');
   
?>