<?php
/**
 * Template Name:  English Course Profile Page
 */
// set golf course id
if (isset($_GET)) :
	$golfCourseID = $_GET['courseID'];
else :
	$golfCourseID = 1;
endif;

function tick_cross($value) {
	if ($value == true) {
		$newValue = '<i class="fa fa-check fa-fw" style="color: green;"></i>';
	} else {
		$newValue = '<i class="fa fa-close fa-fw" style="color: red;"></i>';
	}
	return $newValue;
}

// set uri constants
$img_uri = 'https://www.golfscotland.net/wp-content/uploads/';
$video_uri = 'https://www.youtube.com/embed/';
$social_uri = [
	'https://www.facebook.com/',
	'https://twitter.com/',
	'https://www.instagram.com/',
	'https://www.youtube.com/channel/'
];

// open link to wp database
global $wpdb;

// data queries ge_courses table - course details
$ge_ged = $wpdb->get_results("SELECT c.id, c.name, c.address, c.telephone, c.website, c.email, c.facebook, c.twitter, c.instagram, c.youtube, c.length, c.par, c.description, c.wkday_rnd, c.wkday_day, c.wkend_rnd, c.wkend_day, c.greenfee_note1, c.directions, c.course_lat, c.course_lng, c.special_offers, c.feature_switch, c.top_course, c.featured_course, c.img_logo, c.img_hdr, c.img_ftr, c.img_ad1, c.video1, cr.region, ct.type FROM ge_courses AS c INNER JOIN ge_course_regions AS cr ON c.region = cr.id INNER JOIN ge_course_types AS ct ON c.type = ct.id WHERE c.id = ".$golfCourseID."");

// data queries ge_courses table - feature and facilities
$ge_geff = $wpdb->get_results("SELECT id, trolly_hire, catering, club_hire, clubhouse, showers, changing_rooms, driving_range, proshop, putting_area, buggy_hire, tuition, conference_facilities, function_room, corporate_golf, society_golf, feature_note FROM ge_courses WHERE id = ".$golfCourseID."");

// data queries ge_courses table - videos
$ge_gev = $wpdb->get_results("SELECT id, video1, video2, video3 FROM ge_courses WHERE id = ".$golfCourseID."");

// set variables
// if course logo not available use golf scotland icon
$ge_icon = '2021/01/ge-icon_white.png';

get_header('ge');
?>
<style>
.mh-top-title {
	background-color: #d40000 !important; /* red */
}
</style>
<?php
get_template_part( 'templates/top-title' );
?>

<!--<div class="mh-layout mh-top-title-offset">

<?php /*
	while ( have_posts() ) : the_post();
		get_template_part( 'templates/content', 'page' );
		if ( comments_open() || get_comments_number() ) :
			comments_template();
    endif;
  endwhile; */
?>
</div> -->

<?php foreach ($ge_ged as $ged) : ?>
<style>
/* <div> overflow fix ******************/
.clearfix::after {
  content: ".";
  display: block;
  height: 0;
  clear: both;
  visibility: hidden;
}
#ge-wrapper {
	margin: 0px 32px 0px 32px;
}
h1, h2, h3, h4 {
	color: #d40000; /* red */
}
h2 {
	font-weight: bold;
}
#ge-content a:link, #ge-content a:visited,
#ge-contactDetails a:link, #ge-contactDetails a:visited {
	text-decoration: underline;
	color: #d40000; /* red */
}
#ge-content a:hover, #ge-contactDetails a:hover {
	color: #000;
}
#ge-header {
	position: relative;
	background-color: #ccc; /* grey */
<?php if($ged->img_hdr != null) : ?>
	background-image: url('<?php echo $img_uri.$ged->img_hdr; ?>');
<?php else : ?>
	background-image: url('<?php echo $img_uri.'2020/05/golf_course1.jpg'; ?>');
<?php endif; ?>
	background-size: cover;
	background-position: left center;
	background-repeat: none;
	height: 240px;
	margin-bottom: 20px;
}
#ge-header, #ge-header h1, #ge-footer {
	color: white;
}
#ge-header h1 {
	margin: 120px 0px 0px 32px;
}
#ge-logo {
	position: absolute;
	top: 10px;
	left: 32px;
	height: 100px;
}
#ge-footer {
	background-color: #ccc; /* grey */
<?php if($ged->img_ftr != null) : ?>
	background-image: url('<?php echo $img_uri.$ged->img_ftr; ?>');
<?php else : ?>
	background-image: url('<?php echo $img_uri.'2020/05/golf_course1.jpg'; ?>');
<?php endif; ?>
	background-size: cover;
	background-position: left center;
	background-repeat: none;
	padding: 20px 32px;
	font-size: 14px;
}
#ge-footer a:link, #ge-footer a:visited {
	text-decoration: underline;
	color: #fff; /* white */
}
#ge-footer a:hover {
	color: palegoldenrod;
}
#ge-contactDetails {
	width: 100%;
}
#ge-contactItems, #ge-socialMedia {
	display: inline-block;
	margin-right: 32px;
}
.ge-contact {
	display: inline-block;
	width: 74px;
}
.ge-social {
	width: 50px;
}
#ge-address {
	margin-top: 10px;
	text-align: right;
}

#ge-content > div {
	margin-bottom: 20px;
}
#ge-weekday, #ge-weekend {
	display: inline-block;
	margin: 0px 32px 10px 0px;
}
.ge-ticket {
	display: inline-block;
	width: 120px;
}
table#ge-greenfees2 {
	width: 40%;
	font-size: 14pt;
	border: none;
}
table#ge-greenfees2 th {
	font-weight: bold;
	text-transform: capitalize;
	border: none;
}
table#ge-greenfees2 td {
	border: none;
}
table#ge-greenfees2 tr:nth-child(odd) {
	background-color: #fff; /* white */
}
table#ge-greenfees2 tr:nth-child(even) {
	background-color: #eee; /* lightgrey */
}
table#ge-greenfees2 th:nth-child(3), table#ge-greenfees2 th:nth-child(4),
table#ge-greenfees2 th:nth-child(5),
table#ge-greenfees2 td:nth-child(3), table#ge-greenfees2 td:nth-child(4),
table#ge-greenfees2 td:nth-child(5) {
	text-align: right;
}
table#ge-greenfees2 td:nth-child(3), table#ge-greenfees2 td:nth-child(4),
table#ge-greenfees2 td:nth-child(5) {
	font-weight: bold;
	color:  #d40000; /* red */
}
#ge-key {
	background-color: #b2cadf; /* lightblue */
	padding: 20px;
}
#ge-map {
	border: 1px solid #d40000; /* red */
	margin:0;
	padding: 0;
  height: 400px;
	width: 100%;
}
#ge-advertBox {
	max-width: 100%;
	margin-top: 20px;
	margin-bottom: 20px;
}
.ge-advert {
	display: block;
	width: 50%;
	margin-left: auto;
	margin-right: auto;
}
.ge-featBox {
	display: inline-block;
	max-width: 320px;
}
.ge-featItem {
	display: inline-block;
	width: 50%;
}
.ge-featIcon {
	display: inline-block;
	text-align: center;
}
.ge-vid {
	margin-bottom: 10px;
}
.ge-blue {
color: #0065bd; /* blue */
}

@media only screen and (max-width: 480px) {

	#ge-wrapper, #gs-header h1 {
		margin-left: 8px;
		margin-right: 8px;
	}
	#ge-footer {
		padding-left: 8px;
		padding-right: 8px;
	}
	#ge-contactItems {
		width: 100%;
	}
	.ge-social {
		display: inline-block;
		margin-top: 20px;
	}
	#ge-logo {
		left: 8px;
	}
	#ge-header h1 {
		font-size: 28px;
	}
	table#ge-greenfees2 {
		width: 100%;
	}
	.ge-advert {
		width: 100%;
	}
	.ge-vid {
		display: block;
		margin-right: auto;
		margin-left: auto;
	}
}
</style>
<section id="ge-header">
<?php if($ged->img_logo != null) : ?>
<img id="ge-logo" src="<?php echo $img_uri.$ged->img_logo; ?>" alt="club logo" />
<?php else : ?>
<img id="ge-logo" src="<?php echo $img_uri.$ge_icon; ?>" alt="GE logo" />
<?php endif; ?>
<h1><?php echo $ged->name; ?></h1>
</section><!-- end #ge-header -->

<div id="ge-wrapper" class="clearfix">
	<section id="ge-content">
		<h2>Course Details</h2>
		<h3>Stats:</h3>
		<div id="ge-stats">
			<b>Course Type:</b> <?php echo $ged->type; ?>&nbsp;|&nbsp;
			<b>Length:</b> <?php echo number_format($ged->length); ?> yrds&nbsp;|&nbsp;
			<b>Par:</b> <?php echo $ged->par; ?>
		</div><!-- end #ge-stats-->

		<h3>Description:</h3>
		<div id="ge-description">
			<p><?php echo nl2br(html_entity_decode($ged->description)); ?></p>
		</div><!-- end #ge-description-->

		<h3>Green Fees:</h3>
		<div id="ge-greenFees">
<?php if(($ged->wkday_rnd != null) && ($ged->wkday_day != null) && ($ged->wkend_rnd != null) && ($ged->wkend_day != null)) : ?>
			<div id="ge-weekday">
				<b>Weekday:</b><br />
				<span  class="ge-ticket">Round Ticket:</span>
				<b class="ge-red">&pound;<?php echo $ged->wkday_rnd; ?></b><br />
				<span  class="ge-ticket">Day Ticket:</span>
				<b class="ge-red">&pound;<?php echo $ged->wkday_day; ?></b>
			</div><!-- end #gs-weekday -->
			<div id="ge-weekend">
				<b>Weekend:</b><br />
				<span  class="ge-ticket">Round Ticket:</span>
				<b class="ge-red">&pound;<?php echo $ged->wkend_rnd; ?></b><br />
				<span  class="ge-ticket">Day Ticket:</span>
				<b class="ge-red">&pound;<?php echo $ged->wkend_day; ?></b>
			</div><!-- end #gs-weekend -->
<?php
	elseif($ged->greenfee_note1 != null) :
		$table_rows = explode("\r", $ged->greenfee_note1);
		$fees_table = '<table id="ge-greenfees2">'.PHP_EOL;
		$fees_table .= '<tr><th>'.str_replace(',', '</th><th>',$table_rows[0]).'</th></tr>'.PHP_EOL;
		for ($x = 1; $x < count($table_rows); $x++) :
			$trow = '<tr><td>'.str_replace(',', '</td><td>', $table_rows[$x]).'</td></tr>'.PHP_EOL;
			$fees_table .= $trow;
		endfor;
		$fees_table .= '</table>'.PHP_EOL;
		echo $fees_table;
?>
<?php endif; ?>
	</div><!-- end #ge-greenFees -->

		<h3>Directions:</h3>
		<div id="ge-directions">
			<?php echo nl2br(html_entity_decode($ged->directions)); ?>
		</div><!-- end #ge-directions-->

		<!-- display google map -->
		<div id="ge-map">
			<noscript>
				The dynamic location map is not being displayed because JavaScript is deactivated for this browser.
			</noscript>
		</div><!-- end #ge-map-->

		<!-- Google Maps API -->
		<script>
			// initialise variables
			var map;

			// function to display map
			function initMap() {
				// this course location
				var this_course = {lat: <?php echo $ged->course_lat; ?>, lng: <?php echo $ged->course_lng; ?>},
				map = new google.maps.Map(document.getElementById('ge-map'), {center: this_course, zoom: 14});

				var infoString = '<div id="ge-mapInfo">'+
      			'<h4><?php  echo $ged->name; ?></h4>' +
      			'<div id="ge-bodyInfo">'+
      			'Par: <b class="ge-red"><?php echo $ged->par; ?></b><br />' +
      			'Length: <b class="ge-red"><?php echo number_format($ged->length); ?></b> yrds<br />' +
      			'Type: <b class="ge-red"><?php echo $ged->type; ?></b><br />' +
      			'Region: <b class="ge-red"><?php echo $ged->region; ?></b>' +
      			'</div>'+
      			'</div>';

				var infowindow = new google.maps.InfoWindow({
    				content: infoString
  				});

				// golf scotland icon
				// get icon image
				var ge_icon = '<?php echo $img_uri.'2021/01/ge-icon40.png'; ?>';
				// set icon
				var golfscot = {icon: ge_icon};

				// The marker, positioned at this course
				var marker = new google.maps.Marker({position: this_course, icon: ge_icon, map: map});
				marker.addListener('click', function() { infowindow.open(map, marker);});
			}
		</script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo MAP_KEY; ?> &language=en &region=GB &callback=initMap">
		</script>
		<!-- end Google Maps API -->

<?php if($ged->img_ad1 != null) : ?>
		<div id="ge-advertBox">
			<a href="<?php  echo $ged->website; ?>">
				<img class="ge-advert" src="<?php echo $img_uri.$ged->img_ad1; ?>" alt="current advert No.1" />
			</a>
		</div><!-- end .ge-advertBox -->
<?php
	endif;

	if($ged->special_offers != null) :
?>
		<h3>Special Offers:</h3>
		<div id="ge-specialOffers">
<?php echo nl2br(html_entity_decode($ged->special_offers)); ?>
</div><!-- end #ge-specialOffers-->
<?php
	endif;

	if($ged->feature_switch == 1) :
		foreach ($ge_geff as $geff) : ?>
		<h3>Golf Course Features and Facilities:</h3>
		<div id="ge-features">
			<div class="ge-featBox">
				<div class="ge-featItem"><b>Trolly Hire:</b></div>
				<div class="ge-featIcon"><?php echo tick_cross($geff->trolly_hire); ?></div>
				<div class="ge-featItem"><b>Catering Available:</b></div>
				<div class="ge-featIcon"><?php echo tick_cross($geff->catering); ?></div>
				<div class="ge-featItem"><b>Club Hire:</b></div>
				<div class="ge-featIcon"><?php echo tick_cross($geff->club_hire); ?></div>
				<div class="ge-featItem"><b>Clubhouse:</b></div>
				<div class="ge-featIcon"><?php echo tick_cross($geff->clubhouse); ?></div>
				<div class="ge-featItem"><b>Showers:</b></div>
				<div class="ge-featIcon"><?php echo tick_cross($geff->showers); ?></div>
			</div><!-- end .ge-featBox-->

			<div class="ge-featBox">
				<div class="ge-featItem"><b>Changing Rooms:</b></div>
				<div class="ge-featIcon"><?php echo tick_cross($geff->changing_rooms); ?></div>
				<div class="ge-featItem"><b>Driving Range:</b></div>
				<div class="ge-featIcon"><?php echo tick_cross($geff->driving_range); ?></div>
				<div class="ge-featItem"><b>Proshop:</b></div>
				<div class="ge-featIcon"><?php echo tick_cross($geff->proshop); ?></div>
				<div class="ge-featItem"><b>Putting Area:</b></div>
				<div class="ge-featIcon"><?php echo tick_cross($geff->putting_area); ?></div>
				<div class="ge-featItem"><b>Buggy Hire:</b></div>
				<div class="ge-featIcon"><?php echo tick_cross($geff->buggy_hire); ?></div>
			</div><!-- end .ge-featBox-->

			<div class="ge-featBox">
				<div class="ge-featItem"><b>Tuition Available:</b></div>
				<div class="ge-featIcon"><?php echo tick_cross($geff->tuition); ?></div>
				<div class="ge-featItem"><b>Conference Facilities:</b></div>
				<div class="ge-featIcon"><?php echo tick_cross($geff->conference_facilities); ?></div>
				<div class="ge-featItem"><b>Function Room:</b></div>
				<div class="ge-featIcon"><?php echo tick_cross($geff->function_room); ?></div>
				<div class="ge-featItem"><b>Corporate Golf:</b></div>
				<div class="ge-featIcon"><?php echo tick_cross($geff->corporate_golf); ?></div>
				<div class="ge-featItem"><b>Society Golf:</b></div>
				<div class="ge-featIcon"><?php echo tick_cross($geff->society_golf); ?></div>
			</div><!-- end .gs-featBox -->
		</div><!-- end #gs-features -->
<?php if ($gsff->feature_note != null) : ?>
		<div id="ge-featNotes">
			<h3>Additional Notes on Features:</h3>
<?php echo  nl2br(html_entity_decode($gsff->feature_note)); ?>
</div><!-- end #ge-featNotes -->
<?php endif; ?>
<?php
		endforeach;
	endif;

	if ($gsd->video1 != null) :
?>
		<h2>Gallery:</h2>
		<div id="ge-gallery">
			<div id="ge-video">
<?php
		foreach ($ge_gev as $gevid) :
			for ($x=1; $x <= 3; $x++) :
				$video = 'video'.$x;
				// set video image width and height
				$v_width = 425;
				$v_height = 239;
				if($gevid->$video != null) :
?>
				<iframe class="ge-vid" width="<?php echo $v_width; ?>" height="<?php echo $v_height; ?>" src="<?php echo $video_uri.$gevid->$video; ?>" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php
				endif;
			endfor;
		endforeach;
?>
			</div><!-- end #gs-video -->
		</div><!-- end #gs-gallery -->
<?php	endif; ?>
	</section><!-- end #gs-content -->
</div><!-- end #gs-wrapper -->

<section id="ge-footer">
	<div id="ge-contactDetails" class="clearfix">
		<h5>Ways to contact the golf club directly:</h5>
		<div id="ge-contactItems">
			<b class="ge-contact">Telephone:</b>
			<a href="tel:<?php echo $ged->telephone; ?>"><?php echo $ged->telephone; ?></a><br />
			<b class="ge-contact">Website:</b>
			<a href="<?php echo $ged->website; ?>"><?php echo $ged->website; ?></a><br />
			<b class="ge-contact">Email:</b>
			<a href="mailto:<?php echo $ged->email; ?>"><?php echo $ged->email; ?></a>
		</div><!-- end #gs-contactItems -->

		<div id="ge-socialMedia">
<?php if ($ged->facebook != null) : ?>
			<div class="ge-social">
				<a href="<?php echo $social_uri[0].$ged->facebook; ?>">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-facebook fa-stack-1x fa-inverse" title="Follow Us on Facebook" style="color: #ccc;"></i>
				</span>
				</a>
			</div>
<?php
	endif;
	if ($ged->twitter != null) :
?>
			<div class="ge-social">
				<a href="<?php echo $social_uri[1].$ged->twitter; ?>">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-twitter fa-stack-1x fa-inverse" title="Follow us on Twitter" style="color: #ccc;"></i>
				</span>
				</a>
			</div>
<?php
	endif;
	if ($ged->instagram != null) :
?>
			<div class="ge-social">
				<a href="<?php echo $social_uri[2].$ged->instagram; ?>">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-instagram fa-stack-1x fa-inverse" title="Follow us on Instagram" style="color: #ccc;"></i>
				</span>
				</a>
			</div>
<?php
	endif;
	if ($ged->youtube != null) :
?>
			<div class="ge-social">
				<a href="<?php echo $social_uri[3].$ged->youtube; ?>">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-youtube fa-stack-1x fa-inverse" title="Follow us on Youtube" style="color: #ccc;"></i>
				</span>
				</a>
			</div>
<?php endif; ?>
</div><!-- end #ge-socialMedia -->
	</div><!-- end #ge-contactDetails -->

	<div id="ge-address">
	<?php echo $ged->address; ?>
</div><!-- end #ge-address -->
</section><!-- end #ge-footer -->
<?php endforeach; ?>

<?php get_footer(); ?>
