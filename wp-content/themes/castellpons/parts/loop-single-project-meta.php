<div class="content-row project-information">

	<h3 class="project-dates" data-aos="fade-up">
		<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_dates', true ); ?>
	</h3>

	<div class="project-meta">

		<ul>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_firm', true ) ) { ?>
				<li class="project-firm" data-aos="fade-up">
					<h4><?php _e('Architects', 'jointswp'); ?></h4>
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_firm', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_tech_architect', true ) ) { ?>
				<li class="project-tech-architect" data-aos="fade-up">
					<h4><?php _e('Technical architect', 'jointswp'); ?></h4>
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_tech_architect', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_engineer', true ) ) { ?>
				<li class="project-engineer" data-aos="fade-up">
					<h4><?php _e('Engineers', 'jointswp'); ?></h4>
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_engineer', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_codirector', true ) ) { ?>
				<li class="project-codirector" data-aos="fade-up">
					<h4><?php _e('Project codirector', 'jointswp'); ?></h4>
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_codirector', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_construction', true ) ) { ?>
				<li class="project-construction" data-aos="fade-up">
					<h4><?php _e('Construction firm', 'jointswp'); ?></h4>
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_construction', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_promoters', true ) ) { ?>
				<li class="project-promoters" data-aos="fade-up">
					<h4><?php _e('Promoters', 'jointswp'); ?></h4>
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_promoters', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_collaborators', true ) ) { ?>
				<li class="project-collaborators" data-aos="fade-up">
					<h4><?php _e('Collaborators', 'jointswp'); ?></h4>
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_collaborators', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_pem', true ) ) { ?>
				<li class="project-pem" data-aos="fade-up">
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

				echo '<div class="project-gallery-image" data-aos="fade-up">';
				echo $srcset;
				echo '</div>';
			}
			?>
		</div>

	<?php } ?>
</div>