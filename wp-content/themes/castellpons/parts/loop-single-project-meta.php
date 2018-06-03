<div class="content-row project-information">

	<h3 class="project-dates">
		<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_dates', true ); ?>
	</h3>

	<div class="project-meta">

		<ul>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_firm', true ) ) { ?>
				<li class="project-firm">
					<h4><?php _e('Architects', 'jointswp'); ?></h4>
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_firm', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_tech_architect', true ) ) { ?>
				<li class="project-tech-architect">
					<h4><?php _e('Technical architect', 'jointswp'); ?></h4>
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_tech_architect', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_engineer', true ) ) { ?>
				<li class="project-engineer">
					<h4><?php _e('Engineers', 'jointswp'); ?></h4>
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_engineer', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_codirector', true ) ) { ?>
				<li class="project-codirector">
					<h4><?php _e('Project codirector', 'jointswp'); ?></h4>
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_codirector', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_construction', true ) ) { ?>
				<li class="project-construction">
					<h4><?php _e('Construction firm', 'jointswp'); ?></h4>
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_construction', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_promoters', true ) ) { ?>
				<li class="project-promoters">
					<h4><?php _e('Promoters', 'jointswp'); ?></h4>
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_promoters', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_collaborators', true ) ) { ?>
				<li class="project-collaborators">
					<h4><?php _e('Collaborators', 'jointswp'); ?></h4>
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_collaborators', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_pem', true ) ) { ?>
				<li class="project-pem">
					<h4><?php _e('MEB', 'jointswp'); ?></h4>
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_pem', true ); ?>
				</li>
			<?php } ?>
		</ul>
	</div>

	<?php 
	if ( get_post_meta( get_the_ID(), 'mro_cp_project_gallery', true ) ) { ?>

		<div class="project-gallery">
			<?php
			$images = get_post_meta( get_the_ID(), 'mro_cp_project_gallery', true );
			$img_size = 'large';
			foreach ($images as $attachment_id => $image) {
				$srcset = cp_srcset($attachment_id,'large','1024px');

				echo '<div class="project-gallery-image">';
				echo '<img class="my_class" ' . $srcset . ' alt="text" />';
				echo '</div>';
			}
			?>
		</div>

	<?php } ?>
</div>