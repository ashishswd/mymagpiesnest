<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

wc_print_notices(); ?>
<!--
<p class="myaccount_user">
	<?php
	printf(
		__( 'Hello <strong>%1$s</strong> (not %1$s? <a href="%2$s">Sign out</a>).', 'woocommerce' ) . ' ',
		$current_user->display_name,
		wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) )
	);

	printf( __( 'From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="%s">edit your password and account details</a>.', 'woocommerce' ),
		wc_customer_edit_account_url()
	);
	?>
</p>
-->

<?php do_action( 'woocommerce_before_my_account' ); ?>

<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>
<section class="content_wrapper">
	<section class="my_account_wrapper">
    	<article class="user_account">
        	<div class="user_name_img">
            	<div class="user_img_container">
                	<img src="images/user_icon.png" alt="" title="" />
                </div>
                <h2><?php echo $current_user->display_name; ?></h2>
            </div>
            <a href="" class="black">Start browsing</a>
	<?php
	printf(
		__( '<a class="white" href="%2$s">Log out</a>.', 'woocommerce' ) . ' ', $current_user->display_name, wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ));
	?>
        </article>
        <article class="user_details_orders">
        	<div class="user_details">
            	<header>
            		<h1>My details</h1>
                </header>
                <div class="user_links">
                	<ul>
                    	<li><a href="<?php echo wc_get_endpoint_url( 'edit-address', 'billing' ); ?>"><i class="fa fa-caret-right"></i>Add/Edit contact details</a></li>
                        <li><a href="<?php echo wc_get_endpoint_url( 'edit-address', 'shipping' ); ?>"><i class="fa fa-caret-right"></i>Add/Edit delivery details</a></li>
                        <li><a href=""><i class="fa fa-caret-right"></i>Add/Edit payment details</a></li>
                    </ul>
                    <ul>
                    	<li><a href="<?php echo wc_get_endpoint_url( 'edit-account', 'profile' ); ?>"><i class="fa fa-caret-right"></i>Change password</a></li>
                        <li><a href=""><i class="fa fa-caret-right"></i>Postage & Delivery information</a></li>
                        <li><a href=""><i class="fa fa-caret-right"></i>Newsletter set-up</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="user_order">
            	<header>
                	<h1>My order(s)</h1>
                </header>
                <div class="user_order_details">
						<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>
                    </table>
                </div>
            </div>
        </article>
        <div class="clear"></div>
    </section>
</section>

<?php do_action( 'woocommerce_after_my_account' ); ?>
