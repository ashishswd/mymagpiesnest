<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
?>
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<p class="price"><?php echo $product->get_price_html(); ?></p>

	<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

</div>
<div class="price">
<p>Category : scarves</p>
<p>product code : #12341231</p>
<p class="amnt">£ 9.89 </p>
<p><a class="btn add_2_bag" href="#">Add to my bag <i class="fa fa-chevron-right"></i></a></p>
<div class="clear"></div>
<p><a class="btn save" hre="#">Save <i class="fa fa-heart"></i></a></p>
</div>