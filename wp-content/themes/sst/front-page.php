<?php
/**
 * The template for displaying the home page.
 *
 * @package Spike
 */

get_header(); ?>
<?php
	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true)[0];
	
	$fields = get_fields();
?>

<div class="hero" style="background-image: url('<?= $thumb_url; ?>')">
	<div class="constrain">
		<div class="caption">
			<?= $fields['photo_caption']; ?>
		</div>
	</div>
</div>

<main id="main" class="site-main" role="main">
	<div class="constrain">
		<section class="welcome text-centered">
			<?= $fields['welcome_message']; ?>
		</section>
	</div>
	
	<section class="grid constrain">
		<div class="middle grunge">
			<div class="grid-content contain-50 contain-right">
				<?= $fields['middle_school']; ?>
			</div>
		</div>
		<div class="high change-collage">
			<div class="grid-content contain-50 contain-left">
				<?= $fields['high_school']; ?>
			</div>
		</div>
		<div class="video change-collage">
			<div class="grid-content contain-25 contain-right">
				<div class="video-wrapper">
					<iframe 
						frameborder="0"
						webkitallowfullscreen
						mozallowfullscreen 
						allowfullscreen
						src="https://player.vimeo.com/video/<?= $fields['video_id']; ?>?color=00A7D0&byline=0&portrait=0&badge=0">
					</iframe>
				</div>
			</div>
		</div>
		<div class="stat grunge">
			<div class="grid-content contain-75 contain-left brush">
				<div class="cf">
				<?= $fields['stat']; ?>
				</div>
			</div>
		</div>
		<div class="lauren grunge">
			<div class="grid-content contain-75 contain-right flex-center">
				<div class="fifty">
					<?= $fields['lauren']; ?>
				</div>
				<div class="fifty lauren-contain"><div class="lauren-image"></div></div>
			</div>
		</div>
		<div class="video-2 change-collage">
			<div class="grid-content contain-25 contain-left">
				<div class="video-wrapper">
					<iframe 
						frameborder="0"
						webkitallowfullscreen
						mozallowfullscreen 
						allowfullscreen
						src="https://player.vimeo.com/video/<?= $fields['video_id_2']; ?>?color=00A7D0&byline=0&portrait=0&badge=0">
					</iframe>
				</div>
			</div>
		</div>
		<div class="order change-collage">
			<div class="grid-content contain-25 contain-right">
				<?= $fields['order']; ?>
			</div>
		</div>
		<div class="about grunge">
			<div class="grid-content contain-75 contain-left">
				<?= $fields['about']; ?>
			</div>
		</div>
	</section>
	
	<?php if (is_user_logged_in()): ?>
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'spike' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
	<?php endif; ?>
</main> <!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
