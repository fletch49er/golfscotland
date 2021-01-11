<?php
/**
 * Template Name: Scottish Courses Page
 */
// display alterative content layout using the following functions
// +12 results and mobile
function plus12 ($gs_gsdsr, $url, $img_path) {
	echo <<<EOT
		<table id="gs-allCourse">
			<thead>
				<tr>
					<th colspan="2">COURSE</th>
					<th class="gs-switch">REGION</th>
					<th>TYPE</th>
					<th>YRDS</th>
					<th class="center">PAR</th>
				</tr>
			</thead>
			<tbody>
EOT;
	foreach ($gs_gsdsr as $gsdsr) :
		$format_yrds = number_format($gsdsr->length) ;
		echo <<<EOT
				<tr>
					<td class="gs-link gs-img center">
						<a href="{$url}?courseID={$gsdsr->id}">
EOT;
		if($gsdsr->img_logo != null ) :
				echo '<img class="gs-imgLogo" src="'.$img_path.$gsdsr->img_logo.'" alt="course logo" />'.PHP_EOL;
		else :
				echo '<img class="gs-imgLogo" src="'.$img_path.'2020/05/gs-icon240-e1590336869748.png" alt="course logo" />'.PHP_EOL;
		endif;
		echo <<<EOT
						</a>
					</td>
					<td class="gs-link"><a href="{$url}?courseID={$gsdsr->id}">{$gsdsr->name}</a></td>
					<td class="gs-switch">{$gsdsr->region}</td>
					<td>{$gsdsr->type}</td>
					<td>{$format_yrds}</td>
					<td class="center">{$gsdsr->par}</td>
				</tr>
EOT;
	endforeach;
	echo <<<EOT
			</tbody>
		</table>
EOT;
}

//12 results
function less_than12($gs_gsdsr, $url, $img_path) {
	echo <<<EOT
		<table id="gs-allCourse12">
			<tbody>
EOT;
	foreach ($gs_gsdsr as $gsdsr) :
		echo <<<EOT
				<tr><td class="gs-link gs-img"><a href="{$url}?courseID=<{$gsdsr->id}">
					<img class="gs-imgLogo" src="{$img_path}{$gsdsr->img_logo}" alt="course logo" /></a></td></tr>
				<tr><td class="gs-link"><a href="{$url}?courseID={$gsdsr->id}">{$gsdsr->name}</a></td></tr>
				<tr><td class="gs-switch">{$gsdsr->region}</td></tr>
				<tr><td>{$gsdsr->type}</td></tr>
				<tr><td>{number_format($gsdsr->length)} yrds</td></tr>
				<tr><td class="center">{$gsdsr->par}</td></tr>
EOT;
	endforeach;
	echo <<<EOT
			</tbody>
		</table>
EOT;
}

// set data query gs_courses table - course details
//$gs_query = 'SELECT c.id, c.name, c.address, cr.region, ct.type, c.length, c.par, c.description, c.wkday_rnd, c.wkday_day, c.wkend_rnd, c.wkend_day, c.special_offers, c.img_logo FROM gs_courses AS c INNER JOIN gs_course_types AS ct ON c.type = ct.id INNER JOIN gs_course_regions AS cr ON c.region = cr.id';

// set data query gs_courses table - course details
$gs_query = 'SELECT c.id, c.name, cr.region, ct.type, c.length, c.par, c.top_course, c.img_logo FROM gs_courses AS c INNER JOIN gs_course_types AS ct ON c.type = ct.id INNER JOIN gs_course_regions AS cr ON c.region = cr.id';

// query string to fetch course region and type data
$region_query = 'SELECT id, region FROM gs_course_regions';
$type_query = 'SELECT id, type FROM gs_course_types';

// if $_GET does not exist
if(!isset($_GET['region'])) :
	$_GET = ['region' => '', 'type' => '', 'top_course' => 1];
	$gs_header = "Top Ten Courses:";
else :
	$gs_header = "List of Courses Found:";
endif;

	$count = 1;
	// set $gs_search_query string
	foreach($_GET as $name => $value) :

		// change html characters to unicode equivilant
		$gs_search_query = htmlspecialchars($value);
		// makes sure nobody uses SQL injection
		$gs_search_query = esc_sql($gs_search_query);

		// edit query to display search query selections if not null,
		// else display 'all'
		if($gs_search_query != null) {
			if($count > 1) {
				$gs_query .= ' AND c.'.$name.' = '.$gs_search_query;
			} else {
				$gs_query .= ' WHERE c.'.$name.' = '.$gs_search_query;
			}
			$count++;
		}
	endforeach;

	$gs_query .= ' AND c.switch = false ORDER BY ';
	// group by region order name
	if($_GET['region'] == null) {
		$gs_query .= 'region, ';
	}
	$gs_query .= 'name ASC';
	// echo $gs_query;
	$gs_gsdsr = $wpdb->get_results("".$gs_query."");

	// set url paths
	$url = 'https://www.golfscotland.net/courses/';
	$img_path = 'https://www.golfscotland.net/wp-content/uploads/';
	$video_path = 'https://www.youtube.com/embed/';

// open link to wp database
global $wpdb;

get_header();

get_template_part( 'templates/top-title' );
?>

<div id="gs-wrapper">
	<section id="gs-content" class="clearfix">
		<div id="gs-search-form-container">
			<form id="gs-search-form" action="scottish-courses" method="get">
				<div class="gs-query-box">
					<select id="gs-query-region" name="region">
						<option value="" selected>All Regions</option>
<?php
	$gs_regions = $wpdb->get_results("".$region_query."");
	foreach($gs_regions as $gs_region) :
?>
						<option value="<?php echo $gs_region->id; ?>"><?php echo $gs_region->region; ?></option>
<?php endforeach; ?>
					</select>
				</div><!-- end .gs-query-box -->
				<div class="gs-query-box">
					<select id="gs-query-type" name="type">
						<option value="" selected>All Types</option>
<?php
	$gs_types = $wpdb->get_results("".$type_query."");
	foreach($gs_types as $gs_type) :
?>
						<option value="<?php echo $gs_type->id; ?>"><?php echo $gs_type->type; ?></option>
<?php endforeach; ?>
					</select>
				</div><!-- end .gs-query-box -->
				<div class="gs-submit-box">
					<input id="gs-search-button" type="submit" value="SEARCH" />
				</div><!-- end .gs-submit-box -->
			</form><!-- end #gs-search-form -->
		</div><!-- end #gs-search-form-container -->

		<h2><?php echo $gs_header; ?></h2>
<?php
	if((count($gs_gsdsr)) == 0) {
		echo '<p>Sorry no course of that type found in this region.</p>';
	} else /*if(count($gs_gsdsr) < 25)*/ {
		plus12($gs_gsdsr, $url, $img_path);
	}
?>
	</section><!-- end #gs-content -->
</div><!-- end #gs-wrapper -->

<?php get_footer(); ?>
