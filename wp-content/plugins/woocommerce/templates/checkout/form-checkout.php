<script>
$(function() {
	$( "#tabs" ).tabs();
});
</script>
<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>

<form name="checkout" method="post" class="checkout" action="<?php echo esc_url( $get_checkout_url ); ?>">

<section class="content_wrapper">
	<section class="checkout_wrapper">
        <section class="row">
        	<article class="two_col alignleft checkout_details">
				<div id="tabs">
					<ul>
						<li><a href="#tabs-1"><span class="sq_35">1</span> Billing</a></li>
						<li><a href="#tabs-2"><span class="sq_35">2</span> Delivery</a></li>
						<li><a href="#tabs-3"><span class="sq_35">3</span> Payment Method</a></li>
					</ul>
					<div id="tabs-1" class="checkout_form">
						<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>
							<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
							<div class="col2-set" id="customer_details">
									<?php do_action( 'woocommerce_checkout_billing' ); ?>
							</div>
							<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
						<?php endif; ?>
					</div>
					<div id="tabs-2" class="checkout_form">
						<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>
							<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
							<div class="col2-set" id="customer_details">
									<?php do_action( 'woocommerce_checkout_shipping' ); ?>
							</div>
							<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
						<?php endif; ?>
					</div>
					<div id="tabs-3">
						<?php do_action( 'woocommerce_review_order_before_payment' ); ?>

						<div id="payment">
							<?php if ( WC()->cart->needs_payment() ) : ?>
							<ul class="payment_methods methods">
								<?php
									$available_gateways = WC()->payment_gateways->get_available_payment_gateways();
									if ( ! empty( $available_gateways ) ) {

										// Chosen Method
										if ( isset( WC()->session->chosen_payment_method ) && isset( $available_gateways[ WC()->session->chosen_payment_method ] ) ) {
											$available_gateways[ WC()->session->chosen_payment_method ]->set_current();
										} elseif ( isset( $available_gateways[ get_option( 'woocommerce_default_gateway' ) ] ) ) {
											$available_gateways[ get_option( 'woocommerce_default_gateway' ) ]->set_current();
										} else {
											current( $available_gateways )->set_current();
										}

										foreach ( $available_gateways as $gateway ) {
											?>
											<li class="payment_method_<?php echo $gateway->id; ?>">
												<input id="payment_method_<?php echo $gateway->id; ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />
												<label for="payment_method_<?php echo $gateway->id; ?>"><?php echo $gateway->get_title(); ?> <?php echo $gateway->get_icon(); ?></label>
												<?php
													if ( $gateway->has_fields() || $gateway->get_description() ) :
														echo '<div class="payment_box payment_method_' . $gateway->id . '" ' . ( $gateway->chosen ? '' : 'style="display:none;"' ) . '>';
														$gateway->payment_fields();
														echo '</div>';
													endif;
												?>
											</li>
											<?php
										}
									} else {

										if ( ! WC()->customer->get_country() )
											$no_gateways_message = __( 'Please fill in your details above to see available payment methods.', 'woocommerce' );
										else
											$no_gateways_message = __( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' );

										echo '<p>' . apply_filters( 'woocommerce_no_available_payment_methods_message', $no_gateways_message ) . '</p>';

									}
								?>
							</ul>
							<?php endif; ?>

							<div class="form-row place-order">

								<noscript><?php _e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ); ?><br/><input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php _e( 'Update totals', 'woocommerce' ); ?>" /></noscript>

								<?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>

								<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

								<?php
								$order_button_text = apply_filters( 'woocommerce_order_button_text', __( 'Place order', 'woocommerce' ) );

								echo apply_filters( 'woocommerce_order_button_html', '<input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '" />' );
								?>

								<?php if ( wc_get_page_id( 'terms' ) > 0 && apply_filters( 'woocommerce_checkout_show_terms', true ) ) { 
									$terms_is_checked = apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) );
									?>
									<p class="form-row terms">
										<label for="terms" class="checkbox"><?php printf( __( 'I&rsquo;ve read and accept the <a href="%s" target="_blank">terms &amp; conditions</a>', 'woocommerce' ), esc_url( get_permalink( wc_get_page_id( 'terms' ) ) ) ); ?></label>
										<input type="checkbox" class="input-checkbox" name="terms" <?php checked( $terms_is_checked, true ); ?> id="terms" />
									</p>
								<?php } ?>

								<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

							</div>

							<div class="clear"></div>

						</div>

						<?php do_action( 'woocommerce_review_order_after_payment' ); ?>
					</div>
				</div>
            </article>
            <article class="two_col alignright order_details">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
            </article>
            <div class="clear"></div>
        </section>
    </section>  
</section>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>