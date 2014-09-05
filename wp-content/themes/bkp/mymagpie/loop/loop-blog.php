<?php /* Loop Name: Blog */ ?>
<!-- displays the tag's description from the Wordpress admin -->
<?php
	if (is_tag())
		echo tag_description();

	if (have_posts()) : while (have_posts()) : the_post();
		// The following determines what the post format is and shows the correct file accordingly
		echo '<div class="post_wrapper">';
			echo $format = get_post_format();
			get_template_part( 'includes/post-formats/'.$format );

			if ($format == ''){ ?>
			<div class="latest_blog">
				<?php if(get_post_thumbnail_id()){ ?>
            	<div class="latest_featured_img">
					<?php get_template_part('includes/post-formats/post-thumb'); ?>
                </div>
				<?php } ?>
                <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
                <p>
						<?php
							if (of_get_option('post_excerpt')=="true" || of_get_option('post_excerpt')=='') { ?>
								<div class="excerpt">
								<?php

								if (has_excerpt()) {
									the_excerpt();
								} else {
									if (!is_search()) {
										$content = get_the_content();
										echo my_string_limit_words($content,55);
									} else {
										$excerpt = get_the_excerpt();
										echo my_string_limit_words($excerpt,55);
									}
								} ?>
							</div>
						<?php }
							$button_text = of_get_option('blog_button_text') ? apply_filters( 'mymagpie_text_translate', of_get_option('blog_button_text'), 'blog_button_text' ) : theme_locals("read_more") ;
						?>
						<a href="<?php the_permalink() ?>" class="btn btn-primary"><?php echo $button_text; ?></a>
						<div class="clear"></div></p>
                <div class="clear"></div>
            </div>
		<?php	}
		echo '</div>';
		endwhile; else: ?>

		<div class="no-results">
			<?php echo '<p><strong>' .theme_locals("there_has"). '</strong></p>'; ?>
			<p><?php echo theme_locals("we_apologize"); ?> <a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>"><?php echo theme_locals("return_to"); ?></a> <?php echo theme_locals("search_form"); ?></p>
				<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
		</div><!--no-results-->
	<?php endif;

if ( !is_home() ) {
	get_template_part('includes/post-formats/post-nav');
} ?>