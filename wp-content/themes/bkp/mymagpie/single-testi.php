<?php get_header(); ?>
<?php mymagpie_setPostViews(get_the_ID()); ?>
<div class="motopress-wrapper content-holder clearfix">
	<div class="container">
		<div class="row">
			<div class="<?php echo mymagpie_get_layout_class( 'full_width_content' ); ?>" data-motopress-wrapper-file="single-testi.php" data-motopress-wrapper-type="content">
				<div class="row">
					<div class="<?php echo mymagpie_get_layout_class( 'content' ); ?> <?php echo of_get_option('blog_sidebar_pos'); ?>" id="content" data-motopress-type="loop" data-motopress-loop-file="loop/loop-single-testi.php">
						<?php get_template_part("loop/loop-single-testi"); ?>
					</div>
					<div class="<?php echo mymagpie_get_layout_class( 'sidebar' ); ?> sidebar" id="sidebar" data-motopress-type="static-sidebar"  data-motopress-sidebar-file="sidebar.php">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>