<?php
/**
 * question view page
*
* @package Elggquestions
*/

$guid =get_input('guid');
$question = get_entity($guid);
$title = $question->title;
$proccess=$question->proccess;
$level=$question->level;
$cat=$question->catagory;


questions_prepare_parent_breadcrumbs($question);
elgg_push_breadcrumb($title);


$question_entity = elgg_view_entity($question, array('full_view' => true));

$q_question=elgg_view('output/url',array(
		'href' => '#q-form',
		'rel' => 'toggle',
		'text' => elgg_echo('question:question'),
		'style'=>'border:1px solid #ccc;padding:5px 15px',
		'class'=>'brl elgg-button-submit f1h '
));
$question_form = elgg_view_form('questions/save','', array('parent_guid'=>$guid,'proccess'=>$proccess,'catagory'=>$cat,'level'=>$level));
$q_question.=elgg_view_module('widget', '', $question_form,array('id'=>'q-form','class'=>'hidden w900'));




$uid=elgg_get_logged_in_user_guid();
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

$owner = $question->getOwnerEntity();
if(elgg_instanceof($owner,'user')){
$owner_name=$owner->name;
$owner_icon = elgg_view_entity_icon($owner, 'small');
$ownerdecs=elgg_view('output/longtext', array('value' => $owner->description));
$ownerbrief=$owner->briefdescription;
}
$metadata = elgg_view_menu('entity', array(
		'entity' => $question,
		'handler' => 'questions',
		'sort_by' => 'priority',
		'class' => 'elgg-menu-hz',
));

$date = elgg_view_friendly_time($question->time_created);

$tags = elgg_view('output/qtags', array('tags' => $question->tags));

$summary = elgg_view('object/elements/summary', array(
		'entity' => $question,
		'title' => false,
		'subtitle' => $metadata.$date,
		'content'=>$ownerbrief,
		'tags'=>false,
		
));
$image_block = elgg_view_image_block($owner_icon, $summary);
// get the mindmap view link
if(elgg_instanceof($question,'object','question-top')){
	$mindmap_link=elgg_view('output/url',array(
			'href'=>elgg_get_site_url().'mindmap/'.$guid,
			'text'=>elgg_view_icon('share').elgg_echo('mindmap'),
			
			));
}

$question_meta=<<<html
<div class="mas pbm">
$follow $follow_num $mindmap_link
</div>
<div  class="grey pam brs mlm">	

	<div class="f1h center">
		$owner_name
	</div>
	
		$image_block
	
	<div style="background:rgba(255,255,255,1) "class="pas brs">
		$ownerdecs
	</div>
</div>
html;

$reference_add=elgg_view('output/url',array(
	'href' => '#popup',
	'rel' => 'popup',
	'text' => elgg_echo('reference:add'),
	'style'=>'border:1px solid #ccc;padding:0px 5px',
	'class'=>'fr brm elgg-button-submit',
		));
$reference_form=elgg_view_form('references/add', array(), array('question_guid'=>$guid));
$reference_add.=elgg_view_module('dropdown', '', $reference_form,array('id'=>'popup','class'=>'hidden w200'));
$reference_list=elgg_list_annotations(array(
	'guid' => $guid,
	'annotation_name' => 'reference',
	'limit' => 20,
	'full_view'=>true
		));
if(!$reference_list){
	$reference_list='';
}
$reference_list=<<<html
<div style="background:rgba(255,255,255,1)" class="pas brs">
$reference_list
</div>
html;
$r_title=elgg_echo('question:reference');
$refernce_title=<<<html
$r_title 
$reference_add

html;
$refenence=elgg_view_module('aside', $refernce_title, $reference_list);



$questions_list=elgg_list_entities_from_metadata(array(
			'type' => 'object',
			'subtype' => 'question',
			'metadata_name'=>'parent_guid',
			'metadata_value'=>$guid,
				'pagination' => true,
				'full_view' => false,
				'list_class'=>'question-list brs',
				'item_class'=>'question-item bx',
				'view_toggle_type' => false
		));

$order_by=get_input('order_by');
switch ($order_by){
	case "time":
		$question_list=elgg_list_entities_from_metadata(array(
		'type'=>'object',
		'subtype'=>'question',
		'metadata_name'=>'parent_guid',
		'metadata_value'=>$guid,
		'list_class'=>'question-list brs',
		'item_class'=>'question-item bx',
		'limit'=>5,
		));
		break;
	default:
		$question_list=get_better_list_based_on_thumbs($guid);

}

$list_menu=elgg_view('questions/list_menu',array('guid'=>$guid));

if ($question_list){
$question_list=<<<html
<div class="mll mtm">
$list_menu
$question_list		
</div>
html;
}

$content=<<<HTML
<div class=" q-top">
	<div class="elgg-col-2of3  fl">
		<div class="q-top">
		$tags
		
		$question_entity
		</div>
		$question_list
	</div>
	<div class="elgg-col-1of3  fl">	
		$question_meta
		<div  class="mtm mlm grey brs pam">
		 $refenence
		</div>
	</div>
</div>
	<div class="clearfloat mtl"></div>
	$q_question
	
HTML;


$body = elgg_view_layout('one_column', array(
	'content' => $content,	
));

echo elgg_view_page('', $body);