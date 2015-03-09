<?php
/**
 * River item footer (you can change river comment style here)
 *
 * @uses $vars['item'] ElggRiverItem
 * @uses $vars['responses'] Alternate override for this item
 */

// allow river views to override the response content
$responses = elgg_extract('responses', $vars, false);
if ($responses) {
	echo $responses;
	return true;
}

$item = $vars['item'];
$object = $item->getObjectEntity();

if ($item->annotation_id != 0 || !$object||$item->action_type=='follow') {
	return true;
}


if(elgg_instanceof($object, 'object','question')||elgg_instanceof($object, 'object','question-top')){
	

	$guid=$object->getGUID();
	$subquestions = elgg_get_entities(array(
		'type' => 'object',
		'subtype' => 'question',
		'metadata_name'=>'parent_guid',
		'metadata_value'=>$guid,
		
		));

	if ($subquestions) {
		?>
		<span class="elgg-river-comments-tab"><?php echo elgg_echo('question:question'); ?></span>
<?php
		
	$questions_list=elgg_list_entities_from_metadata(array(
			'type' => 'object',
			'subtype' => 'question',
			'metadata_name'=>'parent_guid',
			'metadata_value'=>$guid,
			'limit'=>3,
			'pagination'=>false,
			'full_view' => false,
			'list_class'=>'question-list brs ',
			'item_class'=>'question-item bx elgg-river-comments',
			'view_toggle_type' => false
		));
		
 	echo $questions_list;
	 }
}
$container=get_entity($guid);
$proccess=$container->proccess;
$level=$container->level;
$cat=$container->catagory;

// question the question form
$form_vars = array('id' => "question-{$guid}", 'class' => 'hidden elgg-form-small elgg-river-responses');
echo elgg_view_form('questions/save', $form_vars, array('parent_guid'=>$guid,'proccess'=>$proccess,'catagory'=>$cat,'level'=>$level,'inline'=>true));

?>
<script type="text/javascript">
$(document).ready(function(){
  $('#forward-').click(function(){
     	elgg.action('forward', {
		      data:{item_id:<?php echo $item->id; ?>,
				    user_id:elgg.get_logged_in_user_guid()
				    },
		      success: function(json) {
		    	  elgg.system_message("Forward Success!");
      				},
      		
			});
     	
    });

  })
</script>
