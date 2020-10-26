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
// golf scotland uri
$gs_uri = 'https://www.golfscotland.net/wp-content/uploads/';

// pga footer images
$ftr_img = [
	'et' => [
		'url' => 'https://www.europeantour.com/european-tour/', 
		'img' => '2020/09/european-tour_open_graph.png'
	],
	'ept' => [
		'url' => 'http://www.europrotour.com/', 
		'img' => '2020/05/pga-ept_footer-e1590584586626.png'
	],
	'ct' => [
		'url' => 'https://www.europeantour.com/challenge-tour/', 
		'img' => '2020/09/challenge-tour_open_graph.png'
	],
	'rc' => [
		'url' => 'https://www.rydercup.com/', 
		'img' => '2020/09/challenge-tour_open_graph.png'
	]
];
?>

<div id="ftr-imgs" style="display: block; margin: 0pc auto 22px auto;">
	<?php foreach($ftr_img as $imgs) : ?>
	<a href="<?php echo $imgs['url']; ?>">
		<img src="<?php echo $gs_uri.$imgs['img']; ?>" alt="" style="height: 60px; margin 10px;" />
	</a>
	<?php endforeach; ?>
</div><!-- end #ftr-imgs -->

