<?php
/*
 * ========================================================================
 * File:		gs_data.php
 * Purpose: string variables, data arrays to populate website
 *			  	with dynamic content
 *
 * Author:	Mark Fletcher
 * Date:		20.11.2020
 *
 * Notes:
 *
 * Revision:
 *		20.11.2019	1st issue.
 *
 * ========================================================================
*/
// define constants
// company details
define ('COMPANY', 'MDA Media Ltd.');
define ('OWNER', 'MDA Media Ltd.');
define ('COMPANYNO', 'SC663153');
define ('ADDRESS', 'Suite 3 & 4 Orbital House 3 Redwood Crescent, East&nbsp;Kilbride G74 5PA, Scotland');
define ('TELEPHONE','+44&nbsp;7423&nbsp;608374');
define ('NAME', 'Golf Scotland');
define ('WEBSITE', 'https://www.golfscotland.net');
define ('EMAIL', 'info@golfscotland.net');
define ('VATNO', '349&nbsp;9373&nbsp;46');
define ('PUB_DATE', '01/07/2020');

//Google Keys
// Analytics Key
define ('ANALYTIC_KEY', 'G-GBZ4F2M6G9');
// Google Maps API Key
define ('MAP_KEY', 'AIzaSyB1uKUoWEHyWBD9KbKg8sJsl2gF1137VT8');

// navbar seperator
define('SEPERATOR', '|');

//policies t&cs data array
$ftr_navbar_data = [
	'site map' => 'sitemap',
	'terms &amp; conditions' => 'terms-conditions',
	'privacy policy' => 'privacy-policy',
	'disclaimer' => 'disclaimer',
	'copyright' => 'copyright'
];

// array of golf course types
$gs_types = [
	'Links',
	'Parkland',
  'Moorland',
	'Heathland',
	'Desert'
];

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

//key features array
$gs_keyFeatures = [
	"Trolley Hire",
	"Catering",
	"Club Hire",
	"Clubhouse",
	"Shower Available",
	"Changing Rooms",
	"Driving Range",
	"Proshop",
	"Putting Area",
	"Buggy Hire",
	"Tuition Available",
	"Conference Facilities",
	"Function Room Available",
	"Corporate Golf",
	"Society Golf"
];

$placeholder = [
	'name' => 'club or course name',
	'address' => 'your address including postcode',
	'select' => 'select an option',
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
