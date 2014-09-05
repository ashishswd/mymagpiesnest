<?php
$args = array(
	'post_type' => 'product',
	'orderby' => $orderby,
);
$wp_query = new WP_Query($args);
$i=0;
?>
<div class="clear"></div>
<div class="row">
	<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
	global $product;
	?>
	<div class="sq_112 alignleft grid_view">
	<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>"><?php echo get_the_post_thumbnail( $product->id, 'thumbnail' ); ?></a>
	</div>
	<?php if($i==2){
		echo '<div class="clear"></div>';
		$i=0;
	}else
		$i=$i+1; ?>
	<?php endwhile; ?>
	<?php wp_reset_query();?>
</div>