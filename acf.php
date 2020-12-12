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

/*
WEEK SPECIFIC 
*/
function ncbce_week_questions(){
	if( have_rows('essential_questions') ):
	    // Loop through rows.
	    $html = '<div class="essential-questions"><h2>Essential Questions</h2><ul>';
	    while( have_rows('essential_questions') ) : the_row();

	        // Load sub field value.
	        $html .= '<li>' . get_sub_field('question') . '</li>';
	        
	        // Do something...
	    // End loop.
	    endwhile;
	    return $html . '</ul></div>';
		// No value.
		else :
		    // Do something...
		endif;
	}

function ncbce_week_big_ideas(){
	if (get_field('big_ideas')){
		$ideas = get_field('big_ideas');
		return "<div class='big-ideas'><h2>Big Ideas</h2> {$ideas}</div>";
	}
}


function ncbce_week_lives(){
	if (get_field('connections_to_students_lives')){
		$connection = get_field('connections_to_students_lives');
		return "<div class='lives'><h2>Connection to Student Lives</h2> {$connection}</div>";
	}
}

function ncbce_week_framing(){
	if (get_field('framing_problem')){
		$content = get_field('framing_problem');
		return "<div class='framing'><h2>Framing Problem</h2> {$content}</div>";
	}
}

function ncbce_week_cornerstone(){
	if (get_field('cornerstone_assessment')){
		$content = wpautop(get_field('cornerstone_assessment'));
		return "<div class='cornerstone'><h2>Cornerstone Assessment</h2>{$content}</div>";
	}
}

function ncbce_week_dpi(){
	if(get_field('dpi_standards')){
		$html = '<div class="dpi"><h2>DPI Standards</h2><ul>';
		$standards = get_field('dpi_standards');
		foreach ($standards as $key => $standard) {
			$html .= "<li>{$standard->name}</li>";
		}
		return $html . '</ul></div>';
	}
}

function ncbce_week_comptia(){
	if( have_rows('comptia_domain_objectives') ):
	    // Loop through rows.
	    $html = '<div class="comptia"><h2>CompTIA Objectives</h2><ul>';
	    while( have_rows('comptia_domain_objectives') ) : the_row();

	        // Load sub field value.
	        $html .= '<li>' . get_sub_field('objective') . '</li>';
	        
	        // Do something...
	    // End loop.
	    endwhile;
	    return $html . '</ul></div>';
		// No value.
		else :
		    // Do something...
		endif;
}

function ncbce_week_hdi(){
	if(get_field('hdi_competencies')){
		$html = '<div class="hdi"><h2>HDI Standards</h2><ul>';
		$standards = get_field('hdi_competencies');	
		foreach ($standards as $key => $standard) {
			$html .= "<li>{$standard->name}</li>";
		}
		return $html . '</ul></div>';
	}
}


function ncbce_week_knowledge(){
	$html = '';
	if( have_rows('essential_knowledge_block') ):
		$html = '<div class="knowledge col-md-6"><h2>Essential Knowledge</h2><ul>';
	    // Loop through rows.
	    while( have_rows('essential_knowledge_block') ) : the_row();

	        // Load sub field value.
	        $knowledge = get_sub_field('essential_knowledge');
	        $html .= "<li>{$knowledge}</li>";
	        // Do something...
	    // End loop.
	    endwhile;
	    return $html . "</ul></div>";
		// No value.
		else :
		    // Do something...
		endif;
	}


function ncbce_week_skills(){
	$html = '';
	if( have_rows('essential_skills_block') ):
		$html = '<div class="skills col-md-6"><h2>Essential Skills</h2><ul>';
	    // Loop through rows.
	    while( have_rows('essential_skills_block') ) : the_row();

	        // Load sub field value.
	        $skill = get_sub_field('essential_skill');
	        $html .= "<li>{$skill}</li>";
	        // Do something...
	    // End loop.
	    endwhile;
	    return $html . "</ul></div>";
		// No value.
		else :
		    // Do something...
		endif;
	}

function ncbce_week_vocab(){
	$html = '';
	if( have_rows('vocabulary') ):
		$html = '<div class="vocabulary"><h2>Vocabulary</h2><ul>';
	    // Loop through rows.
	    while( have_rows('vocabulary') ) : the_row();

	        // Load sub field value.
	        $word = get_sub_field('word');
	        $definition = get_sub_field('definition');
	        $html .= "<li><span class='word'>{$word}</span> - {$definition}</li>";
	        // Do something...
	    // End loop.
	    endwhile;
	    return $html . "</ul></div>";
		// No value.
		else :
		    // Do something...
		endif;
	}


function ncbce_week_supporting_vocab(){
	$html = '';
	if( have_rows('supporting_vocabulary') ):
		$html = '<div class="supporting-vocabulary"><h2>Supporting Vocabulary</h2><ul>';
	    // Loop through rows.
	    while( have_rows('supporting_vocabulary') ) : the_row();

	        // Load sub field value.
	        $word = get_sub_field('word');
	        $html .= "<li>{$word}</li>";
	        // Do something...
	    // End loop.
	    endwhile;
	    return $html . "</ul></div>";
		// No value.
		else :
		    // Do something...
		endif;
	}

function ncbce_week_weekly_map(){
	if (get_field('weekly_map')){
		$map = get_field('weekly_map');
		$mon = "<div class='day col'><h3>Monday</h3>{$map['monday']}</div>"; //<div class='mon'><h3>Monday</h3>
		$tues = "<div class='day col'><h3>Tuesday</h3>{$map['tuesday']}</div>";
		$wed = "<div class='day col'><h3>Wednesday</h3>{$map['wednesday']}</div>";
		$thurs = "<div class='day col'><h3>Thursday</h3>{$map['thursday']}</div>";
		$fri = "<div class='day col'><h3>Friday</h3>{$map['friday']}</div>";
		return '<div class="col-md-12"><h2>Weekly Map</h2></div>' .$mon . $tues . $wed . $thurs . $fri; 
	}

}

function ncbce_week_lessons(){
	$html = "<div class='lessons'><h2>Lesson Ideas</h2>";
	if(get_field('lesson_ideas')){
		return $html . get_field('lesson_ideas') . "</div>";
	}
}

function ncbce_week_resources(){
	$html = "<div class='resources'><h2>Potential Resources</h2>";
	if(get_field('potential_resources')){
		return $html . get_field('potential_resources') . "</div>";
	}
}



//sort alpha for supporting vocabulary
function sort_vocab_alpha( $value, $post_id, $field ) {
	
	// vars
	$order = array();
	
	// bail early if no value
	if( empty($value) ) {
		
		return $value;
		
	}
	
	// populate order
	foreach( $value as $i => $row ) {
		
		$order[ $i ] = $row['field_5fd5313108142'];
		
	}
	
	// multisort
	array_multisort( $order, SORT_ASC,SORT_NATURAL|SORT_FLAG_CASE, $value );
	
	
	// return	
	return $value;
	
}

add_filter('acf/load_value/name=supporting_vocabulary', 'sort_vocab_alpha', 10, 3);
