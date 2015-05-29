<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Spike
 */
?>

	</div><!-- #content -->

	<footer class="site-footer" role="contentinfo">
		<div class="constrain footer-wrap">
			<section class="resources">
				<?php if ( is_active_sidebar( 'footer_1' ) ) : ?>
					<?php dynamic_sidebar( 'footer_1' ); ?>
				<?php endif; ?>
			</section>
			<section class="twitter">
				<?php if ( is_active_sidebar( 'footer_2' ) ) : ?>
					<?php dynamic_sidebar( 'footer_2' ); ?>
				<?php endif; ?>
			</section>
			<section class="site-info">
				<?php if ( is_active_sidebar( 'footer_3' ) ) : ?>
					<?php dynamic_sidebar( 'footer_3' ); ?>
				<?php endif; ?>
			</section>
		</div>
	</footer><!-- #colophon -->

<?php wp_footer(); ?>
</div> <!-- .whte-bg -->
<!-- Script Loading -->
<script src="<?= get_stylesheet_directory_uri(); ?>/js/site.min.js" async></script>

</body>
</html>
