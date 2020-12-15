<?php 
/*
Here's your ACF SPECIFIC CODE
*/


/*
UNIT SPECIFIC
*/


//unit description
function ncbce_unit_description(){
	$node = ncbce_rand_node();
	if(get_field('unit_description')){
		$description = get_field('unit_description');
		$html = "<div class='unit-description nc-section'><h2{$node}><span class='white-out'>Unit Description</span></h2>{$description}</div>";
		return $html;
	}
}

//weeks for unit

function ncbce_unit_weeks(){
	$node = ncbce_rand_node();
	$weeks = get_field('weeks');
	$html = '<div class="instructional-time nc-section">';
	$html .= "<h2{$node}><span class='white-out'>Instructional Time</span></h2><div class='weekly-total'>" . sizeof($weeks) . " weeks</div><ul>";
	if( $weeks ): 
	    foreach( $weeks as $key=>$week ): 
	    	$permalink = get_permalink( $week );
        	$title = get_the_title( $week );
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
	$node = ncbce_rand_node();
	$html = "<div class='weekly-map nc-section'><h2{$node}><span class='white-out'>Weekly Map</span></h2>";
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
	$node = ncbce_rand_node();
	if( have_rows('essential_questions') ):
	    // Loop through rows.
	    $html = "<div class='essential-questions nc-section'><h2{$node}><span class='white-out'>Essential Questions</span></h2><ul>";
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
	$node = ncbce_rand_node();
	if (get_field('big_ideas')){
		$ideas = get_field('big_ideas');
		return "<div class='big-ideas nc-section'><h2{$node}><span class='white-out'>Big Ideas</span></h2> {$ideas}</div>";
	}
}


function ncbce_week_lives(){
	$node = ncbce_rand_node();
	if (get_field('connections_to_students_lives')){
		$connection = get_field('connections_to_students_lives');
		return "<div class='lives nc-section'><h2{$node}><span class='white-out'>Connection to Student Lives</span></h2> {$connection}</div>";
	}
}

function ncbce_week_framing(){
	$node = ncbce_rand_node();
	if (get_field('framing_problem')){
		$content = get_field('framing_problem');
		return "<div class='framing nc-section'><h2{$node}><span class='white-out'>Framing Problem</span></h2> {$content}</div>";
	}
}

function ncbce_week_cornerstone(){
	$node = ncbce_rand_node();
	if (get_field('cornerstone_assessment')){
		$content = wpautop(get_field('cornerstone_assessment'));
		return "<div class='cornerstone nc-section'><h2{$node}><span class='white-out'>Cornerstone Assessment</span></h2>{$content}</div>";
	}
}

function ncbce_week_dpi(){
	$node = ncbce_rand_node();
	if(get_field('dpi_standards')){
		$html = "<div class='dpi nc-section'><h2{$node}><span class='white-out'>DPI Standards</span></h2><ul>";
		$standards = get_field('dpi_standards');
		foreach ($standards as $key => $standard) {
			$html .= "<li>{$standard->name}</li>";
		}
		return $html . '</ul></div>';
	}
}

function ncbce_week_comptia(){
	$node = ncbce_rand_node();
	if( have_rows('comptia_domain_objectives') ):
	    // Loop through rows.
	    $html = "<div class='comptia nc-section'><h2{$node}><span class='white-out'>CompTIA Objectives</span></h2><ul>";
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
	$node = ncbce_rand_node();
	if(get_field('hdi_competencies')){
		$html = "<div class='hdi nc-section'><h2{$node}><span class='white-out'>HDI Standards</span></h2><ul>";
		$standards = get_field('hdi_competencies');	
		foreach ($standards as $key => $standard) {
			$html .= "<li>{$standard->name}</li>";
		}
		return $html . '</ul></div>';
	}
}


function ncbce_week_knowledge(){
	$html = '';
	$node = ncbce_rand_node();
	if( have_rows('essential_knowledge_block') ):
		$html = "<div class='knowledge col-md-6 nc-section'><h2{$node}><span class='white-out'>Knowledge</span></h2><ul>";
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
	$node = ncbce_rand_node();
	if( have_rows('essential_skills_block') ):
		$html = "<div class='skills col-md-6 nc-section'><h2{$node}><span class='white-out'>Skills</span></h2><ul>";
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
	$node = ncbce_rand_node();
	if( have_rows('vocabulary') ):
		$html = "<div class='vocabulary nc-section'><h2{$node}><span class='white-out'>Vocabulary</span></h2><ul>";
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
	$node = ncbce_rand_node();
	if( have_rows('supporting_vocabulary') ):
		$html = "<div class='supporting-vocabulary nc-section'><h2 {$node}><span class='white-out'>Supporting Vocabulary</span></h2><ul>";
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
	$node = ncbce_rand_node();
	if (get_field('weekly_map')){
		$map = get_field('weekly_map');
		$mon = "<div class='day col'><h3>Monday</h3>{$map['monday']}</div>"; //<div class='mon'><h3>Monday</h3>
		$tues = "<div class='day col'><h3>Tuesday</h3>{$map['tuesday']}</div>";
		$wed = "<div class='day col'><h3>Wednesday</h3>{$map['wednesday']}</div>";
		$thurs = "<div class='day col'><h3>Thursday</h3>{$map['thursday']}</div>";
		$fri = "<div class='day col'><h3>Friday</h3>{$map['friday']}</div>";
		return "<div class='col-md-12'><h2{$node}><span class='white-out'>Weekly Map</span></h2></div>" .$mon . $tues . $wed . $thurs . $fri; 
	}

}

function ncbce_week_lessons(){
	$node = ncbce_rand_node();
	$html = "<div class='lessons nc-section'><h2{$node}><span class='white-out'>Lesson Ideas</span></h2>";
	if(get_field('lesson_ideas')){
		return $html . get_field('lesson_ideas') . "</div>";
	}
}

function ncbce_week_resources(){
	$node = ncbce_rand_node();
	$html = "<div class='resources nc-section'><h2{$node}><span class='white-out'>Potential Resources</span></h2>";
	if(get_field('potential_resources')){
		return $html . get_field('potential_resources') . "</div>";
	}
}


function ncbce_rand_node(){
	$url = plugin_dir_url( __FILE__) . 'imgs/';
	$number = rand(1,5);
	return " style='background-image:url({$url}node-{$number}.svg)'";

}


/*
NARRATIVE SPECIFIC
*/




//sort alpha for supporting vocabulary
function sort_extra_vocab_alpha( $value, $post_id, $field ) {
	
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

add_filter('acf/load_value/name=supporting_vocabulary', 'sort_extra_vocab_alpha', 10, 3);

//sort alpha for regular vocabulary
function sort_vocab_alpha( $value, $post_id, $field ) {
	
	// vars
	$order = array();
	
	// bail early if no value
	if( empty($value) ) {
		
		return $value;
		
	}
	
	// populate order
	foreach( $value as $i => $row ) {
		
		$order[ $i ] = $row['field_5fd528066dd61'];
		
	}
	
	// multisort
	array_multisort( $order, SORT_ASC,SORT_NATURAL|SORT_FLAG_CASE, $value );
	
	
	// return	
	return $value;
	
}

add_filter('acf/load_value/name=vocabulary', 'sort_vocab_alpha', 10, 3);
