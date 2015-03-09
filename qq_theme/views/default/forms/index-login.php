<?php
/**
 * Elgg login form
 *
 * @package Elgg
 * @subpackage Core
 */
?>

<div>
	
	<?php echo elgg_view('input/text', array(
		'name' => 'username',
		'class' => 'elgg-autofocus',
		'placeholder'=>elgg_echo('loginusername'),
		));
	?>
</div>
<div>
	<?php echo elgg_view('input/password', array('name' => 'password','placeholder'=>elgg_echo('password'),)); ?>
</div>
<div class="elgg-foot">
	<div class="fl">
	<?php echo elgg_view('input/submit', array('value' => elgg_echo('login'),'class'=>'elgg-button-index')); ?>
	</div>
	
	<?php 
	if (isset($vars['returntoreferer'])) {
		echo elgg_view('input/hidden', array('name' => 'returntoreferer', 'value' => 'true'));
	}
	?>

	<ul class="elgg-menu elgg-menu-index fr">
	
	<li>
	<input type="checkbox" name="persistent" value="true" />
		<?php echo elgg_echo('user:persistent'); ?>
	</li>
	<li>
	.
	</li>
		<li><a class="forgot_link" href="<?php echo elgg_get_site_url(); ?>forgotpassword">
			<?php echo elgg_echo('user:password:lost'); ?>
		</a></li>
	</ul>
</div>
