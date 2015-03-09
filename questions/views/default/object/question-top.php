<?php

/**
 * View for question object

*
* @uses $vars['entity']    The question object
* @uses $vars['full_view'] Whether to display the full view
* 
*/


$full = elgg_extract('full_view', $vars, FALSE);
$question = elgg_extract('entity', $vars, FALSE);

if (!$question) {
	return TRUE;
}
// links for thumbup and down action
$t_img=elgg_get_site_url().'mod/questions/graphics';
$t_up=elgg_view('output/img',array('src'=>$t_img.'/thumbup.png','title'=>'thumbs-up'));
$t_down=elgg_view('output/img',array('src'=>$t_img.'/thumbdown.png','title'=>'thumbs-down'));
$t_up_link=elgg_view('output/confirmlink',array(
		'href'=>"action/questions/thumbs?guid={$question->guid}&action_type=up",
		'text'=>$t_up,
		'is_action'=>true,
		
		));
$t_down_link=elgg_view('output/confirmlink',array(
		'href'=>"action/questions/thumbs?guid={$question->guid}&action_type=down",
		'text'=>$t_down,
		'is_action'=>true,
		
		));
//count the thumbs up and down amount
$t_sum=$question->getAnnotationsSum('thumbs');
if(!$t_sum){
	$t_sum=0;	
}
$thumb=<<<html
<div class="thumbs mrs">
$t_up_link
 $t_sum
$t_down_link
</div>
html;
$description = $question->description;
$title=$question->title;
$title_link=elgg_view('output/url',array('href'=>$question->getURL(),'text'=>$title));
$metadata = elgg_view_menu('entity', array(
		'entity' => $question,
		'handler' => 'questions',
		'sort_by' => 'priority',
		'class' => 'elgg-menu-hz',
));
$owner = $question->getOwnerEntity();
$owner_name=elgg_view('output/url',array('href'=>$owner->geturl(),'text'=>$owner->name));
//$owner_name=$owner->name;
$owner_icon = elgg_view_entity_icon($owner, 'small');
$ownerdecs=elgg_get_excerpt($owner->briefdescription);
$q_block=elgg_view_image_block($owner_icon, $title_link. $description);

$guid=$question->guid;
$follow=elgg_view('output/url',array(
		'href'=>elgg_get_site_url().'action/questions/follow?action_type=follow&question_guid='.$guid,
		'text'=>elgg_echo('question:follow'),
		'class'=>'elgg-button-submit brs pas',
		'is_action' => true
));

if (check_entity_relationship($uid, 'follow', $guid)){
	$follow=elgg_view('output/url',array(
			'href'=>elgg_get_site_url().'action/questions/follow?action_type=unfollow&question_guid='.$guid,
			'text'=>elgg_echo('question:unfollow'),
			'class'=>'elgg-button-submit brs pas',
			'is_action' => true

	));
}
$follow_num=elgg_get_entities_from_relationship(array('relationship'=>'follow','relationship_guid'=>$guid,'count'=>true,'inverse_relationship'=>true));
$follow_num=elgg_echo('question:follownum',array($follow_num));


if ($full&& !elgg_in_context('gallery')) {
echo <<<html
$thumb
<h2>$title  ?</h2>
<div class="pas">
$description
</div>
html;
}elseif (elgg_in_context('gallery')) {
	echo <<<html
	
	$thumb
	 <h4> $title_link ? </h4>	
	<div class="pas mtm">
	$follow $follow_num
	</div>
html;
}else{
	
	echo <<<html
	<div class="fr mas">$owner_icon</div>
	<div class="pas mbs">
	$thumb
	 <span> $owner_name , $ownerdecs </span>
	<h3> $title_link ?</h3>		
	$description
	
	</div>
	
html;
	
	

}	
