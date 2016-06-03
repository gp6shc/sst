<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Spike
 */
get_header(); ?>
	<div class="page-hero">
		<h1>404</h1>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="constrain">
				
					<div class="entry-content center-text">
						<p>Woah, this page doesn't exist.</p>
						<a href="<?= home_url()?>" class="btn">Return Home</a>
					</div><!-- .entry-content -->
					
					<footer class="entry-footer">
						<?php edit_post_link( __( 'Edit', 'spike' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</div>
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>