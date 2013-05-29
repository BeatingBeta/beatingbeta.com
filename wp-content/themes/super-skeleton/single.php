<?php get_header(); ?>



<!-- ============================================== -->


<!-- CATEGORY QUERY + START OF THE LOOP -->
<?php while (have_posts()) : the_post(); ?>		


<!-- ============================================== -->


<!-- FlexSlider Conditional -->
<?php if(get_custom_field('image_slider') == 'Yes') {
	get_template_part( 'element', 'pageslider' ); 
} else {}; ?>


<!-- ============================================== -->

  
<!-- Super Container -->
<div class="super-container main-content-area" id="section-content">


	<!-- 960 Container -->
	<div class="container">		
		
		<
		
		<!-- CONTENT -->
		<div class="sixteen columns content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			
			<h1 class="title"><span><?php the_title(); ?></span></h1>
			
			<hr class="half-bottom" />
					
										
			<div class="date"> 
				<?php _e('Posted on', 'skeleton') ?> <?php the_time(__ ('F', 'skeleton'));?> <?php the_time(__ ('jS', 'skeleton'));?>, <?php _e('by', 'skeleton')?> <?php the_author(); ?>.			
			</div>	 
				 	
			<hr />
				 	
			<!-- Featured Image -->
			<?php if(get_option_tree('show_featured_image') == 'Yes') : ?>

				<?php if (has_post_thumbnail( $post->ID )) {
				 		
						// Check for Sencha preferences, set the variable if the user wants it.
						// Unused as of 1.04 for the time being until some bugs get sorted out
				 		if (get_option_tree('sencha') == 'Yes') { 
							$sencha = 'http://src.sencha.io/';
						} else {
							$sencha = '';
						} 
						
						// Grab the URL for the thumbnail (featured image)
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
						$post_slug = str_replace(" ", "-",$post->post_name);
						
						// Check for a lightbox link, if it exists, use that as the value. 
						// If it doesn't, use the featured image URL from above.
						if(get_custom_field('lightbox_link')) { 							
							$lightbox_link = get_custom_field('lightbox_link'); 							
						} else {							
							$lightbox_link = $image[0];							
						}
						
						?>
					<a href="<?php echo $lightbox_link; ?>" data-rel="prettyPhoto[<?php echo $post_slug; ?>]">
						<img class="aligncenter" src="<?php echo $sencha; ?><?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
					</a>
							
				<br class="clearfix" />					
				<?php } else {} ?>	 
				
			<?php endif; ?>
				
				
				<!-- THE POST LOOP -->				
				
				
				<!-- ============================================ -->
			
			
				<!-- THE POST CONTENT -->	
				<div class="the_content post type-post hentry excerpt clearfix">	
					
					
					
					<?php the_content(); ?>
					<br />
					<?php wp_link_pages('before=<div id="page-links"><span>Pages:</span>&after=</div>&link_before=<div>&link_after=</div>'); ?>
				
				</div>
				<!-- /THE POST CONTENT -->
				
				<hr class="remove-top"/>
				
				<!-- COMMENTS SECTION -->
				<?php comments_template(); ?>
				<div class="hidden"><?php wp_list_comments(); ?></div>
				<?php next_comments_link(); previous_comments_link(); ?>
				<div class="hidden"><?php comment_form(); ?></div>
				<!-- COMMENTS-SECTION -->
				
				
							
			<?php endwhile; ?>
			<!-- /POST LOOP -->			
	
		
		</div>	
		<!-- /CONTENT -->
		
		
		
		
		<!-- ============================================== -->
		
		
		<?php if(get_custom_field('remove_sidebar') == 'Yes') { } else {  } ?>
				

	</div>
	<!-- /End 960 Container -->
	
</div>
<!-- /End Super Container -->


<!-- ============================================== -->


<?php get_footer(); ?>