<?php
/**
 * All questions listing page navigation
 *
 */
$tabs = array(
	
	'newest' => array(
		'text' => elgg_echo('question:all:newest'),
		'href' => 'questions/all?filter=newest',
		'priority' => 400,
	),
	'hottest' => array(
		'text' => elgg_echo('question:all:hottest'),
		'href' => 'questions/all?filter=hottest',
		'priority' => 300,
	),
	'recommend' => array(
		'text' => elgg_echo('question:all:recommended'),
		'href' => 'questions/all?filter=recommend',
		'priority' => 200,
	),


);

// sets default selected item
if (strpos(full_url(), 'filter') === false) {
	if(strpos(full_url(), 'category') === false){
	$tabs['recommend']['selected'] = true;
	}
}

foreach ($tabs as $name => $tab) {
	$tab['name'] = $name;

	elgg_register_menu_item('filter', $tab);
}

echo elgg_view_menu('filter', array('sort_by' => 'priority', 'class' => 'elgg-menu-hz'));
