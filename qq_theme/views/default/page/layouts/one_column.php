<?php
/**
 * Elgg one-column layout
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['content'] Content string
 * @uses $vars['class']   Additional class to apply to layout
 * * @uses $vars['fliter']   Additional class to apply to layout
 */

$class = 'elgg-layout elgg-layout-one-column clearfix';
if (isset($vars['class'])) {
	$class = "$class {$vars['class']}";
}

if (isset($vars['fliter'])) {
	$fliter = $vars['fliter'];
}

// navigation defaults to breadcrumbs
$nav = elgg_extract('nav', $vars, elgg_view('navigation/breadcrumbs'));

if (isset($vars['buttons']) && $vars['buttons']) {
	$buttons = $vars['buttons'];
} else {
	$buttons = elgg_view_menu('title', array(
			'sort_by' => 'priority',
			'class' => 'elgg-menu-hz',
	));
}
$title = elgg_extract('title', $vars, '');

$title = elgg_view_title($title, array('class' => 'elgg-heading-main'));

?>
<div class="container pbl">
<div class="<?php echo $class; ?>">
	<div class="elgg-body elgg-main">
	<?php
		echo $nav;
	
		
	echo <<<html
		<div class="elgg-head clearfix">
		$title$buttons
		</div>
html;
	echo $fliter;
		echo $vars['content'];
		
		
		// @deprecated 1.8
		if (isset($vars['area1'])) {
			echo $vars['area1'];
		}
	?>
	</div>
</div>
</div>