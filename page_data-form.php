<?php
/**
 * Template Name: Course Profile Form
 */
 
//get_header();

//get_template_part('templates/top-title');

// array of golf course regions
$gs_regions = [
	'Aberdeen &amp; Grampian',
	'Angus &amp; Dundee',
	'Argyll Ayrshire',
	'Dumfries &amp; Galloway',
	'Edinburgh &amp; the Lothians',
	'Fife',
	'Glasgow &amp; Clyde Valley',
	'Orkney',
	'Perthshire',
	'Stirling &amp; The Trossachs',
	'The Outer &amp; Inner Hebrides',
	'The Scottish Borders',
	'The Scottish Highlands',
	'The Shetland Islands'
];
// array of golf course types
$gs_types = [
	'Links',
	'Parkland',
	'Desert'
];
$gs_required = '';
$placeholder = [
	'name' => 'club or course name',
	'address' => 'your address including postcode',
	'par' => 'par',
	'length' => 'yards',
	'phone' => 'telephone number',
	'website' => 'https://www.yourdomainname.com',
	'email' => 'your@emailaddrss.com',
	'facebook' => 'https://www.facebook.com/yourusername/',
	'twitter' => 'https://twitter.com/yourusername',
	'instagram' => 'https://www.instagram.com/yourusername/'
];
?>
<!-- custom golf scotland stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/data_form.css"  />

<div id="wrapper">
	<div id="header">
		<img id="hdr-img" src="images/gs-logo_blue.png" width="150" height="59" border="0"/>
	</div><!-- end #header -->

	<h1>COURSE PROFILE FORM</h1>
<?php if(!isset($_POST['submit'])) : ?>
	<form id="gs-form" action="/data-form" method="post">
		<div id="course-details">
			<h2>COURSE DETAILS</h2>		
			<p class="note">NOTE: <span class="red">*</span> Denotes a required field.</p>
			<label class="detail-label1" for="name"><span class="red">*</span>Name:</label>
			<input type="text" id="name" name="name" placeholder="<?php echo $placeholder['name']; ?>" size="85" maxlength="100" required /><br />
			<label class="detail-label1" for="address"><span class="red">*</span>Address:</label>
			<input type="text" id="address" name="address" placeholder="<?php echo $placeholder['address']; ?>" size="85" maxlength="150" required /><br />
			<label class="detail-label1" for="region"><span class="red">*</span>Region:</label>
			<select id="region" name="region">
				<option value="" selected ></option>
<?php
	foreach($gs_regions as $region) {
		echo  '<option value="'.$region.'">'.$region.'</option>'.PHP_EOL;
	}
?>
			</select><br />
			<label class="detail-label1" for="course_type"><span class="red">*</span>Type:</label>
			<select id="course_type" name="course_type">
				<option value="" selected></option>
<?php
	foreach($gs_types as $type) {
		echo  '<option value="'.$type.'">'.$type.'</option>'.PHP_EOL;
	}
?>
			</select>
			<label class="detail-label2" for="par"><span class="red">*</span>Par:</label>
			<input type="text" id="par" name="par" placeholder="<?php echo $placeholder['par']; ?>" size="10" maxlength="3" />
			<label class="detail-label2" for="length"><span class="red">*</span>Length:</label>
			<input type="text" id="length" name="length" placeholder="<?php echo $placeholder['length']; ?>" size="10" maxlength="6" /> yrds
		</div><!-- end #course-details -->

		<div id="contact-details">
			<h2>CONTACT DETAILS</h2>		
			<p class="note">NOTE: <span class="red">*</span> Denotes a required field.</p>
			<h3 class="western">Direct:</h3>
			<label class="detail-label1" for="telephone"><span class="red">*</span>Telephone:</label>
			<input type="text" id="telephone" name="telephone" placeholder="<?php echo $placeholder['phone']; ?>" size="25" max-length="25" /><br />
			<label class="detail-label1" for="website"><span class="red">*</span>Website:</label>	
			<input type="text" id="website" name="website" placeholder="<?php echo $placeholder['website']; ?>" size="85" max-length="75" /><br />
			<label class="detail-label1" for="email"><span class="red">*</span>Email:</label>
			<input type="email" id="email" name="email" placeholder="<?php echo $placeholder['email']; ?>" size="85" max-length="75" />
			
			<h3>Social Media:</h3>		
			<p class="note">NOTE: Please leave blank if not applicable.</p>
			<label class="detail-label1" for="facebook">Facebook:</label>
			<input type="text" id="facebook" name="facebook" placeholder="<?php echo $placeholder['facebook']; ?>" size="85" max-length="75" /><br />
			<label class="detail-label1" for="twitter">Twitter:</label>
			<input type="text" id="twitter" name="twitter" placeholder="<?php echo $placeholder['twitter']; ?>" size="85" max-length="75" /><br />
			<label class="detail-label1" for="instagram">Instagram:</label>
			<input type="text" id="instagram" name="instagram" placeholder="<?php echo $placeholder['instagram']; ?>" size="85" max-length="75" /><br />
			
			<input type="submit" name="submit" value="Submit Form" />
		</div><!-- end #contact-details -->
	</form><!-- end #gs-form -->
<?php
else :

echo '<pre>'.PHP_EOL;
var_dump($_POST);
echo '</pre>'.PHP_EOL;

foreach($_POST as $item => $value) {
	$value = mysql_real_escape_string(htmlspecialchars(2));
	$newEntry[$item] = $value;
}

?>

<?php endif; ?>
	<div id="footer">
		<img id="ftr-img" src="https://www.golfscotland.net/wp-content/uploads/2020/05/gs-icon240-1-e1591278654912.png" name="Image2" width="51" height="53" alt="GS Logo" />
		<p id="ftr-txt"><a href="https://www.golfscotland.net" target="_blank">golfscotland.net</a></p>
	</div><!-- end #footer -->
</div><!-- end #wrapper -->

<?php //get_footer(); ?>