<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

<?php do_action( 'woocommerce_before_cart_table' ); ?>
<section class="shopping_bag">         
        <div class="row">
            <div class="alignleft two_col bag_value">
            	<header>
                	<p class="alignleft">Shopping bag value</p>
                    <div class="t_amt alignright">
                    	<h1><?php wc_cart_totals_order_total_html(); ?></h1>
                    </div>
                    <div class="clear"></div>
                </header>
                <div class="shopping_bag_items">
					<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							?>
                    <div class="bag_item"> 
                        <div class="item_img alignleft">
							<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image('thumbnail'), $cart_item, $cart_item_key );
								if ( ! $_product->is_visible() )
									echo $thumbnail;
								else
									printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
							?>
                        </div>
                        <div class="item_desc alignleft">
                            <h4>
									<?php
										if ( ! $_product->is_visible() )
											echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
										else
											echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );

										// Meta data
										echo WC()->cart->get_item_data( $cart_item );

										// Backorder notification
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
											echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
									?>
							</h4>
                        </div>
                        <div class="item_price_quantity alignleft">
                            <h3>Price: 
									<?php
										echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
									?>
							</h3>
                            <p>Quantity : <?php echo $cart_item['quantity']; ?>
							</p>
                        </div>
                        <div class="gift_nxt_day">
                            <span>As a gift <img title="" alt="" src="images/xcross.jpg"></span>
                            <span>Next day delivery <img title="" alt="" src="images/xcross.jpg"></span>
                        </div>
                        <div class="clear"></div>
                    </div>
							<?php
						}
					}

					do_action( 'woocommerce_cart_contents' );
					?>
                </div>   
            </div>
            <div class="alignleft two_col loyalty_voucher">
            	<article class="loyalty_points">
                	<header>
                    	<h1>Your loyalty points:</h1>
                    </header>
                    <form class="loyalty" method="post" action="">
                    	<p><label>Enter amount of loyalty points you wish to use with this purchase </label> <input type="text" class="loyalty_input"></p>
                    </form>
                    <div class="available_pts"><i class="fa fa-caret-left"></i>1456</div>
            		<div class="clear"></div>        
                </article>
                <article class="discount_voucher">
                    	<fieldset class="voucher">
                        	<legend>Your vouchers</legend>
                            <input type="text" name="voucher">
                            <input type="text" name="voucher">
                        </fieldset>
                        <fieldset class="discount">

				<?php if ( WC()->cart->coupons_enabled() ) { ?>
					<div class="coupon">

						<input type="text" name="coupon_code" style="width:40%;" class="input-text" id="coupon_code" value="" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" />
						<input type="submit" class="button" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" style="width:20%;"/>

						<?php do_action('woocommerce_cart_coupon'); ?>

					</div>
				<?php } ?>
                        	<legend>Your discount code:</legend>
                            <input type="text" name="discount">
                        </fieldset>
                        <a class="check_out_btn" href="<?php echo get_permalink(10); ?>">Proceed to Checkout <i class="fa fa-chevron-right"></i></a>
                </article>
            </div>
            <div class="clear"></div>
        </div>
    </section>

<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>

<div class="cart-collaterals">

	<?php do_action( 'woocommerce_cart_collaterals' ); ?>

	<?php //woocommerce_cart_totals(); ?>

	<?php //woocommerce_shipping_calculator(); ?>

</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
