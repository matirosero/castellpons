<?php
/**
 * Template part for displaying page hero header in page.php
 */
?>

<?php
if ( has_post_thumbnail() ) { ?>

	<header class="page-header grid-y grid-padding-x">
		<div class="page-header-media">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>

		<div class="page-header-inner small-12 cell">
			<h1 class="page-title"><?php echo get_the_title($post->ID); ?></h1>
		</div>

	</header>

<?php } ?>
