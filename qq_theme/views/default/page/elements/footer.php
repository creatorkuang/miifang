<?php
/**
 *  footer
 * The standard HTML footer that displays across the site
 *
 * @package Elgg
 * @subpackage Core
 *
 */

?>

<div class="wrapper clearfloat ">

	<ul class="elgg-menu-hz">
	<li>
	<?php 
	echo elgg_view('output/url', array(
		'href' => elgg_get_site_url().'about',
		'text' =>elgg_echo('about'),
		'is_trusted' => true,
		));
	?></li>
	<li>
	<?php 
	echo elgg_view('output/url', array(
		'href' => elgg_get_site_url().'contact',
		'text' => elgg_echo('contact'),
		'is_trusted' => true,
		));
	?></li>
	<li>
	<?php 
	 echo elgg_view('output/url', array(
		'href' => elgg_get_site_url().'help',
		'text' => elgg_echo('help'),
		'is_trusted' => true,
		));
	 ?></li>
	
	
	 
		<div style="float:right;margin-right:5%;color:#ccc">
		
	 &#169;2012 <?php echo elgg_echo('sitename')?>
		</div>
	</ul>
	
</div>
<?php echo elgg_view_menu('footer', array('sort_by' => 'priority', 'class' => 'elgg-menu-hz mbm'));
 ?>