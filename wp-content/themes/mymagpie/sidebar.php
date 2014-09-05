<?php
/**
* Sidebar Name: Static Sidebar
*/
?>

<?php
	$current_user = wp_get_current_user();
?>
<div class="usr_info">
	<div class="avatar">
		<?php echo get_avatar( $current_user->ID, 120 ); ?>
	</div>
	<div>
		<div class="usr_name">
			<p><?php echo $current_user->display_name; ?></p>
		</div>
		<div class="usr_account">
			<p><a href="<?php echo get_permalink(11); ?>">My account</a></p>
			<p><a href="<?php echo wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>">Log out</a></p>
		</div>
	</div>  
	 <div class="clear"></div> 
</div>
<br/>
<?php
	/*
	echo 'User email: ' . $current_user->user_email . '<br />';
	echo 'User first name: ' . $current_user->user_firstname . '<br />';
	echo 'User last name: ' . $current_user->user_lastname . '<br />';
	echo 'User display name: ' . $current_user->display_name . '<br />';
	echo 'User ID: ' . $current_user->ID . '<br />';
	*/
?>
<?php if ( ! dynamic_sidebar( theme_locals("sidebar") )) : ?>
<?php endif; ?>