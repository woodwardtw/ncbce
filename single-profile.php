<?php 
/*
SINGLE profile TEMPLATE
*/


get_header();

	while ( have_posts() ) : the_post();

		/**
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 *
		 * Or, you can use the filter hook below to modify which content file to load.
		 */
		// Helper variables
?>

<article id="post-<?php the_ID(); ?>" class="profile">
	<h1><?php the_title();?></h1>
	<div class="entry-content">
		<?php
			echo 'profile';
		 ?>			

</article>

<?php 
endwhile;
get_footer();?>
