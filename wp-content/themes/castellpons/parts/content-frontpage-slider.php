<?php

if ( get_post_meta( get_the_ID(), 'mro_cp_frontpage_images', true ) ) {

	$images = get_post_meta( get_the_ID(), 'mro_cp_frontpage_images', true );

	// if ( $count > 5 ) {
	// 	$count = 5;
	// }

	echo '<div class="slideshow-container">';

	foreach ($images as $id => $image) {

		$url = get_the_post_thumbnail_url( $id, 'full' );
		$srcset = wp_get_attachment_image_srcset( $id, 'full' );

		echo '<div class="slides fade vh-fix">
			<img src="'.$url.'" srcset="'.$srcset.'" alt="" />
			</div>';
	}

	echo '</div><!-- .slideshow-container -->';

	$count = count($images);



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

