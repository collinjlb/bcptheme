			<footer class="site-footer">
				<div class="footer-top">
					<div class="footer-logo" style="background-image: url('<?php the_field('footer_logo','option'); ?>');"></div>
					<div class="contact">
						<div class="left-col">
							<div class="hours">
								<h6>Hours</h6>
								<?php the_field('hours', 'option'); ?>
							</div>
							<div class="social">
								<a href="<?php the_field('linkedin','option'); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
								<a href="<?php the_field('google_plus','option'); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
							</div>
						</div>
						<div class="right-col">
							<div class="address">
								<h6>Contact Us</h6>
							  <a href="<?php the_field('address_link','option'); ?>"><?php the_field('address','option'); ?></a>
							</div>
							<div class="phone">
								<a href="tel:<?php the_field('phone','option'); ?>"><?php the_field('phone','option'); ?></a>
							</div>
						</div>
					</div>
					<div class="form">
						<?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=true tabindex=49]'); ?>
					</div>
				</div>
				<div class="footer-bottom">
					<p><a href="http://www.jlbworks.com/#latest-work">Web Design</a>, <a href="http://www.jlbworks.com/#services">Marketing</a> & <a href="http://www.jlbworks.com/#contact">Support</a> by <a href="http://www.jlbworks.com/#latest-work">JLB</a></p>
				</div>
				<?php wp_footer(); ?>
			</footer>
		</div><!-- Container -->
	</body>
	</html>
