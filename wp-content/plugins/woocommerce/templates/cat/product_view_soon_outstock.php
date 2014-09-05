
						<?php	
							$show_rating = false;
							$query_args = array(
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
										<header>
											<h3><?php echo $product->get_title(); ?></h3>
										</header>
										<div class="talked_about_item_img alignleft sq_184">
											<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
											
											<?php echo get_the_post_thumbnail( $product->id, array(300 . '&#37;', 300 . '&#37;') ); ?></a>
										</div>
										<div class="talked_about_item_links_price alignleft">
											<div class="talked_about_item_links">
												<ul>
													<li><a href=""><i class="fa fa-pinterest"></i></a></li>
													<li><a href=""><i class="fa fa-heart"></i></a></li>
												</ul>
												<a href="" class="share"><i class="fa fa-share"></i>Share</a>
											</div>
											<div class="talked_about_item_price">
												<p><?php echo $product->get_price_html(); ?></p>
											</div>
										</div>
										<div class="clear"></div>
									<?php
								}
								echo $after_widget;
							}
						?>
                            <div class="clear"></div>