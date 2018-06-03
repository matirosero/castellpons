<?php

echo 'hi';
if ( get_post_meta( get_the_ID(), 'mro_cp_frontpage_slider_projects', true ) ) {

	$attached = get_post_meta( get_the_ID(), 'mro_cp_frontpage_slider_projects', true );

	var_dump($attached);

	/*
	 * The WordPress Query class.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	 */
	$args = array(

		// Type & Status Parameters
		'post_type'   => 'cp-project',
		'post_status' => 'any',

		'post_status' => array(
			'publish',
		),

		'post__in'	=> $attached,

		// Order & Orderby Parameters
		'order'               => 'DESC',
		'orderby'             => 'date',

		// Pagination Parameters
		'posts_per_page'         => 3,

	);

	$query = new WP_Query( $args );

	if( $query->have_posts() ): ?>

		<div class="slideshow-container">

			<?php 

			$count = $query->post_count;

			while ( $query->have_posts() ) : $query->the_post(); ?>

				<div class="slides fade">

					<?php
					the_post_thumbnail('full', ['class' => 'orbit-image', 'title' => 'Feature project']);
					?>

				</div>

				<?php

				wp_reset_query();

			endwhile; ?>

		</div><!-- .slideshow-container -->

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

	<?php endif; 

} else {
	echo 'no';
}

