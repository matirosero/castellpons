<?php
/**
 * Template part for displaying page hero header in page.php
 */
?>

<?php
if ( has_post_thumbnail() ) { ?>

	<header class="page-header grid-y grid-padding-x" data-aos="fade" data-aos-duration="1200">
		<div class="page-header-media" data-aos="fade" data-aos-delay="300">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>

		<div class="page-header-inner small-12 cell" data-aos="fade" data-aos-duration="2000">
			<h1 class="page-title"><?php echo get_the_title($post->ID); ?></h1>
			<?php
			if ( is_singular( 'cp-project' ) ) { ?>
				<p><?php the_excerpt(); ?></p>
			<?php } ?>
		</div>

	</header>

<?php } ?>
