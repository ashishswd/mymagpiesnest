<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<?php
	global $product;
?>
<section class="content_wrapper">
	<section class="product_wrapper">
        <div class="row">
        	<div class="prdct_img_loyalty">
                <div class="prdct_imgs">
                    <div class="prdct_img">
                        <div class="prdct_portrait"  itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php
								/**
								 * woocommerce_before_single_product_summary hook
								 *
								 * @hooked woocommerce_show_product_sale_flash - 10
								 * @hooked woocommerce_show_product_images - 20
								 */
								do_action( 'woocommerce_before_single_product_summary' );
							?>
                        </div>
                        <div class="clear"></div>    
                    </div>
                    <div class="prdct_misc">
						<?php if ( $product->is_in_stock() ){ ?>
                    	<div class="sq_105">
                        	<i class="fa fa-check-circle"></i>
                            <p>in stock</p>
                        </div>
						<?php }else{ ?>
                    	<div class="sq_105">
                        	<i class="fa fa-times-circle"></i>
                            <p>Out of stock</p>
                        </div>
						<?php } ?>
                        <div class="sq_105">
                        	<i class="fa fa-times-circle"></i>
                            <p>next day delivery</p>
                        </div>
                        <a href="#" class="btn_misc"><i class="fa fa-share"></i>Share</a>
                        <a href="#" class="btn_misc"><i class="fa fa-pinterest"></i>Pin it</a>
                    </div>
                    <div class="clear"></div>
                   
                </div>
                <div class="loyalty_pts">
                    <p>Loyaty points received on purchase:<span>100 pts.</span></p>
                </div>
                <p><a href="" class="learn_more">Learn more about loyalty points ></a></p>
            </div>  
            <div class="prdct_details">
            	<div class="details">
                	<div class="row">
                        <div class="desc">
                            <h1><?php the_title(); ?></h1>
                            <p><?php the_excerpt(); ?></p>
                             <div class="colors">
                                <p>Colors :</p>                    
                                <div class="sq_45 alignleft">
                                </div>
                                <div class="sq_45 alignleft">
                                </div>
                                <div class="sq_45 alignleft">
                                </div>
                                <div class="sq_45 alignleft">
                                </div>
                                <div class="clear"></div>
                            </div>
                    <div class="clear"></div>
                            
                        </div>
                        <div class="price">
                            <p><?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', sizeof( get_the_terms( $product->ID, 'product_cat' ) ), 'woocommerce' ) . ' ', '.</span>' ); ?></p>
                            <p>
							<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

								<span class="sku_wrapper"><?php _e( 'product code:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span>.</span>

							<?php endif; ?>
						
							</p>
                            <p class="amnt"><?php echo $product->get_price_html(); ?></p>
                            <p><a href="#" class="btn add_2_bag"><?php do_action( 'woocommerce_single_product_card_summary' ); ?><i class="fa fa-chevron-right"></i></a></p>
                            <div class="clear"></div>
                            <p><a hre="#" class="btn save">Save <i class="fa fa-heart"></i></a></p>
		<?php do_action( 'woocommerce_simple_add_to_cart' ); ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                   
                </div>
                <div class="prdct_links">
                    <a href="" class="alignleft">Browse similar products ></a>
                    <ul class="alignright">
                        <li><a href="">Print this page</a></li>
                        <li><a href="">Postage & Delivery</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="bundle_offer_reviews">
                	<div class="bundle_offer">
                    	<h3>Take advantage of this bundle offer:</h3>
                        <div class="row">
                            <div class="sq_111 alignleft">
                            </div>
                            <span class="plus alignleft">+</span>
                            <div class="sq_111 alignleft">
                            </div>
                            <span class="plus alignleft">+</span>
                            <div class="sq_111 alignleft">
                            </div>
                            <span class="plus alignleft">=</span>
                            <div class="bundle_price alignleft">
                                <h2>&pound; 14.89</h2>
                                <p>Save &pound;10</p>
                            </div>
                            <span class="separator alignleft">/</span>
                            <div class="bundle_price normal_price alignleft">
                                <h2>&pound; 24.89</h2>
                                <p>Normal Cost</p>
                            </div>
                            <div class="clear"></div>
                        </div>    
                    </div>
                	<div class="reviews">
                    	<p>Customer reviews :</p>
                	</div>
                </div>
            </div>
            <div class="similar_prdcts">
            	<h4>Customers also purchased</h4>
					<?php $custom_fields = get_post_custom_values( 'additional_product', $post->ID);
					$additional_product = unserialize($custom_fields[0]);
					foreach($additional_product as $value){ ?>
                <div class="similar_prdct">
                    <div class="similar_prdct_img">
							<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID)); ?>
								<img src='<?php echo $src[0]; ?>' width="135"/>
                    </div>
                    <div class="similar_prdct_links">
                    	<a href="<?php echo get_permalink($value) ?>" class="btn_similar">View <i class="fa fa-chevron-right"></i></a>
                    	<a href="" class="btn_similar">Save <i class="fa fa-heart"></i></a>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
					<?php } ?>

            </div>
            <div class="clear"></div>
        </div>
    </section>


	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		//do_action( 'woocommerce_before_single_product_summary' );
	?>


		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			//do_action( 'woocommerce_single_product_summary' );
		?>

	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		//do_action( 'woocommerce_after_single_product_summary' );
	?>

<!--	<meta itemprop="url" content="<?php the_permalink(); ?>" /> -->

<?php //do_action( 'woocommerce_after_single_product' ); ?>
