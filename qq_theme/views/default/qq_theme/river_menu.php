<?php
$tabs=array(
		'all' => array(
				'text' => elgg_echo("river-tab:all"),
				'href' => 'activity',
				'priority' => 200,
		),
		'question' => array(
				'text' => elgg_echo("river-tab:question"),
				'href' => 'activity?fliter=question',
				'priority' => 300,
		),
		'follow' => array(
				'text' => elgg_echo("river-tab:follow"),
				'href' => 'activity?fliter=follow',
				'priority' => 400,
		),
);
foreach ($tabs as $name => $tab) {
	$tab['name'] = $name;

	elgg_register_menu_item('river_tabs', $tab);
}

echo elgg_view_menu('river_tabs',array('sort_by' => 'priority', 'class' => 'elgg-menu-hz river-tab'));
