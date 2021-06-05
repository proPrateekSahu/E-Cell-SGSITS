<?php
$vdperanto_parent_current_options = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), busiprof_theme_setup_data() ); 
$vdperanto_options = wp_parse_args(get_option('busiprof_theme_options', array()), vdperanto_default_data());
if ($vdperanto_options['blog_masonry3_layout_setting'] == 'masonry3') {
	$vdperanto_home_blog_class='site-content home-masonry';
}
else{
	$vdperanto_home_blog_class='home-post-latest';
}
if( $vdperanto_parent_current_options['home_recentblog_section_enabled']=='on' ) { ?>
<!-- Testimonial & Blog Section -->
<section id="section" class="<?php echo esc_attr($vdperanto_home_blog_class);?>">
	<div class="container">	
		<!-- Section Title -->
		<div class="row">
		<?php
		if( $vdperanto_parent_current_options['recent_blog_title'] != '' || $vdperanto_parent_current_options['recent_blog_description'] !='' ) { ?>
			<div class="col-md-12">
				<div class="section-title">
					<?php
					if( $vdperanto_parent_current_options['recent_blog_title'] != '' ) { ?> 
					<h1 class="section-heading"><?php echo wp_kses_post($vdperanto_parent_current_options['recent_blog_title']);?></h1>
					<?php } if( $vdperanto_parent_current_options['recent_blog_description'] !='')  { ?>
					<p><?php echo esc_html($vdperanto_parent_current_options['recent_blog_description']);?></p>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
		</div>
		<!-- /Section Title -->	
		<?php 
        if ($vdperanto_options['blog_masonry3_layout_setting'] == 'masonry3') {
            vdperanto_blog_masonry_layout();
        } else {
            vdperanto_blog_default_layout();
        }?> 
			
			
	</div>
</section>
<!-- End of Testimonial & Blog Section -->
<div class="clearfix"></div>
<?php }