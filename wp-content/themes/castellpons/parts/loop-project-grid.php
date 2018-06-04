<?php
/**
 * The template part for displaying a grid of posts
 *
 * For more info: http://jointswp.com/docs/grid-archive/
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('project'); ?> role="article" data-aos="fade-up" data-aos-offset="200">

	<div class="featured-image" itemprop="articleBody">
		<?php 
		// the_post_thumbnail('project-grid-image-full'); 
		$sizes = cp_build_srcset_sizes('100vw','50vw','33vw');
		$srcset = cp_srcset( get_post_thumbnail_id( get_the_ID() ), 'project-grid-image-full', $sizes );
		echo $srcset;
		?>
	</div> <!-- end article section -->

	<a class="project-information-overlay" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		<h3 class="title"><?php the_title(); ?></h3>
		<p><?php the_excerpt(); ?></p>
	</a> <!-- end article header -->

</article>




