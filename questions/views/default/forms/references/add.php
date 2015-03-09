<?php
$title = elgg_extract('title', $vars, '');
$address = elgg_extract('address', $vars, '');
//transfer the question guid to the reference container_guid;
$container_guid=elgg_extract('question_guid', $vars, '');

?>
<div>
	<label><?php echo elgg_echo('title'); ?></label><br />
	<?php echo elgg_view('input/text', array('name' => 'title', 'value' => $title)); ?>
</div>
<div>
	<label><?php echo elgg_echo('references:address'); ?></label><br />
	<?php echo elgg_view('input/text', array('name' => 'address', 'value' => $address)); ?>
</div>

<div class="elgg-foot">
<?php

echo elgg_view('input/hidden', array('name' => 'container_guid', 'value' => $container_guid));


echo elgg_view('input/submit', array('value' => elgg_echo("save")));

?>
</div>