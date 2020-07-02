<?php
/*
*******************************************************************************
 * File:		footer_imgs.php
 * Purpose: Places partner images and links at the bottom of the page footer
 *						
 * Author:	Mark Fletcher
 * Date:		10.06.2020
 *  
 * Notes: 
 *
 * Revision:
 *
*******************************************************************************
*/
$ftr_img = [
	'pga' => [
		'url' => 'http://www.europrotour.com/', 
		'img' => 'https://www.golfscotland.net/wp-content/uploads/2020/05/pga-ept_footer-e1590584586626.png'
	]
];
?>

<div id="ftr-imgs" style="display: block; margin: 0pc auto 22px auto;">
	<?php foreach($ftr_img as $imgs) : ?>
	<a href="<?php echo $imgs['url']; ?>">
		<img src="<?php echo $imgs['img']; ?>" alt="" style="height: 60px; margin 10px;" />
	</a>
	<?php endforeach; ?>
</div><!-- end #ftr-imgs -->

