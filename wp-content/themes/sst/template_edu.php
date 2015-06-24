<?php
/**
 * The template for displaying the education pages.
 *
 * Template Name: Education
 *
 * @package Spike
 */

get_header(); ?>

	<?php
		$thumb_id = get_post_thumbnail_id();
		$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true)[0];
		
		$fields = get_fields();
	?>

	<div id="primary" class="content-area" style="background-image: url('<?= $thumb_url; ?>')">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>

			<article <?php post_class(); ?>>
				<section class="intro">
					<?php the_content(); ?>
				</section>
				<section class="info constrain">
					<div class="info-block">
						<?= $fields['middle_school']; ?>
					</div>
					<div class="info-block">
						<?= $fields['high_school']; ?>
					</div>
				</section>
			</article>
	
			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
