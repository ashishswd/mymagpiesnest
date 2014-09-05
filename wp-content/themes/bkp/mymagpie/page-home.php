<?php
/**
* Template Name: Home Page
*/

get_header(); ?>

<section class="homepage_banner">
	<section class="prdct_header_wrapper">
        <section class="content_wrapper">
            <header class="prdct_header">
                <nav class="category_menu">
                	<span>browse: </span>
					<?php get_template_part("static/static-nav"); ?>
                </nav>
                <div class="search">
                    <form>
                        <label>Search: <input type="search" class="search_input"></label><i class="fa fa-search"></i>
                    </form>
                </div>
                <div class="clear"></div>
            </header>
            
        </section>  
	</section>
    <section class="content_wrapper">
        <section class="homepage_wrapper" style="padding:0px;">
					<?php get_template_part("static/static-slider"); ?>
        </section>            
    </section>
</section>
<div class="motopress-wrapper content-holder clearfix">
	<div class="container">
		<div class="row">
			<?php do_action( 'mymagpie_before_home_page_content' ); ?>
			<div class="<?php echo apply_filters( 'mymagpie_home_layout', 'span12' ); ?>" data-motopress-wrapper-file="page-home.php" data-motopress-wrapper-type="content">
				<div class="row">
					<div class="<?php echo apply_filters( 'mymagpie_home_layout', 'span12' ); ?>" data-motopress-type="loop" data-motopress-loop-file="loop/loop-page.php">
						<?php get_template_part("loop/loop-page"); ?>
					</div>
				</div>
			</div>
			<?php do_action( 'mymagpie_after_home_page_content' ); ?>
		</div>
	</div>
</div>

<section class="content_wrapper">
	<section class="homepage_wrapper">
    	<div class="prdcts_container_home">		
			<?php
				$taxonomy = 'product_cat';
				$tax_terms = get_terms($taxonomy);
			foreach ($tax_terms as $tax_term) {

					$thumbnail_id = get_woocommerce_term_meta( $tax_term->term_id, 'thumbnail_id', true );
					$image = wp_get_attachment_image( $thumbnail_id, array(300 . '&#37;', 300 . '&#37;'), true);
					$url = wp_get_attachment_url($thumbnail_id);
					if($tax_term->term_id == 15 || $tax_term->term_id == 20){
				?>
				<div class="prdcts alignleft" style="background-image:url(<?php echo $url ?>); background-size: 100%; background-repeat: no-repeat;">
					<div class="prdcts_detail">
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<div class="browse_btn">
							<a href="<?php echo get_bloginfo('url'); ?>/?product_cat=<?php echo $tax_term->slug; ?>"><?php echo $tax_term->name; ?></a>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<?php
					}
			}
			?>
			<?php
			$args = array(
				'post_type' => 'product',
				'orderby' => $orderby,
			);
			$wp_query = new WP_Query($args);
			$i==0;
			?>
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
				global $product;
					$thumbnail_id = get_woocommerce_term_meta( $product->id, 'thumbnail_id', true );
					$image = wp_get_attachment_image( $thumbnail_id, array(300 . '&#37;', 300 . '&#37;'), true);
					$url = wp_get_attachment_url($thumbnail_id);
					$src = wp_get_attachment_image_src( get_post_thumbnail_id($product->id), array(300 . '&#37;', 300 . '&#37;'));
				?>
				<div class="prdcts alignleft" style="background-image:url(<?php echo $src[0]; ?>); background-size: 100%; background-repeat: no-repeat;">
					<div class="prdcts_detail">
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<div class="browse_btn">
							<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>"><?php echo $post->post_title; ?></a>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<?php break; endwhile; ?>
				<?php wp_reset_query();?>
            <div class="clear"></div>
        </div>
        <div class="shipping_loyalty">
        	<div class="two_col shippinp_details alignleft">
            	<a href="">Shipping information/details</a>
            </div>
            <div class="two_col loyalty_details alignleft">
            	<a href="">Loyalty system information/details</a>
            </div>
            <div class="clear"></div>
        </div>
        <div class="quick_links">
        	<div class="latest_article quick_link_box alignleft">
				<?php dynamic_sidebar("home-sidebar-1"); ?>
            </div>
            <div class="top_rated quick_link_box alignleft">
				<?php dynamic_sidebar("home-sidebar-2"); ?>
            </div>
            <div class="social_media quick_link_box alignleft">
				<?php dynamic_sidebar("home-sidebar-3"); ?>
            </div>
            <div class="loyalty_pts_info quick_link_box alignleft">
				<?php dynamic_sidebar("home-sidebar-4"); ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="news_letter">
        	<a href="">newsletter</a>
        </div>
    </section>
</section>

<?php get_footer(); ?>