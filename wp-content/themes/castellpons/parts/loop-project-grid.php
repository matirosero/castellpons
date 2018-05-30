<?php
/**
 * The template part for displaying a grid of posts
 *
 * For more info: http://jointswp.com/docs/grid-archive/
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('project'); ?> role="article">

	<div class="featured-image" itemprop="articleBody">
		<?php the_post_thumbnail('project-grid-image-full'); ?>
	</div> <!-- end article section -->

	<a class="project-information-overlay" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		<h3 class="title"><?php the_title(); ?></h3>
		<p><?php the_excerpt(); ?></p>
	</a> <!-- end article header -->

</article>




