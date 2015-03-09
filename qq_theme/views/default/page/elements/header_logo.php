<?php
/**
 * Elgg header logo
 */

$site = elgg_get_site_entity();
$site_name = $site->name;
$site_url = elgg_get_site_url();
$img=$site_url.'mod/qq_theme/graphics/header_logo.png';
?>

 <h2 id="logo"><a href="<?php echo $site_url; ?>"><span><img src=<?php echo$img?> > </span></a></h2>
