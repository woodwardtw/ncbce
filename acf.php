<?php 
/*
Here's your ACF SPECIFIC CODE
*/


/*
UNIT SPECIFIC
*/


//unit description
function ncbce_unit_description(){
	if(get_field('unit_description')){
		$description = get_field('unit_description');
		$html = "<div class='unit-description'><h2>Unit Description</h2>{$description}</div>";
		return $html;
	}
}

//weeks for unit

function ncbce_unit_weeks(){
	$weeks = get_field('weeks');
	$html = '<div class="instructional-time">';
	$html .= "<h2>Instructional Time</h2><div class='weekly-total'>" . sizeof($weeks) . " weeks</div><ul>";
	if( $weeks ): 
	    foreach( $weeks as $key=>$week ): 
	    	$permalink = get_permalink( $week->ID );
        	$title = get_the_title( $week->ID );
        	if(explode(':', $title)[2]){
        		$clean_title = explode(':', $title)[2];
        	} else {
        		$clean_title = $title;
        	}
	        $html .= '<li><a href="' . $permalink . '">Week ' . ($key +1) . ': '  . $clean_title . '</a></li>';
	       endforeach; 
	       return $html . '</ul></div>';
	    // Reset the global post object so that the rest of the page works correctly.
	    wp_reset_postdata();  
	endif; 
}

function ncbce_unit_map(){
	$html = '<div class="weekly-map"><h2>Weekly Map</h2>';
	$map = get_field('general_weekly_map');
	//var_dump($map);
	$mon = "<div class='day'><h3>Monday</h3>{$map['monday']}</div>"; //<div class='mon'><h3>Monday</h3>
	$tues = "<div class='day'><h3>Tuesday</h3>{$map['tuesday']}</div>";
	$wed = "<div class='day'><h3>Wednesday</h3>{$map['wednesday']}</div>";
	$thurs = "<div class='day'><h3>Thursday</h3>{$map['thursday']}</div>";
	$fri = "<div class='day'><h3>Friday</h3>{$map['friday']}</div>";
    return $html . "<div class='week'>{$mon}{$tues}{$wed}{$thurs}{$fri}</div></div>";
}