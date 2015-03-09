<?php
/**
 * Layout for main column with one sidebar
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['content'] Content HTML for the main column
 * @uses $vars['sidebar'] Optional content that is displayed in the sidebar
 * @uses $vars['class']   Additional class to apply to layout
 * @uses $vars['nav']     HTML of the page nav (override) (default: breadcrumbs)
 */

$class = 'elgg-layout  clearfix brs pas mbl';
if (isset($vars['class'])) {
	$class = "$class {$vars['class']}";
}

// navigation defaults to breadcrumbs
$nav = elgg_extract('nav', $vars, elgg_view('navigation/breadcrumbs'));
$user=elgg_get_logged_in_user_entity();
$user_icon=elgg_view_entity_icon($user,'medium');
$user_name=elgg_view('output/url',array('href'=>$user->getURL(),'text'=>$user->name));

$follow_num=elgg_get_entities_from_relationship(array(
		'relationship' => 'friend',
		'relationship_guid' => $user->getGUID(),
		'inverse_relationship' => FALSE,
		'type' => 'user',
		'count'=>true,
));
if(!$follow_num){
	$follow_num=0;
}
$follower_num=elgg_get_entities_from_relationship(array(
		'relationship' => 'friend',
		'relationship_guid' => $user->getGUID(),
		'inverse_relationship' => true,
		'type' => 'user',
		'count'=>true,
));
if(!$follow_num){
	$follow_num=0;
}

$follow_link=elgg_view('output/url',array(
		'text' => '<h3>'.$follow_num.'</h3><span>'.elgg_echo('menu:friends').'</span>',
		'href' => 'friends/'.$user->username));
$follower_link=elgg_view('output/url',array(
		'text' => '<h3>'.$follower_num.'</h3><span>'.elgg_echo('menu:friendsof').'</span>',
		'href' => 'friendsof/'.$user->username));

?>
<div class="container <?php echo $class; ?>" style="background:whitesmoke">
	<div class="elgg-col-1of6 fl ">
		
		<div class="pas center mtm elgg-divide-bottom">
			<?php echo $user_icon  ?>
			<h2><?php echo $user_name ?></h2>
			
			<span class="inblock pbs">
			<?php echo $follow_link?>
			</span>
			<span class="inblock pbs">
			<?php echo $follower_link?>
			</span>
			
		</div>
	
<?php 
$sidebar_tabs=array(
		'home' => array(
				'text' => elgg_view_icon('refresh').elgg_echo('menu:activity'),
				'href' => 'activity',
				'priority' => 200,
		),		
		'all' => array(
				'text' => elgg_view_icon('search').elgg_echo('sidebar:menu:all'),
				'href' => 'questions/all',
				
				'priority' => 300,
		),
		'ask' => array(
				'text' => elgg_view_icon('speech-bubble ').elgg_echo('menu:ask'),
				'href' => 'questions/add/'.elgg_get_logged_in_user_guid(),
				'priority' => 400,		
		),
	);
foreach ($sidebar_tabs as $name => $sidebar_tab) {
	$sidebar_tab['name'] = $name;

	elgg_register_menu_item('sidebar_tabs', $sidebar_tab);
}
$menu1=elgg_view_menu('sidebar_tabs',array('sort_by' => 'priority', 'class' => 'elgg-menu-hz sidebar-menu center'));
echo $menu1;
echo "<div class=\" elgg-divide-bottom\"></div>";
$sidebar_tab2s=array(
		'question' => array(
				'text' => elgg_echo('question:widget:ask'),
				'href' => 'questions/mine',
				'priority' => 200,
		),
		'answer' => array(
				'text' => elgg_echo('question:widget:answer'),
				'href' => 'questions/answer',

				'priority' => 300,
		),
		'notification' => array(
				'text' => elgg_echo('notifications:subscriptions:changesettings'),
				'href' => 'notifications/personal',
				'priority' => 400,
		),
		'settings' => array(
				'text' => elgg_echo('menu:account'),
				'href' =>'settings/user/'.$user->username,
				'priority' => 500,
		),
		'profile' => array(
				'text' => elgg_echo('profile:edit'),
				'href' =>'profile/'.$user->username.'/edit',
				'priority' => 600,
		),
);
foreach ($sidebar_tab2s as $name => $sidebar_tab2) {
	$sidebar_tab2['name'] = $name;

	elgg_register_menu_item('sidebar_tab2s', $sidebar_tab2);
}
$menu2=elgg_view_menu('sidebar_tab2s',array('sort_by' => 'priority', 'class' => 'elgg-menu-hz sidebar-menu center'));

echo $menu2;
echo "<div class=\" elgg-divide-bottom\"></div>";
?>	
	
	
	<?php if (isset($vars['sidebar'])) {
				echo $vars['sidebar'];
			}?>	
	
</div>
	<div class="elgg-col-5of6 fl" style="background:white;">
		<div class="elgg-main">
		<?php
			echo $nav;
			
			if (isset($vars['title'])) {
				echo elgg_view_title($vars['title']);
			}
		
			if (isset($vars['content'])) {
				echo $vars['content'];
			}
		?>
		</div>
		
	</div>
</div>

