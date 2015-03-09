<?php

/**
 * View for question object

* 
*/

$question = elgg_extract('entity', $vars, FALSE);

$vars=array('entity'=>$question);
echo elgg_view('object/question-top',$vars);