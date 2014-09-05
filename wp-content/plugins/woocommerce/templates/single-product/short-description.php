<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

if ( ! $post->post_excerpt ) return;
?>
<h1><?php the_title(); ?></h1>
<div class="desc">
	<p><div itemprop="description"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?></div></p>
	<div class="colors">
		<p>Colors :</p>                    
		<div class="sq_45 alignleft">
		</div>
		<div class="sq_45 alignleft">
		</div>
		<div class="sq_45 alignleft">
		</div>
		<div class="sq_45 alignleft">
		</div>
		<div class="clear"></div>
		</div>
	<div class="clear"></div>

</div>