<?php
/**
 * My Orders
 *
 * Shows recent orders on the account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
	'numberposts' => $order_count,
	'meta_key'    => '_customer_user',
	'meta_value'  => get_current_user_id(),
	'post_type'   => 'shop_order',
	'post_status' => 'publish'
) ) );

if ( $customer_orders ) : ?>

	<h2><?php echo apply_filters( 'woocommerce_my_account_my_orders_title', __( 'Past orders', 'woocommerce' ) ); ?></h2>

	<table class="past_orders" width="100%">
		<tbody><?php
			foreach ( $customer_orders as $customer_order ) {
				$order = new WC_Order();

				$order->populate( $customer_order );

				$status     = get_term_by( 'slug', $order->status, 'shop_order_status' );
				$item_count = $order->get_item_count();

				?>	
				<tr>			
					<td class="tc_thirty" align="left">
						Order id: 
						<span class="semi_bold">
							<a href="<?php echo $order->get_view_order_url(); ?>">
								<?php echo $order->get_order_number(); ?>
							</a>
						</span>
					</td>
					<td class="tc_twenty" align="left">
							<?php
								$actions = array();

								if ( in_array( $order->status, apply_filters( 'woocommerce_valid_order_statuses_for_payment', array( 'pending', 'failed' ), $order ) ) ) {
									$actions['pay'] = array(
										'url'  => $order->get_checkout_payment_url(),
										'name' => __( 'Pay', 'woocommerce' )
									);
								}

								if ( in_array( $order->status, apply_filters( 'woocommerce_valid_order_statuses_for_cancel', array( 'pending', 'failed' ), $order ) ) ) {
									$actions['cancel'] = array(
										'url'  => $order->get_cancel_order_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ),
										'name' => __( 'Cancel', 'woocommerce' )
									);
								}

								$actions['view'] = array(
									'url'  => $order->get_view_order_url(),
									'name' => __( 'Expand', 'woocommerce' )
								);

								$actions = apply_filters( 'woocommerce_my_account_my_orders_actions', $actions, $order );

								if ($actions) {
									foreach ( $actions as $key => $action ) {
										echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
									}
								}
							?>
					</td>
					<td class="tc_fifty" align="right">
						Order cost: 
							<?php echo sprintf( _n( '%s for %s item', '%s for %s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ); ?>
					</td>
				</tr><?php
			}
		?></tbody>

	</table>

<?php endif; ?>
