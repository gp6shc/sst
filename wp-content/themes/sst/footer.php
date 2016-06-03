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
		<div class="constrain">
			<div class="footer-wrap">
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
		</div>
	</footer><!-- #colophon -->

<?php if ( get_option("parent_modal") == 1 || current_user_can( 'manage_options' )): ?>
	<div id="temp" class="modal fade out" tabindex="-1" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Visit SaferSmarterFamilies.org</h4>
	      </div>
	      <div class="modal-body">
	      		<p>Check out customized resources available for your family on <a href="http://safersmarterfamilies.org" target="_blank" data-dismiss="modal">SaferSmarterFamilies.org</a> — or continue to learn more about the Safer, Smarter Teens curriculum.</p>
	      </div>
	      <div class="modal-footer">
	        <a href="/parents/toolkit/" class="btn btn-blue">Continue to Parents</a>
	        <a href="http://safersmarterfamilies.org" target="_blank" class="btn">SaferSmarterFamilies.org</a>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<script src="<?= get_template_directory_uri();?>/js/modal.js"></script>
	<style>.modal,.modal-open{overflow:hidden}.modal,.modal-backdrop{right:0;bottom:0;left:0}.modal{display:none;position:fixed;top:0;z-index:100;-webkit-overflow-scrolling:touch;outline:0}.modal.in .modal-dialog{-webkit-transform:translate(0,50%);-ms-transform:translate(0,50%);transform:translate(0,50%);-webkit-transition:-webkit-transform .3s ease-out;transition:transform .3s ease-out}.modal-open .modal{overflow-x:hidden;overflow-y:auto}.modal-dialog{position:relative;top:50%;width:575px;margin:30px auto;-webkit-transform:translate(0,-125%);-ms-transform:translate(0,-125%);transform:translate(0,-125%);-webkit-transition:-webkit-transform .5s ease-in;transition:transform .5s ease-in}.modal-content{position:relative;background-color:#fff;border:1px solid #fff;border-radius:3px;box-shadow:0 5px 15px rgba(0,0,0,.5);background-clip:padding-box;outline:0}.modal-backdrop{position:fixed;top:0;z-index:40;background-color:rgba(0,0,0,.6);-webkit-transition:opacity .2s linear;transition:opacity .2s linear}.modal-backdrop.fade{opacity:0}.modal-backdrop.in{opacity:1}.modal-header{padding:1em}.modal-header .close{background:0 0;float:right;font-size:2em;padding:.3em;	border: none;line-height: 0.7;}.modal-title{margin:0;line-height:1.5;padding:0;font-size:1.7em;text-transform: initial;}.modal-body{position:relative;padding:0 1.3em 1.6em}.modal-footer{padding:0 1em 1em;text-align:right}.modal-footer a{display:inline-block}.modal-footer .btn{padding:.7em;margin-bottom:10px}.modal-footer .btn+.btn{margin-left:5px;margin-bottom:0}.modal-footer .btn-group .btn+.btn{margin-left:-1px}.modal-footer .btn-block+.btn-block{margin-left:0}.modal-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}@media (max-width:580px){.modal-dialog{width:96%}}.btn{font-size:1.1em}</style>
	<script>
		if ( window.location.search === "?modal" ) jQuery("#temp").modal();
			
		jQuery('#menu-item-41 a').on('click', function(e) {
			e.preventDefault();
			jQuery("#temp").modal();
		})	;
	</script>
<?php endif; ?>

<?php wp_footer(); ?>
</div> <!-- .whte-bg -->
<!-- Script Loading -->
<script type="text/javascript" src="<?= get_stylesheet_directory_uri(); ?>/js/site.min.js"></script>
</body>
</html>
