<?php
/**
 * The template for displaying the footer.
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
 ?>

 		<?php
 		if ( is_front_page() ) { ?>
 			<footer id="site-footer" class="footer" role="contentinfo">
 		<?php } else { ?>
 			<footer id="site-footer" class="footer" role="contentinfo">
		<?php } ?>

			<div class="inner-footer">
			<!-- <div class="inner-footer grid-x grid-padding-x"> -->

				<div id="footer-social-menu" class="">
				<!-- <div id="footer-social-menu" class="small-12 medium-4 large-4 cell"> -->
					<nav role="navigation">
						<?php cp_social_media_icons(); ?>
					</nav>
				</div>

				<div id="footer-credits" class="" >
				<!-- <div id="footer-credits" class="small-12 medium-4 large-4 cell"> -->
					<p class="site-name"><strong>Castell + Pons</strong> <?php _e('Architects', 'jointswp'); ?></p>

				</div>

				<?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
					<div id="footer-language-menu" class="widget-area" role="complementary" >
					<!-- <div id="footer-language-menu" class="widget-area small-12 medium-4 large-4 cell" role="complementary"> -->
						<?php dynamic_sidebar( 'footer-right' ); ?>
<!-- 						<div class="dropup">
  <button class="dropbtn">Dropup</button>
  <div class="dropup-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div> -->
					</div><!-- #primary-sidebar -->
				<?php endif; ?>

			</div> <!-- end #inner-footer -->

		</footer> <!-- end .footer -->
</div>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end page -->