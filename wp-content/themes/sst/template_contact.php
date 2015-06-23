<?php
/**
 * The template for displaying the contact page
 *
 * Template Name: Contact
 *
 * @package Spike
 */

get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
	
	<?php 		
		$thumb_id = get_post_thumbnail_id();
		$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true)[0];
	?>
	
	<div class="page-hero" style="background-image: url('<?= $thumb_url; ?>')"></div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="constrain">
					<header class="entry-header">
						<h1 class="entry-title brush"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
				
					<div class="entry-content">
						<?php the_content();?>
					</div><!-- .entry-content -->

					<form class="contact-form" action="http://laurens-kids.force.com/website/contact_us" method="post" data-parsley-validate>
						<input type="hidden" name="thankYouURL" value="//safersmarterteens.org"/>
						<input type="hidden" id="topic" name="topic" value="Safer, Smarter Teens" />					
					
						<div class="field">
							<label for="firstname">First Name*</label>
							<input id="firstname" type="text" name="firstname" required="required" placeholder="first" maxlength="40"/>
						</div>
						<div class="field">
							<label for="lastname">Last Name*</label>
							<input id="lastname" type="text" name="lastname" required="required" placeholder="last" maxlength="80"/>
						</div>
						<div class="field">
							<label for="email_address">Email*</label>
							<input id="email_address" type="email" name="email_address" required="required" placeholder="you@example.com"/>
						</div>
						<div class="field">
							<label for="phone">Phone</label>
							<input id="phone" name="phone" type="tel" pattern="[0-9]{3}-?[0-9]{3}-?[0-9]{4}" placeholder="123-456-7890" maxlength="12"/>
						</div>
						<div class="field">
							<label for="city">City</label>
							<input id="city" type="text" name="mailing_city" placeholder="city" maxlength="40"/>
						</div>
						<div class="field">
							<label for="state">State</label>
							<select id="state" name="mailing_state" placeholder="hello">
								<option value="">state</option>
							    <option value="AL">Alabama</option>
							    <option value="AK">Alaska</option>
							    <option value="AZ">Arizona</option>
							    <option value="AR">Arkansas</option>
							    <option value="CA">California</option>
							    <option value="CO">Colorado</option>
							    <option value="CT">Connecticut</option>
							    <option value="DE">Delaware</option>
							    <option value="DC">District of Columbia</option>
							    <option value="FL">Florida</option>
							    <option value="GA">Georgia</option>
							    <option value="HI">Hawaii</option>
							    <option value="ID">Idaho</option>
							    <option value="IL">Illinois</option>
							    <option value="IN">Indiana</option>
							    <option value="IA">Iowa</option>
							    <option value="KS">Kansas</option>
							    <option value="KY">Kentucky</option>
							    <option value="LA">Louisiana</option>
							    <option value="ME">Maine</option>
							    <option value="MD">Maryland</option>
							    <option value="MA">Massachusetts</option>
							    <option value="MI">Michigan</option>
							    <option value="MN">Minnesota</option>
							    <option value="MS">Mississippi</option>
							    <option value="MO">Missouri</option>
							    <option value="MT">Montana</option>
							    <option value="NE">Nebraska</option>
							    <option value="NV">Nevada</option>
							    <option value="NH">New Hampshire</option>
							    <option value="NJ">New Jersey</option>
							    <option value="NM">New Mexico</option>
							    <option value="NY">New York</option>
							    <option value="NC">North Carolina</option>
							    <option value="ND">North Dakota</option>
							    <option value="OH">Ohio</option>
							    <option value="OK">Oklahoma</option>
							    <option value="OR">Oregon</option>
							    <option value="PA">Pennsylvania</option>
							    <option value="RI">Rhode Island</option>
							    <option value="SC">South Carolina</option>
							    <option value="SD">South Dakota</option>
							    <option value="TN">Tennessee</option>
							    <option value="TX">Texas</option>
							    <option value="UT">Utah</option>
							    <option value="VT">Vermont</option>
							    <option value="VA">Virginia</option>
							    <option value="WA">Washington</option>
							    <option value="WV">West Virginia</option>
							    <option value="WI">Wisconsin</option>
							    <option value="WY">Wyoming</option>
							</select>
						</div>
						<div class="field">
							<label for="zip_code">Zip Code*</label>
							<input id="zip_code" type="text" name="zip_code" required="required" pattern="[0-9]{5}(-?[0-9]{4})?" placeholder="33180" maxlength="10"/>
						</div>
							<div class="field">
							<label for="message">Comments*</label>
							<textarea id="message" name="message" required="required" rows="5" maxlength="512"  maxlength="512"></textarea>
						</div>
							<br/>
						<div class="submit-field">
							<button class="btn-double" type="submit">Submit</button>
						</div>
					</form>			
					
					<footer class="entry-footer">
						<?php edit_post_link( __( 'Edit', 'spike' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</div>
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php endwhile; // end of the loop. ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?= get_stylesheet_directory_uri()?>/js/parsley.min.js"></script>
<?php get_footer(); ?>