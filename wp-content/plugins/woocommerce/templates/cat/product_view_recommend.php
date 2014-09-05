
				<?php 
				global $wp_query;
				// get the query object
				$cat_obj = $wp_query->get_queried_object();
				if($cat_obj)    {
					
					$thumbnail_id = get_woocommerce_term_meta( $cat_obj->term_id, 'thumbnail_id', true );
					$image = wp_get_attachment_image( $thumbnail_id, array(300 . '&#37;', 300 . '&#37;'), true);
					$url = wp_get_attachment_url($thumbnail_id);
				}
				?>
                <div class="row">
						<?php	
							$show_rating = false;
							$query_args = array(
								'product_cat'		=> $cat_obj->slug,
								'posts_per_page' => 1,
								'post_status' 	 => 'publish',
								'post_type' 	 => 'product',
								'no_found_rows'  => 1,
								'order'          => $order == 'asc' ? 'asc' : 'desc'
							);

							$query_args['meta_query'] = array();
							$query_args['meta_query'][] = WC()->query->stock_status_meta_query();
							$query_args['meta_query']   = array_filter( $query_args['meta_query'] );
									$product_ids_on_sale = wc_get_product_ids_on_sale();
									$product_ids_on_sale[] = 0;
									$query_args['post__in'] = $product_ids_on_sale;
									$query_args['meta_key'] = 'total_sales';
									$query_args['orderby']  = 'meta_value_num';
									//$query_args['orderby']  = 'date';
							$r = new WP_Query( $query_args );
							if ( $r->have_posts() ) {
								echo $before_widget;
								if ( $title )
									echo $before_title . $title . $after_title;
								while ( $r->have_posts()) {
									$r->the_post();
									?>
									<?php global $product; ?>
									<div class="category_item_img alignleft">
										<?php echo get_the_post_thumbnail( $product->id, 'full' ); ?>
									</div>
									<div class="category_item_desc_price_review alignleft">
										<div class="category_item_desc">
											<h3></h3>
											<p><?php echo $product->post_content; ?></p>
										</div>
										<div class="category_price">
											<div class="cat_price_links alignleft">
												<ul>
													<li><a href=""><i class="fa fa-pinterest"></i></a></li>
													<li><a href=""><i class="fa fa-heart"></i></a></li>
													<li><a href="" class="no_border"><i class="fa fa-share"></i>Share</a></li>
												</ul>
											</div>
											<div class="cat_item_price alignleft">
												<p><?php echo $product->get_price_html(); ?></p>
											</div>
											<div class="clear"></div>
										</div>
										<div class="cat_item_review">
											<div class="review_img alignleft sq_124">
											</div>
											<div class="cat_review alignright">
												<img src="images/review_img.png" class="review-marker" alt="" title="" />
												<p>“ This is some dummy text that could be what an actual person thinks about his/her acquisition and would really love to share it with the world and recommend it.” </p>
											</div>
											<div class="clear"></div>
										</div>
									<?php
								}
								echo $after_widget;
							}
						?>
                        <div class="clear"></div>
                    </div>
                </div>
                 