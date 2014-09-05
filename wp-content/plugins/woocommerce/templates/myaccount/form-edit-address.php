<?php
/**
 * Edit address form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */
?><section class="content_wrapper">
	<section class="my_account_wrapper">
        <article class="user_details_orders">
        	<div class="user_details">
					<?php
					if ( ! defined( 'ABSPATH' ) ) {
						exit;
					}

					global $current_user;

					$page_title = ( $load_address === 'billing' ) ? __( 'Billing Address', 'woocommerce' ) : __( 'Shipping Address', 'woocommerce' );

					get_currentuserinfo();
					?>

					<?php wc_print_notices(); ?>

					<?php if ( ! $load_address ) : ?>

						<?php wc_get_template( 'myaccount/my-address.php' ); ?>

					<?php else : ?>

						<form method="post">
							<header>
								<h1><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title ); ?></h1>
							</header>
							<div class="user_links">
								<?php foreach ( $address as $key => $field ) : ?>

									<?php woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] ); ?>

								<?php endforeach; ?>

								<p>
									<input type="submit" class="button" name="save_address" value="<?php _e( 'Save Address', 'woocommerce' ); ?>" />
									<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
									<input type="hidden" name="action" value="edit_address" />
								</p>
							</div>

						</form>

					<?php endif; ?>
                </div>
            </div>
        </article>
        <div class="clear"></div>
    </section>
</section>