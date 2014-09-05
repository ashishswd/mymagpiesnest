<?php
/**
 * Login Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>
<section class="content_wrapper">
	<section class="log_in_wrapper">
    	<article class="sign_up">
            <header>
            	<h1>Sign up</h1>
            </header>
            <div class="login_bg">
				<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
                <div class="signup_content">
                    <p>Be part of our online community. Signing up is free, quick and easy to do. Simply enter your email address below. </p>
                    <ul>
                        <li><i class="fa fa-check"></i>Keep track of your orders</li>
                        <li><i class="fa fa-check"></i>Receive weekly offers</li>
                        <li><i class="fa fa-check"></i>Quick check-out everytime</li>
                    </ul>
                </div>
                <div class="signup_form">
						<div class="col-2">
							<form method="post" class="">
								<?php do_action( 'woocommerce_register_form_start' ); ?>
								<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
									<p class="form-row form-row-wide">
										<label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
										<input type="text" class="input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
									</p>
								<?php endif; ?>
								<p class="form-row form-row-wide">
									<label for="reg_email"><?php _e( 'Email', 'woocommerce' ); ?> <span class="required">*</span></label>
									<input type="email" class="input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
								</p>
								<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
						
									<p class="form-row form-row-wide">
										<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
										<input type="password" class="input-text" name="password" id="reg_password" />
									</p>

								<?php endif; ?>
								<!-- Spam Trap -->
								<div style="left:-999em; position:absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>
								<?php do_action( 'woocommerce_register_form' ); ?>
								<?php //do_action( 'register_form' ); ?>
								<p class="form-row">
									<?php wp_nonce_field( 'woocommerce-register', 'register' ); ?>
									<input type="submit" class="btn" name="register" value="<?php _e( 'Register', 'woocommerce' ); ?>" />
								</p>
								<?php do_action( 'woocommerce_register_form_end' ); ?>
							</form>
						</div>
					</div>
					<?php endif; ?>
            </div>    
        </article>
        <article class="log_in">
        	<header>
            	<h1>Log in</h1>
            </header>
            <div class="login_bg">
                <div class="login_content">
                    <div class="user_img_container">
                        <img title="" alt="" src="images/user_icon.png">
                    </div>
                </div>
                <div class="login_form">
					<form method="post" class="">

						<?php do_action( 'woocommerce_login_form_start' ); ?>

						<p class="form-row form-row-wide">
							<label for="username"><?php _e( 'Email', 'woocommerce' ); ?> <span class="required">*</span></label>
							<input type="text" class="input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
						</p>
						<p class="form-row form-row-wide">
							<label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
							<input class="input-text" type="password" name="password" id="password" />
						</p>

						<?php do_action( 'woocommerce_login_form' ); ?>

						<p class="form-row">
							<?php wp_nonce_field( 'woocommerce-login' ); ?>
							<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'I forgot my password', 'woocommerce' ); ?></a>
							<input type="submit" class="btn" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" /> 
						<!--	<label for="rememberme" class="inline">
								<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
							</label>
						-->

						<?php do_action( 'woocommerce_login_form_end' ); ?>

					</form>
                </div>
            </div>    
        </article>
        <div class="clear"></div>
    </section>
</section>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
