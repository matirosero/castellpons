<?php



if ( get_post_meta( get_the_ID(), 'mro_cp_frontpage_slider_projects', true ) ) {

	$attached = get_post_meta( get_the_ID(), 'mro_cp_frontpage_slider_projects', true );

	// var_dump($attached);

	echo '<div class="slideshow-container">';

	foreach ($attached as $project_id) {
		// var_dump($project_id);
		$attachment_id = get_post_thumbnail_id( $project_id );
		// var_dump($attachment_id);
		$url = get_the_post_thumbnail_url( $project_id, 'full' );
		// var_dump($url);
		$srcset = wp_get_attachment_image_srcset( $attachment_id, 'full' );
		// var_dump($srcset);

		echo '<div class="slides fade">
			<img src="'.$url.'" srcset="'.$srcset.'" alt="" />
			</div>';
	}

	echo '</div><!-- .slideshow-container -->';

	$count = count($attached);

	?>

	<div class="slider-progress" style="text-align:center">

		<?php

		$i = 0;

		while ( $i < $count ) { ?>

			<div class="progress-indicator" >
				<div class="numbertext"><?php echo str_pad($i+1, 2, '0', STR_PAD_LEFT); ?></div>
				<div class="bar" id="bar-<?php echo $i; ?>">
					<div class="bar-progress"></div>
				</div>
			</div>

			<?php $i++; ?>

		<?php } ?>

	</div>

	<?php

}

