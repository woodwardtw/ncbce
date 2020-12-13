<?php 
/*
SINGLE Week TEMPLATE
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

<article id="post-<?php the_ID(); ?>" class="week">

	<div class="entry-content">
		<?php
			echo ncbce_week_questions();
			echo ncbce_week_big_ideas();	
			echo ncbce_week_lives();	
			echo ncbce_week_framing();
			echo ncbce_week_cornerstone();
			echo ncbce_week_dpi();
			echo ncbce_week_comptia();
			echo ncbce_week_hdi();
		 ?>			
		 <div class="essentials row nc-section">
		 	<h2>Essentials</h2>
		 	<?php echo ncbce_week_knowledge();?>
		 	<?php echo ncbce_week_skills();?>
		 </div>
		 <?php echo ncbce_week_vocab();?>
		 <?php echo ncbce_week_supporting_vocab();?>
		 <div class="map row nc-section">
		 	<?php echo ncbce_week_weekly_map();?>
		 </div>
		 	<?php echo ncbce_week_lessons();?>
		 	<?php echo ncbce_week_resources();?>
	</div>

</article>

<?php 
endwhile;
get_footer();?>
