<?php


$email = get_input('email');
$name = get_input('name');
$desc = get_input('description');
$body=<<<html
$email<br>
$desc
html;
elgg_make_sticky_form('apply');
if (!$email || !$name || !$desc) {
	register_error(elgg_echo("apply:required"));
	forward(REFERER);
}
if(!is_email_address($email)){
	register_error(elgg_echo("apply:email:failed"));
	forward(REFERER);
}

$subject=elgg_echo('apply').'-'.$name.'-'.$email;

$admins=elgg_get_admins();
foreach ($admins as $admin){
	$admin_guids[].=$admin->guid;
}
$recipient_guid = $admin_guids[ mt_rand(0, count($admin_guids) - 1) ];
$result=messages_send($subject, $body, $recipient_guid, 1);
if($result){
	elgg_clear_sticky_form('apply');
system_message(elgg_echo("apply:success"));
}else{
register_error(elgg_echo("apply:failed"));
forward(REFERER);
}