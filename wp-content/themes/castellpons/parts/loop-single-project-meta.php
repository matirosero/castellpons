<div class="content-row project-information">

	<h3 class="project-dates">
		<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_dates', true ); ?>
	</h3>

	<div class="project-meta">

		<ul>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_firm', true ) ) { ?>
				<li class="project-firm">
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_firm', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_tech_architect', true ) ) { ?>
				<li class="project-tech-architect">
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_tech_architect', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_engineer', true ) ) { ?>
				<li class="project-engineer">
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_engineer', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_codirector', true ) ) { ?>
				<li class="project-codirector">
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_codirector', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_construction', true ) ) { ?>
				<li class="project-construction">
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_construction', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_promoters', true ) ) { ?>
				<li class="project-promoters">
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_promoters', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_collaborators', true ) ) { ?>
				<li class="project-collaborators">
					<?php echo get_post_meta( get_the_ID(), 'mro_cp_project_collaborators', true ); ?>
				</li>
			<?php } ?>

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_project_pem', true ) ) { ?>
				<li class="project-pem">
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
			$img_size = 'full';
			foreach ($images as $attachment_id => $image) {
				echo '<div class="project-gallery-image">';
				echo wp_get_attachment_image( $attachment_id, $img_size );
				echo '</div>';
			}
			?>
		</div>

	<?php } ?>
</div>