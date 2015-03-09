<?php
/**
 * Elgg page header
 * In the default theme, the header lives between the topbar and main content area.
 */

// link back to main site.
echo elgg_view('page/elements/header_logo', $vars);
if(!elgg_is_logged_in()){
echo elgg_view('output/url',array('href'=>'/','text'=>elgg_view_icon('user').elgg_echo('login'),'class'=>'fr mtm mrs','style'=>'color:white'));	
}else{

$user=elgg_get_logged_in_user_entity();

//header left menu
$htabs=array(
		'home' => array(
			'text' => elgg_echo('menu:index'),
			'href' => 'activity',
			'title'=>elgg_echo('menu:index'),
		
			'priority' => 200,
		),

		'all' => array(
			'text' => elgg_echo('menu:all'),
			'href' => 'questions/all',
			'title'=>elgg_echo('menu:all'),
			'priority' => 300,
		),
		'ask' => array(
			'text' => elgg_echo('sitename'),
			'href' => 'questions/add/'.elgg_get_logged_in_user_guid(),
			'title'=>elgg_echo('sitename'),
			'priority' => 400,

		),

);

foreach ($htabs as $name => $htab) {
	$htab['name'] = $name;

	elgg_register_menu_item('htabs', $htab);
}
$menu=elgg_view_menu('htabs',array('sort_by' => 'priority', 'class' => 'elgg-menu-hz'));

echo $menu;

$mail=elgg_view('output/url',array('text' =>elgg_echo('messages:message'),
		'style'=>"padding:10px 5px;",
		'id'=>'inbox',
		'href' => '#inbox_link',
		'rel' => 'popup',
		));
$num_messages = (int)messages_count_unread();
if ($num_messages != 0) {
	$mail .= "<li id=\"header-messages-new\">$num_messages</li>";
}
$logout=elgg_view('output/url',array(
		'text' =>elgg_view_icon('delete').elgg_echo('menu:logout'),
		'href' => '/action/logout',
		'is_action' => TRUE,));
$settting=elgg_view('output/url',array(
		'text' =>elgg_view_icon('settings').elgg_echo('menu:setting'),
		'href' => '/settings/user/'.$user->username,		
		));
$profile=elgg_view('output/url',array(
		'text' =>elgg_view_icon('user').elgg_echo('menu:profile'),
		'href' => '/profile/'.$user->username,	
));
$friends=elgg_view('output/url',array(
		'text' =>elgg_view_icon('users').elgg_echo('menu:friendsof'),
		'href' => '/friendsof/'.$user->username,
));


$user_icon = elgg_view('output/img', array(
		'src' => $user->getIconURL('tiny'),
		'width' =>25,
		'height' =>25,
));

$account=elgg_view('output/url',array(
		'text' =>$user_icon,
		'href' => 'javascript:void(0)',	
		'style'=>"padding:8px 5px 0;",
));
$mail_all=elgg_view('output/url',array('href'=>'messages/inbox/'.$user->username,'text' =>elgg_echo('item:object:messages')));
$mail_content=<<<html
<div id="inbox-content" class="pbs"></div>
$mail_all
html;
$mail_box=elgg_view_module('dropdown', elgg_echo('messages:new'), $mail_content,array('id'=>'inbox_link','class' => 'hidden w400'));
$js=<<<js
<script type="text/javascript">
$(document).ready(function(){
	$('#menus > li').each(function(){
		$(this).hover(
			function(){
				$(this).find('ul:eq(0)').show();
			},
			function(){
				$(this).find('ul:eq(0)').hide();
			}
		);
	});
	$('#inbox').click(function(){
		elgg.get('/questions/inbox', {
		      data:{owner_guid:elgg.get_logged_in_user_guid()},
		      success: function(resultText, success, xhr) {
	       	      $('#inbox-content').html(resultText);
    				}
			});
		});
   
		
	
});
</script>
js;
echo <<<html
<span id='menubar' class="fr ">
<ul id='menus' class="menus ">
	<li >$mail$mail_box</li>
	
	<li> $account
  	<ul style="display:none">
  		<li class="children">$profile</li>
  		<li class="children">$friends</li>
  		<li class="children">$settting</li>
  		<li class="children">$logout</li>
  	</ul>
	</li>
	
</ul>

</span>
$js
html;
}

?>
