
<section class="content_wrapper">
	<section class="category_wrapper">
    	<article class="row" style="width:98%; margin:auto">
        	<div class="two_col alignleft recomended">
            	<header>
                	<h2>Our customers recommend</h2>
                </header>
				<?php wc_get_template( 'cat/product_view_recommend.php' ); ?>
            </div>
            <div class="two_col alignleft talked_about_stock">
            	<div class="row">
                	<div class="two_col alignleft talked_about">
                    	<header>
                        	<h2>Most talked about</h2>
                        </header>
                        <div class="item_container">
							<?php wc_get_template( 'cat/product_view_talk_about.php' ); ?>
                        </div>
                    </div>
                    <div class="two_col alignleft out_of_stock">
                    	<header>
                        	<h2>Soon out of stock</h2>
                        </header>
                        <div class="item_container">
							<?php wc_get_template( 'cat/product_view_soon_outstock.php' ); ?>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="cat_banner">
                    	
                </div>
            </div>
            <div class="clear"></div>
        </article>
        <article class="row" style="width:98%; margin:auto">
        	<div class="filter_prdcts alignleft">
            	<header>
                	<h2>Filter products</h2>
                </header>
                <hr />
                <hr />
                <div id="Accordion1" class="Accordion" tabindex="0">
                    <div class="AccordionPanel">
						<div class="AccordionPanelTab">
							By Category <p><i class="fa fa-plus"></i></p>
						</div>
						<div class="AccordionPanelContent">
								<?php wc_get_template( 'cat/product_cat_filter.php' ); ?>
						</div>
                	</div>
                    <div class="AccordionPanel">
                        <div class="AccordionPanelTab">
                        	By Price <p><i class="fa fa-plus"></i></p>
                        </div>
                        <div class="AccordionPanelContent">
							<?php wc_get_template( 'cat/product_price_filter.php' ); ?>
                        </div>
                    </div>
                    <div class="AccordionPanel">
                        <div class="AccordionPanelTab">
                        	By Name <p><i class="fa fa-plus"></i></p>
                        </div>
                        <div class="AccordionPanelContent">
							<?php wc_get_template( 'cat/product_color_filter.php' ); ?>
                        </div>
                	</div>
          	  </div>
        	</div>
			<script>
				$(function() {
					$( "#tabs" ).tabs();
				});
			</script>

            <div class="customized_view alignleft">
				<div id="tabs">
					<header>
						<h2>Customize view</h2>
						<ul>
							<li><a href="#tabs-1"><i class="fa fa-th"></i>View as grid</a></li>
							<li><a href="#tabs-2"><i class="fa fa-th-large"></i>View as blocks</a></li>
							<li><a href="#tabs-3"><i class="fa fa-th-list"></i>View as list</a></li>
						</ul>
						<?php do_action( 'woocommerce_before_shop_loop' ); ?>
					</header>
					<div id="tabs-1">
						<?php wc_get_template( 'cat/product_grid_view.php' ); ?>
					</div>
					<div id="tabs-2">
						rrrrrrrrr
					</div>
					<div id="tabs-3">
						yyyyyyyyyy
					</div>
				</div>                
            </div>
            <div class="clear"></div>
        </article>
    </section>
</section>
<script type="text/javascript">
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
</script>