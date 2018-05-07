<?php
/**
 * Template part for displaying page content in page.php
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

<div class="inner-content">

	<article id="post-<?php the_ID(); ?>" <?php post_class(' grid-x grid-margin-x'); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

		<main class="main small-12 large-8 medium-8 cell" role="main">

			<?php
			if ( !has_post_thumbnail() ) { ?>
				<header class="article-header">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header> <!-- end article header -->
			<?php } ?>

		    <section class="entry-content" itemprop="articleBody">
			    <?php the_content(); ?>
			</section> <!-- end article section -->

			<footer class="article-footer">
				 <?php wp_link_pages(); ?>
			</footer> <!-- end article footer -->

			<?php comments_template(); ?>

		</main> <!-- end #main -->

		<div id="sidebar1" class="sidebar small-12 medium-4 large-4 cell" role="complementary">

			<?php
		    $content = get_post_meta( get_the_ID(), 'mro_cp_page_sidebar', true );
		    // var_dump($content);
		    cp_content_filter( $content );
		    ?>

		</div>

	</article> <!-- end article -->

</div> <!-- end #inner-content -->

