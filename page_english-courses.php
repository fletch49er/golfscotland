<?php
/**
 * Template Name: English Courses Page
 */
/*
  * ===================================================================
  * Function:	plus25()
  * Purpose:	Function to display 25+ results of database search result
  * Author:		Mark Fletcher
  * Date:			17.11.2020
  *
  * Input:
  * 	$gs_gsdsr -
  *  $url      -
  *  $img_path -
  *
  * Output:
  * 	HTML table of database search result
  *
  * Notes:
  *
  * ==================================================================
  */
function ge_plus25($ge_gedsr, $url, $img_path) {
	echo <<<EOT
		<table id="ge-allCourse">
			<thead>
				<tr>
					<th colspan="2">COURSE</th>
					<th class="ge-switch">REGION</th>
					<th>TYPE</th>
					<th>YRDS</th>
					<th class="center">PAR</th>
				</tr>
			</thead>
			<tbody>
EOT;
	foreach ($ge_gedsr as $gedsr) :
		$format_yrds = number_format($gedsr->length) ;
		echo <<<EOT
				<tr>
					<td class="gs-link ge-img center">
						<a href="{$url}?courseID={$gedsr->id}">
EOT;
		if($gedsr->img_logo != null ) :
				echo '<img class="ge-imgLogo" src="'.$img_path.$gedsr->img_logo.'" alt="course logo" />'.PHP_EOL;
		else :
				echo '<img class="ge-imgLogo" src="'.$img_path.'2021/01/ge-icon_white.png" alt="course logo" />'.PHP_EOL;
		endif;
		echo <<<EOT
						</a>
					</td>
					<td class="ge-link"><a href="{$url}?courseID={$gedsr->id}">{$gedsr->name}</a></td>
					<td class="ge-switch">{$gedsr->region}</td>
					<td>{$gedsr->type}</td>
					<td>{$format_yrds}</td>
					<td class="center">{$gedsr->par}</td>
				</tr>
EOT;
	endforeach;
	echo <<<EOT
			</tbody>
		</table>
EOT;
}

// set data query gs_courses table - course details
$ge_query = 'SELECT c.id, c.name, cr.region, ct.type, c.length, c.par, c.top_course, c.img_logo FROM ge_courses AS c INNER JOIN ge_course_types AS ct ON c.type = ct.id INNER JOIN ge_course_regions AS cr ON c.region = cr.id';

// query string to fetch course region and type data
$region_query = 'SELECT id, region FROM ge_course_regions';
$type_query = 'SELECT id, type FROM ge_course_types';

// if $_GET does not exist
if(!isset($_GET['region'])) :
	$_GET = ['region' => '', 'type' => '', 'top_course' => true];
	$ge_header = "Top Ten Courses:";
else :
	$ge_header = "List of Courses Found:";
endif;

	$count = 1;
	// set $ge_search_query string
	foreach($_GET as $name => $value) :

		// change html characters to unicode equivilant
		//  and make sure nobody uses SQL injection
		$ge_search_query = esc_sql(htmlspecialchars($value));

		// edit query to display search query selections if not null,
		// else display 'all'
		if($ge_search_query != null) {
			if($count > 1) {
				$ge_query .= ' AND c.'.$name.' = '.$ge_search_query;
			} else {
				$ge_query .= ' WHERE c.'.$name.' = '.$ge_search_query;
			}
			$count++;
		}
	endforeach;

	$ge_query .= ' AND c.switch = true ORDER BY ';
	// group by region order name
	if($_GET['region'] == null) {
		$ge_query .= 'region, ';
	}
	$ge_query .= 'name ASC';
	// echo $gs_query;
	$ge_gedsr = $wpdb->get_results("".$ge_query."");

	// set url paths
	$url = 'https://www.golfscotland.net/courses-english/';
	$img_path = 'https://www.golfscotland.net/wp-content/uploads/';
	$video_path = 'https://www.youtube.com/embed/';

// open link to wp database
global $wpdb;

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

<div id="ge-wrapper">
	<section id="ge-content" class="clearfix">
		<div id="ge-search-form-container">
			<form id="ge-search-form" action="english-courses" method="get">
				<div class="ge-query-box">
					<select id="ge-query-region" name="region">
						<option value="" selected>All Regions</option>
<?php
	$ge_regions = $wpdb->get_results("".$region_query."");
	foreach($ge_regions as $ge_region) :
?>
						<option value="<?php echo $ge_region->id; ?>"><?php echo $ge_region->region; ?></option>
<?php endforeach; ?>
					</select>
				</div><!-- end .ge-query-box -->
				<div class="ge-query-box">
					<select id="ge-query-type" name="type">
						<option value="" selected>All Types</option>
<?php
	$ge_types = $wpdb->get_results("".$type_query."");
	foreach($ge_types as $ge_type) :
?>
						<option value="<?php echo $ge_type->id; ?>"><?php echo $ge_type->type; ?></option>
<?php endforeach; ?>
					</select>
				</div><!-- end .ge-query-box -->
				<div class="ge-submit-box">
					<input id="ge-search-button" type="submit" value="SEARCH" />
				</div><!-- end .ge-submit-box -->
			</form><!-- end #ge-search-form -->
		</div><!-- end #ge-search-form-container -->

		<h2><?php echo $ge_header; ?></h2>
<?php
	if((count($ge_gedsr)) == 0) {
		echo '<p>Sorry no course of that type found in this region.</p>';
	} else /*if(count($ge_gsdsr) < 25)*/ {
		ge_plus25($ge_gedsr, $url, $img_path);
	}
?>
	</section><!-- end #ge-content -->
</div><!-- end #ge-wrapper -->

<?php get_footer(); ?>
