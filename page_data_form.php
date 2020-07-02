<?php
/**
 * Template Name: Course Profile Form
 */
 
get_header();

get_template_part( 'templates/top-title' );
?>
 
<style>
	* {
		color: #0065bd;
	}
	#wrapper {
		font-family: "Liberation Sans", sans-serif;
		font-size: 14pt; 
		width:960px;
		margin: 50px auto;
		padding: 50px;
		border: 1px solid #0065bd;
	}
	p {
		line-height: 115%;
	}
	div {
		margin-bottom: 40px;
	}
	#header {
		display: block;
		margin-bottom: 0.5cm; 
		font-weight: normal; 
		line-height: 100%;
	}
	#form {
	}
	input, select {
		height: 25pt;
	}
	input[type=checkbox] {
		width: 20pt;
		box-sizing: border-box;
	}
	select {
		width: 200px;
	}
	.note {
		font-size: 10pt;
	}
	.detail-label1, .detail-select,
	.detail-label2, .detail-label3, .detail-label4 {
		display: inline-block;
		margin-bottom: 20px;
	}
	.detail-label1 {
		width: 100px;
	}
	#course_type, #par,
	#wkday_rnd, #wkday_day, #wkend_rnd, #wkend_day {
		margin-right: 40px;
	}
	.detail-label3 {
		width: 220px;
	}
	.detail-label4 {
		width: 200px;
	}
	#ftr-img {
		float: right;
		margin-left: 20px;
	}
	#ftr-txt {
		font-family: "Impact", sans-serif;
		font-size: 26pt;
		text-align: right;
	}
</style>
<?php if(!isset($_POST['submit'])) : ?>
<div id="wrapper">
	<div id="header">
		<img id="hdr-img" src="https://www.golfscotland.net/wp-content/uploads/2020/05/gs-logo150.png" width="150" height="59" border="0"/>
	</div><!-- end #header -->

	<h1>COURSE PROFILE FORM</h1>
	<form id="gs-form" action="/data-form" method="post">
		<div id="course-details">
			<h2>COURSE DETAILS</h2>
			<label class="detail-label1" for="name">Name:</label>
			<input type="text" id="name" name="name" size="100" maxlength="100" /><br />
			<label class="detail-label1" for="address">Address:</label>
			<input type="text" id="address" name="address" size="100" maxlength="150" /><br />
			<label class="detail-label1" for="region">Region:</label>
			<select id="region" name="region">
				<option value="" selected ></option>
				<option value="1">Aberdeen &amp; Grampian</option>
				<option value="2">Angus &amp; Dundee</option>
				<option value="3">Argyll Ayrshire</option>
				<option value="4">Dumfries &amp; Galloway</option>
				<option value="5">Edinburgh &amp; the Lothians</option>
				<option value="6">Fife</option>
				<option value="7">Glasgow &amp; Clyde Valley</option>
				<option value="8">Orkney</option>
				<option value="9">Perthshire</option>
				<option value="10">Stirling &amp; The Trossachs</option>
				<option value="11">The Outer &amp; Inner Hebrides</option>
				<option value="12">The Scottish Borders</option>
				<option value="13">The Scottish Highlands</option>
				<option value="14">The Shetland Islands</option>
			</select><br />
			<label class="detail-label1" for="course_type">Type:</label>
			<select id="course_type" name="course_type">
				<option value="" selected></option>
				<option value="1">Links</option>
				<option value="2">Parklands</option>
				<option value="3">Desert</option>
			</select>
			<label class="detail-label2" for="par">Par:</label>
			<input type="text" id="par" name="par"  size="10" maxlength="3" />
			<label class="detail-label2" for="length">Length:</label>
			<input type="text" id="length" name="length"  size="10" maxlength="6" /> yrds
		</div><!-- end #course-details -->

		<div id="contact-details">
			<h2>CONTACT DETAILS</h2>
			<h3 class="western">Direct:</h3>
			<label class="detail-label1" for="telephone">Telephone:</label>
			<input type="text" id="telephone" name="telephone"  size="25" max-length="25" /><br />
			<label class="detail-label1" for="website">Website:</label>	
			<input type="text" id="website" name="website"  size="100" max-length="75" /><br />
			<label class="detail-label1" for="email">Email:</label>
			<input type="email" id="email" name="email"  size="100" max-length="75" />
			
			<h3>Social Media:</h3>		
			<p class="note">NOTE: Please leave blank if not applicable.</p>
			<label class="detail-label1" for="facebook">Facebook:</label>
			<input type="text" id="facebook" name="facebook"  size="100" max-length="75" /><br />
			<label class="detail-label1" for="twitter">Twitter:</label>
			<input type="text" id="twitter" name="twitter"  size="100" max-length="75" /><br />
			<label class="detail-label1" for="instagram">Instagram:</label>
			<input type="text" id="instagram" name="instagram"  size="100" max-length="75" />
		
			<h3>Description:</h3>
			<textarea id="description" name="description" rows="7" cols="120" wrap="soft" placeholder="Enter course description"></textarea>
			
			<h3>Green Fees:</h3>
			
			<label class="detail-label3" for="wkday_rnd">Weekday Round Ticket: </label>
			&pound;	<input type="text" id="wkday_rnd" name="wkeday_rnd" size="6" max-length="10" />
			<label class="detail-label3" for="wkday_day">Weekday Day Ticket: </label>
			&pound; <input type="text" id="wkday_day" name="wkday_day" size="6" max-length="10" /><br />
			<label class="detail-label3" for="wkend_rnd">Weekend Round Ticket: </label>
			&pound;	<input type="text" id="wkend_rnd" name="wkend_rnd" name="wkend_rnd" size="6" max-length="10" />
			<label class="detail-label3" for="wkend_day">Weekend Day Ticket: </label>
			&pound; <input type="text" id="wkend_day" name="wkend_day" size="6" max-length="10" />
		</div><!-- end #contact-details -->
			
		<div id="course-directions">
			<h2>DIRECTIONS</h2>
			<textarea name="directions"  rows="6" cols="120" wrap="soft" placeholder="Enter course directions"></textarea>
		</div><!-- end #course-directions -->
		<div id="long-lang">
			<label class="" for="course_lng">Longitude: </label>
			<input type="text" id="course_lng" name="course_lng" /> 
			<label class="" for="course_lat">Latitude: </label>
			<input type="text" id="course_lat" name="course_lat" /> 
		</div><!--end #long-lang -->
		
		<div id="course-offers">
			<h2 class="western">SPECIAL OFFERS</h2>
			<textarea name="special_offers"  rows="22" cols="120" wrap="soft" placeholder="Enter special offers"></textarea>
		</div><!-- end #course-offers -->
		
		<div id="course-facilities">
			<h2 class="western">COURSE FACILITIES AND FEATURES</h2>
			<p class="note">NOTE: Please tick appropriate boxes.</p>
			<div id="facilities" dir="ltr" gutter="0" style="column-count: 3">
				<label class="detail-label4" for="trolly_hire">Trolly Hire:</label>
				<input type="checkbox" id="trolly_hire" name="trolly_hire" value="1" /><br />
				<label class="detail-label4" for="catering">Catering Available:</label>
				<input type="checkbox" id="catering" name="catering" value="1" /><br />
				<label class="detail-label4" for="club_hire">Club Hire:</label>
				<input type="checkbox" id="club_hire" name="club_hire" value="1" /><br />
				<label class="detail-label4" for="clubhouse">Clubhouse:</label>
				<input type="checkbox" id="clubhouse" name="clubhouse" value="1" /><br />
				<label class="detail-label4" for="showers">Showers:</label>
				<input type="checkbox" id="showers" name="showers" value="1" /><br />
				<label class="detail-label4" for="changing">Changing Rooms:</label>
				<input type="checkbox" id="changing" name="changing" value="1" /><br />
				<label class="detail-label4" for="driving_range">Driving Range:</label>
				<input type="checkbox" id="driving_range" name="driving_range" value="1" /><br />
				<label class="detail-label4" for="proshop">Proshop:</label>
				<input type="checkbox" id="proshop" name="proshop" value="1" /><br />
				<label class="detail-label4" for="putting_area">Putting Area:</label>
				<input type="checkbox" id="putting_area" name="putting_area" value="1" /><br />
				<label class="detail-label4" for="buggy_hire">Buggy Hire:</label>
				<input type="checkbox" id="buggy_hire" name="buggy_hire" value="1" /><br />
				<label class="detail-label4" for="tuition_available">Tuition Available:</label>
				<input type="checkbox" id="tuition_available" name="tuition_available" value="1" /><br />
				<label class="detail-label4" for="conference_facilities">Conference Facilities:</label>
				<input type="checkbox" id="conference_facilities" name="conference_facilities" value="1" /><br />
				<label class="detail-label4" for="function_room">Function Room:</label>
				<input type="checkbox" id="function_room" name="function_room" value="1" /><br />
				<label class="detail-label4" for="corporate_golf">Corporate Golf:</label>
				<input type="checkbox" id="corporate_golf" name="corporate_golf" value="1" /><br />
				<label class="detail-label4" for="society_golf">Society Golf:</label>
				<input type="checkbox" id="society_golf" name="society_golf" value="1" /><br />
			</div><!-- end #facilities -->
		</div><!-- end #course-facilities -->

		<div id="stats">
			<h2>IMAGE SPECIFICATIONS</h2>
			<h3>Profile Course Logo</h3>
			<p>Profile logo images should be approximately, 600px x 600px (square), or 600px wide x 350px high (rectangle) images. All graphic images should be supplied in .png or .svg format, and at a resolution of 96 d.p.i.</p><br />

			<h3>Profile Header/ Footer Image</h3>
			<p>Profile header/ footer images should not be less than, 960px in width, and 240px in height. All photographic images should be supplied in .jpg or .jpeg format, and at a resolution of 96 d.p.i.</p><br />

			<h3>Profile Banner Adverts</h3>
			<p>The preferred size for the profile banner advert images are 960px wide x 315px high. All graphic image should also be supplied in .png or .svg format, and at a resolution of 96 d.p.i.</p><br />

			<h3>Note:</h3>
			<p>All images supplied may be subject to some cropping and/ or editing as deemed necessary at time of publication.</p>
		</div><!-- end #stats -->
	
		<div id="gs-images">
			<label class="" for="img_logo">Logo: </label>
			<input type="text" id="img_logo" name="img_logo" />
			<label class="" for="img_hdr">Header: </label>
			<input type="text" id="img_hdr" name="img_hdr" />
			<label class="" for="img_ftr">Footer: </label>
			<input type="text" id="img_ftr" name="img_ftr" />
		</div><!-- end #gs-images -->
		
		<input type="submit" name="submit" value="Submit Form" />
	</form><!-- end #gs-form -->

<?php endif; ?>	
	<div id="footer">
		<img id="ftr-img" src="https://www.golfscotland.net/wp-content/uploads/2020/05/gs-icon240-1-e1591278654912.png" name="Image2" width="51" height="53" alt="GS Logo" />
		<p id="ftr-txt"><a href="https://www.golfscotland.net" target="_blank">golfscotland.net</a></p>
	</div><!-- end #footer -->
</div><!-- end #wrapper -->
	
<!-- <?php else : ?>	-->

<?php
echo '<pre>'.PHP_EOL;
var_dump($_POST);
echo '</pre>'.PHP_EOL;

foreach($_POST as $item => $value) {
	$value = mysql_real_escape_string(htmlspecialchars(2));
	$newEntry[$item] = $value;
}
echo '<pre>'.PHP_EOL;
var_dump($_POST);
echo '</pre>'.PHP_EOL;
?>

<?php get_footer(); ?>