<?php /* Wrapper Name: Header */ ?>

<article id="logo">
	<div class="span6" data-motopress-type="static" data-motopress-static-file="static/static-logo.php">
		<?php get_template_part("static/static-logo"); ?>
	</div>
</article>
<article class="user_info">
	<ul>
		<li><a href="<?php echo get_permalink(92); ?>"><span class="circle"><i class="fa fa-heart"></i></span>My saved items</a></li>
		<li><a href=""><span class="circle"><i class="fa fa-suitcase"></i></span>My shopping bag<i class="fa fa-caret-down"></i></a>
			<ul class="shopping_bag_dropdown">
				<div class="client_details">
					<?php dynamic_sidebar("top-sidebar-1"); ?>
					<div class="clear"></div>   
				</div>
				<div class="product_details">
					<div class="clear"></div>
				</div>
				<a href="<?php echo get_permalink(9); ?>">view all > </a>
			</ul>
		</li>
		<li>
				<?php
					$current_user = wp_get_current_user();
					/*
					echo 'User email: ' . $current_user->user_email . '<br />';
					echo 'User first name: ' . $current_user->user_firstname . '<br />';
					echo 'User last name: ' . $current_user->user_lastname . '<br />';
					echo 'User display name: ' . $current_user->display_name . '<br />';
					echo 'User ID: ' . $current_user->ID . '<br />';
					*/
				?>
			<a href="<?php echo wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>"><span class="circle"><i class="fa fa-user"></i></span><?php echo ($current_user->display_name? $current_user->display_name : 'Account'); ?></a></li>
	</ul>
</article>
<?php //get_template_part("static/static-nav"); ?>