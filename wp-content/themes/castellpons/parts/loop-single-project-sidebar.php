		<aside id="sidebar1" class="sidebar" role="complementary">
			<!-- small-12 medium-4 large-4 cell -->

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_location', true ) ) { ?>

				<div class="project-location">
					<?php
					if ( get_post_meta( get_the_ID(), 'mro_cp_project_location', true ) ) { ?>

						<h3 class="project-city"><?php echo get_post_meta( get_the_ID(), 'mro_cp_project_location', true ); ?></h3>
					<?php } ?>

					<?php
					if ( get_post_meta( get_the_ID(), 'mro_cp_project_address', true ) ) { ?>

						<p class="project-address"><?php echo get_post_meta( get_the_ID(), 'mro_cp_project_address', true ); ?></>
					<?php } ?>
				</div>

			<?php } ?>

		</aside>