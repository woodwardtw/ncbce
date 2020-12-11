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

//