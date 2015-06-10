<?php
/**
 * The template for displaying Middle School and High Schoo.
 *
 * Template Name: Middle & High
 *
 * @package Spike
 */

get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
	
	<?php
		
		// Get ACF fields
		$fields = get_fields();  
		
		// if there is no "Did You Know" block, get the featured image url
		if ( !$fields['did_you_know'] ) {
			$thumb_id = get_post_thumbnail_id();
			$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true)[0];
		}
	?>
	
	<div class="page-hero" <?php if ( !$fields['did_you_know'] ): ?>style="background-image: url(<?= $fields['logo']; ?>), url(<?= $thumb_url; ?>)"<?php endif;?>>
		<?php if ( ($fields['did_you_know']) ): ?>
		<div class="constrain flex-center">
			<div class="did-you-know">
				<?= $fields['did_you_know']; ?>
			</div>
			<div class="lauren-image"></div>
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
						<section class="grade-intro">
							<?php the_content();?>
						</section>
						
						<div class="overview-wrapper flex-center">
							<div class="grade-main">
								<section class="overview">
									<?= $fields['overview']; ?>
								</section>
								
								<section class="lesson-video">
									<h2 class="overline">Lesson 1 Video</h2>
									<div class="video-wrapper">
										<iframe 
											frameborder="0"
											webkitallowfullscreen
											mozallowfullscreen 
											allowfullscreen
											src="https://player.vimeo.com/video/<?= $fields['video_id']; ?>?color=00A7D0&byline=0&portrait=0&badge=0">
										</iframe>
									</div>
								</section>
							</div>
							
							<div class="grade-sidebar">
								<section class="topic-list">
									<?= $fields['topic_list']; ?>
								</section>
			
								<section class="">
									<h2 class="overline">Sample Lesson</h2>
									<div class="download">
										<?= $fields['download']; ?>
									</div>
								</section>
							</div>
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
