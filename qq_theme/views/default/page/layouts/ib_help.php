<?php
/**
 *  main help center layout
 *
 @uses $vars['ib_content']        HTML of main content area
 */
$nav = elgg_extract('nav', $vars, elgg_view('navigation/breadcrumbs'));
if (isset($vars['title'])) {
$title=elgg_view_title($vars['title']);
$title="<div class=\"elgg-divide-bottom\">$title</div>";
}
if (isset($vars['help_content'])) {
	$ibcontent=$vars['help_content'];
}
echo "<div class=\"mtl\"><ul class=\"help-sidebar\">";

$menus=array('about','help','jobs','service','privacy','feedback','contact');
foreach ($menus as $menu){
	$menu_link=elgg_view('output/url',array(
		'href'=>elgg_get_site_url().$menu,
		'text'=>elgg_echo('help:'.$menu),
		'is_trusted' => true,
		));
	echo "<li>$menu_link</li><hr class=\"separator\">";
}

echo <<<HTML
		</ul>
	<div class="help-content mbl">
	$nav
	$title
	$ibcontent
	</div>
</div>
HTML;
