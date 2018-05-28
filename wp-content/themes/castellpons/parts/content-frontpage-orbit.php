<?php
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

	// Order & Orderby Parameters
	'order'               => 'DESC',
	'orderby'             => 'date',

	// Pagination Parameters
	'posts_per_page'         => 3,

);

$query = new WP_Query( $args );

if( $query->have_posts() ): ?>

	<div class="orbit" role="region" aria-label="Project Showcase" data-orbit>

		<ul class="orbit-container">

			<?php while ( $query->have_posts() ) : $query->the_post(); ?>

				<li class="orbit-slide is-active">
				    <figure class="orbit-figure">

				    	<?php
				    	the_post_thumbnail('full', ['class' => 'orbit-image', 'title' => 'Feature project']);
				    	?>

						<figcaption class="orbit-caption"><?php the_title(); ?></figcaption>
						
				    </figure>
				</li>

				<?php

				wp_reset_query();

			endwhile; ?>

		</ul><!-- .orbit-container -->

		<nav class="orbit-bullets">
			<button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
			<button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
			<button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
			<button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
		</nav>

	</div><!-- .orbit -->

<?php endif; ?>