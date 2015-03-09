<?php
$title = elgg_extract('title', $vars, '');
$description = elgg_extract('description', $vars, '');
$tags = elgg_extract('tags', $vars, '');
$container_guid=elgg_extract('parent_guid', $vars, '');
$container=get_entity($container_guid);
$proccess = elgg_extract('proccess', $vars, '');
$level = elgg_extract('level', $vars, '');
$catagory = elgg_extract('catagory', $vars, '');
$inline=elgg_extract('inline', $vars, false);

$class='pas';
if (elgg_instanceof($container, 'object', 'question-top')||elgg_instanceof($container, 'object', 'question')){
	$class='hidden';
}
$names=array('title','description','tags','cat','proccess','level');
foreach ($names as $name){
	$name_titles[].=elgg_echo("question:form:".$name);
	$name_tips[].=elgg_echo("question:form:".$name.":tips");
} 

$t_ipt=elgg_view("input/text", array('name' =>'title','value' =>$title,'title'=>$name_tips[0]));
$d_ipt=elgg_view("input/longtext", array('name' =>'description','value' =>$description));
$tag_ipt=elgg_view("input/tags", array('name' =>'tags','value' =>$tags));
$cat_ipt=elgg_view("input/dropdown", array('name' =>'catagory','value' =>$catagory,'options_values'=>array(
		'c_1'=>elgg_echo('question:cat:nature'),
		'c_2'=>elgg_echo('question:cat:human'),
		'c_3'=>elgg_echo('question:cat:sociaty'),
		)));
$p_ipt=elgg_view("input/dropdown", array('name' =>'proccess','value' =>$proccess,'options_values'=>array(
		'p_1'=>elgg_echo('question:process:review'),
		'p_2'=>elgg_echo('question:process:method'),
		'p_3'=>elgg_echo('question:process:design'),
		'p_4'=>elgg_echo('question:process:experiment'),
		'p_5'=>elgg_echo('question:process:analysic'),
		'p_6'=>elgg_echo('question:process:conclusion'),
		
		)));
$l_ipt=elgg_view("input/dropdown", array('name' =>'level','value' =>$level,'options_values'=>array(
		'what'=>elgg_echo('question:level:what'),
		'how'=>elgg_echo('question:level:how'),
		'why'=>elgg_echo('question:level:why'),		
		)));
$submit=elgg_view('input/submit', array('value' => elgg_echo('question:save'),'class'=>'btn w100'));
// inline questions for river and reply
$title_input=<<<html
<div class="pas">
<h3 class="fl w50 black"> $name_titles[0] </h3>
<span class="elgg-col-3of4 fl">$t_ipt</span><h1>?</h1>
</div>

html;
$left_side=<<<html
<div class="elgg-col-2of3 fl">
$title_input
<div class="pam">
<h3 class="fl"> $name_titles[1]  </h3>
$d_ipt
</div>
</div>
html;
$right_side=<<<html
<div class='elgg-col-1of3 fl '>
	
	<div class="pas">
	<h3 >$name_titles[2] </h3>
	$tag_ipt
	</div>
	<div class=$class >
	<label>$name_titles[3] </label>
	$cat_ipt
	</div>
	<div class=$class >
	<label>$name_titles[4]</label>
	$p_ipt
	</div>
	<div class=$class >
	<label>$name_titles[5] </label>
	$l_ipt
	</div>
	
  $submit
</div>
html;
if($inline){
$t_link=elgg_view("output/url", array('href'=>'#inline_question-'.$container_guid,'text'=>elgg_echo('question:question'), 'rel'=>'popup','class'=>'block pas btn center'));
	
$inline_body=elgg_view_module('widget', '', $left_side.$right_side,array('id'=>'inline_question-'.$container_guid,'class'=>'hidden w600'));
$body=$t_link.$inline_body;
}else{	

$body=$left_side.$right_side;
}
echo $body;
?>

<div class="elgg-foot pas">

	<?php if ($vars['guid']) {
	echo elgg_view('input/hidden', array(
		'name' => 'question_guid',
		'value' => $vars['guid'],
	));
	}
	echo elgg_view('input/hidden', array(
	'name' => 'parent_guid',
	'value' => $container_guid,
	));

	?>
</div>

