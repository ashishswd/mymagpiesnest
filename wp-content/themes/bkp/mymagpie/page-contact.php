<?php
/**
* Template Name: Contact Page
*/

get_header(); ?>

<?php get_template_part("static/static-title"); ?>

<section class="content_wrapper">
	<section class="contact_wrapper">
        <div class="row">
            <article class="two_col contact_address">
                <article class="two_col cntct_details">
                    <p><i class="fa fa-phone"></i> <span class="two5">(0161)-000 000 000</span></p>
                    <p><i class="fa fa-envelope"></i><span class="two5">contact@mymagpiesnest.com</p>
                </article>
                <article class="two_col cntct_address">
                	<div class="loc_marker">
                    	<i class="fa fa-map-marker"></i>
                    </div>
                    <div class="street_address">
                    	<ul>
                        	<li>First line, number</li>
                        	<li>Second line, number</li>
                        	<li>Third line, number</li>
                        	<li>Manchester, Post code</li>
                       </ul>     
                    </div>
                </article>
                <div class="clear"></div>
                <div class="map"><iframe
  width="600"
  height="450"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD611i8oYYFehKGPf3MylucvV8cYGrmZoM&q=Space+Needle,Seattle+WA">
</iframe>
                	<img src="images/map.jpg" alt="Google Map" title="Google Map" /> 
                </div>
            </article>
            <article class="two_col contact_form">
            		<h2><i class="fa fa-comments"></i>Contact form</h2>
                <div class="form_header">    
                	<p>We value our customer’s feedback and we are always open to new ideas.</p>
					<p>Wherever it’s a product related question, postage & delivery enquiry or you simply just want to say hello, we would like to hear from you.</p>
                </div> 
				 <?php echo do_shortcode('[contact-form-7 id="112" title="Contact Us"]') ?> 
            </article>
            <div class="clear"></div>
        </div>
    </section>
</section>

<?php get_footer(); ?>