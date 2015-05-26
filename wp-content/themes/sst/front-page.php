<?php
/**
 * The template for displaying the home page.
 *
 * @package Spike
 */

get_header(); ?>

<div class="hero">
	<div class="constrain">
		<div class="caption">
			<h1 class="brush">This is a Headline</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>
		</div>
	</div>
</div>

<main id="main" class="site-main" role="main">
	<div class="constrain">
		<section class="welcome text-centered">
			<h1>This is a Welcome Message</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt rutrum varius. Suspendisse sit amet est viverra, ultrices velit ac, porta enim. To prevent sexual abuse through awareness and education, and to help survivors heal with guidance and support.</p>
			<a href="/about" class="btn-double">Learn More</a>
		</section>
	</div>
	
	<section class="grid constrain">
		<div class="middle grunge">
			<div class="grid-content contain-50 contain-right">
				<h2 class="brush">Middle School</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<a href="/middle-school" class="btn btn-purple">Learn More</a>
			</div>
		</div>
		<div class="high change-collage">
			<div class="grid-content contain-50 contain-left">
				<h2 class="brush">High School</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<a href="/middle-school" class="btn btn-blue">Learn More</a>
			</div>
		</div>
		<div class="stat change-collage">
			<div class="contain-25 contain-right brush">
				<div class="ninety-five">95%</div>
				<div class="stat-small"><span>of sexual abuse is</span> preventable through</div>
				<div class="stat-large">education <span>&</span></div>
				<div class="stat-large stat-awareness">awareness</div>
			</div>
		</div>
		<div class="lauren grunge">
			<div class="grid-content contain-75 contain-left cf">
				<div class="fifty">
					<h2>Meet Lauren</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
					<a class="btn btn-purple" href="#">Learn More</a>
				</div>
				<div class="fifty">
					<img class="lauren-img" src="<?= get_template_directory_uri()?>/img/lauren.png"/>
				</div>
			</div>
		</div>
		<div class="about grunge">
			<div class="grid-content contain-75 contain-right">
				<h2 class="butterfly">About Lauren's Kids</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</div>
		<div class="order change-collage">
			<div class="grid-content contain-25 contain-left">
				<h5 class="brush">Order Now</h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
				<a class="btn btn-blue" href="#">Order Now</a>
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
