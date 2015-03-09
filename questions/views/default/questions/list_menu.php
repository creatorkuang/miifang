<?php
$guid=get_input('guid');
$tabs=array(

		'time' => array(
				'text' => elgg_echo("question:order:time"),
				'href' => 'questions/view/'.$guid.'?order_by=time',
				'priority' => 300,
		),
		'vote' => array(
				'text' => elgg_echo("question:order:vote"),
				'href' => 'questions/view/'.$guid,
				'priority' => 200,
		),
);

if (strpos(full_url(), 'order_by') === false) {
		$tabs['vote']['selected'] = true;

}

foreach ($tabs as $name => $tab) {
	$tab['name'] = $name;

	elgg_register_menu_item('river_tabs', $tab);
}

echo elgg_view_menu('river_tabs',array('sort_by' => 'priority', 'class' => 'elgg-menu-hz river-tab'));
