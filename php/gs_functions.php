<?php
/*
 * ===================================================================
 * Function:	plus25()
 * Purpose:		Function to display 25+ results of database search result
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
function plus25($gs_gsdsr, $url, $img_path) {
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

/*
 * ===================================================================
 * Function:	plus20()
 * Purpose:		Function to display 20+ results of database search result
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
 //12 results
 function less_than25($gs_gsdsr, $url, $img_path) {
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
