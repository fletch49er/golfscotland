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
		'id' => 'gs-et',
		'url' => 'https://www.europeantour.com/european-tour/', 
		'img' => '2020/09/european-tour_open_graph.png'
	],
	'ept' => [
		'id' => 'gs-pga',
		'url' => 'http://www.europrotour.com/', 
		'img' => '2020/05/pga-europro-tour-logo-e1590512511161.png'
	],
	'ct' => [
		'id' => 'gs-ct',
		'url' => 'https://www.europeantour.com/challenge-tour/', 
		'img' => '2020/09/challenge-tour_open_graph.png'
	]
];
?>
<?php foreach($ftr_img as $img) : ?>
	<div class="gs-sponsor">
	<div id="<?php echo $img['id']; ?>">
		<a href="<?php echo $img['url']; ?>" style="text-decoration: none;">
			<img src="<?php echo $gs_uri.$img['img']; ?>" alt="<?php echo $img['id'].' logo'; ?>" />
		</a>
	</div><!-- end .<?php echo $img['id']; ?> -->

	</div><!-- end .sponsor -->
<?php endforeach; ?>
	<div id="gs-img-tagline">OFFICIAL MEDIA PARTNERS</div>
