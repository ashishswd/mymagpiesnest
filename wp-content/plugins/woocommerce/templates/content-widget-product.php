<?php global $product; ?>
<li style="padding-top:15px;">
	<div style="width:20%; float:left"><a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
		<?php echo $product->get_image(); ?>
	</a></div><div style="width:75%; float:right; text-align:left;">
		<span><?php echo $product->get_title(); ?></span><br/>
	<?php if ( ! empty( $show_rating ) ) echo $product->get_rating_html(); ?>
	<span><?php echo $product->get_price_html(); ?></span>
	</div>
	<div style="clear:both"></div>
</li>