<?php
/**
 * Template part for displaying posts
 *
 * Used for single, index, archive, search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('news-article small-margin-collapse small-padding-collapse'); ?> role="article" data-aos="fade-up" data-aos-offset="150">

	<div class="news-article-image">
		<?php
		// the_post_thumbnail('news-list-image-full');
		$sizes = cp_build_srcset_sizes('100vw','42vw','33vw');
		$srcset = cp_srcset( get_post_thumbnail_id( get_the_ID() ), 'news-list-image-full', $sizes );
		echo $srcset;
		// var_dump($srcset);
		?>
	</div>

	<div class="news-article-inner">
		<div class="news-article-content">
			<header class="article-header">
				<h2 class="article-title"><?php the_title(); ?></h2>
				<?php //get_template_part( 'parts/content', 'byline' ); ?>
			</header> <!-- end article header -->

			<section class="entry-content" itemprop="articleBody">

				<?php the_content('<button class="tiny">' . __( 'Read more...', 'jointswp' ) . '</button>'); ?>

			</section> <!-- end article section -->
		</div>

		<footer class="article-footer">

			<?php
			if ( get_post_meta( get_the_ID(), 'mro_cp_post_urls', true ) ) {

				$links = get_post_meta( get_the_ID(), 'mro_cp_post_urls', true );
				?>

				<ul class="news-links">
					<?php
					foreach ($links as $link) {
						echo '<li><a href="'.$link['url'].'" target="_blank">'.$link['title'].'</a></li>';
					} ?>
				</ul>

			<?php }

			if ( get_post_meta( get_the_ID(), 'mro_cp_post_attached_project', true ) ) {

				$attached = get_post_meta( get_the_ID(), 'mro_cp_post_attached_project', true );

				echo '<a href="' . get_post_permalink($attached[0]) . '" class="button news-article-project-btn">' . __( 'See project', 'jointswp' ) . '</a>';

			} ?>

		</footer> <!-- end article footer -->

	</div>



</article> <!-- end article -->