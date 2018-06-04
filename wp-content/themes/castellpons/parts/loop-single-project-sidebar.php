		<aside id="sidebar1" class="sidebar medium-order-2" role="complementary" data-aos="fade-up" data-aos-offset="-200">
			<!-- small-12 medium-4 large-4 cell -->

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_location', true ) ) { ?>

				<div class="location project-location">
					<?php
					if ( get_post_meta( get_the_ID(), 'mro_cp_project_location', true ) ) { ?>

						<h3 class="location-city"><?php echo get_post_meta( get_the_ID(), 'mro_cp_project_location', true ); ?></h3>
					<?php } ?>

					<?php
					if ( get_post_meta( get_the_ID(), 'mro_cp_project_address', true ) ) { ?>

						<p class="location-address"><?php echo get_post_meta( get_the_ID(), 'mro_cp_project_address', true ); ?></>
					<?php } ?>
				</div>

			<?php } ?>

		</aside>