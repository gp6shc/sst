<?php
/**
 * The template for displaying teacher and parent pages.
 *
 * Template Name: Teacher & Parents
 *
 * @package Spike
 */

get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
	
	<?php 
		// Get ACF fields
		$fields = get_fields();
		
		// if there is no "Did You Know" block, get the featured image url
		$thumb_id = get_post_thumbnail_id();
		$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true)[0];
	?>
	
	<div class="page-hero" style="background-image: url('<?= $thumb_url; ?>')">
		<?php if ( ($fields['did_you_know']) ): ?>
		<div class="constrain flex-center">
			<div class="did-you-know">
				<?= $fields['did_you_know']; ?>
			</div>
			<div class="dyn-icon" style="background-image:url('<?= $fields['icon']; ?>')"></div>
		</div>
		<?php endif; ?>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="constrain">
					<header class="entry-header">
						<h1 class="entry-title brush"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
				
					<div class="entry-content">
						<?php the_content();?>
						
						<h2>FAQs</h2>
						<div class="faq-wrapper">
						<?php if ( $fields['faqs'] ): ?>
							<?php foreach ($fields['faqs'] as $faq) : ?>
								<section class="faq">
									<div class="question"><?= $faq['question']; ?></div>
									<div class="answer"><?= $faq['answer']; ?></div>
								</section>
							<?php endforeach; ?>
						<?php endif; ?>
						</div>
					</div><!-- .entry-content -->
					
					<footer class="entry-footer">
						<?php edit_post_link( __( 'Edit', 'spike' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</div>
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
