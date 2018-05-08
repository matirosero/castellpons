<?php
/**
 * The template part for displaying a grid of posts
 *
 * For more info: http://jointswp.com/docs/grid-archive/
 */
?>


<div id="post-<?php the_ID(); ?>" <?php post_class('project'); ?> role="article">

	<section class="featured-image" itemprop="articleBody">
		<?php the_post_thumbnail('full'); ?>
	</section> <!-- end article section -->

	<header class="article-header">
		<h3 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
	</header> <!-- end article header -->
	
</div>




