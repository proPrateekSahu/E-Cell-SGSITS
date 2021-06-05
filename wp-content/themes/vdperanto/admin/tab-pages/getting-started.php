<?php
/**
 * Getting started template
 */
?>

<div id="getting_started" class="vdperanto-tab-pane active">

	<div class="container-fluid">
		<div class="row">
		    <div class="col-md-12">
				<h1 class="vdperanto-info-title text-center"><?php echo esc_html__('About the Vdperanto theme','vdperanto'); ?></h1>
		    </div>
		</div>
		<div class="row">
			<div class="col-md-6">
                            
                                <div class="vdperanto-tab-pane-half vdperanto-tab-pane-first-half">
					<div>
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'This theme is ideal for creating corporate and business websites. There is no separate premium version of it, as Vdperanto is a child theme of the Busiprof WordPress theme. The premium version, Busiprof PRO has tons of features: a homepage with many sections where you can feature unlimited services, portfolios, user reviews, latest news, callout, custom widgets and much more.', 'vdperanto' ); ?>
						</p>
					</div>
				</div>
                            
				<div class="vdperanto-tab-pane-half vdperanto-tab-pane-first-half">
					<h3><?php esc_html_e( "Recommended Plugins", 'vdperanto' ); ?></h3>
					<div style="border-top: 1px solid #eaeaea;">
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'To take full advanctage of the theme features you need to install recommended plugins.', 'vdperanto' ); ?>
						
						</p>
						<p><a target="_self" href="#recommended_actions" class="vdperanto-custom-class"><?php esc_html_e( 'Click here','vdperanto');?></a></p>
					</div>
				</div>

				<div class="vdperanto-tab-pane-half vdperanto-tab-pane-first-half">
					<h3><?php esc_html_e( "Start Customizing", 'vdperanto' ); ?></h3>
					<div style="border-top: 1px solid #eaeaea;">
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'After activating recommended plugins , now you can start customization.', 'vdperanto' ); ?>
						
						</p>
						<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer','vdperanto');?></a></p>
					</div>
				</div>				
			</div>
			<div class="col-md-6">
				<div class="vdperanto-tab-pane-half vdperanto-tab-pane-first-half">
				<img src="<?php echo esc_url( VDPERANTO_TEMPLATE_DIR_URI ) . '/admin/img/vdperanto.png'; ?>" alt="<?php esc_attr_e( 'vdperanto Theme', 'vdperanto' ); ?>" />
				</div>
			</div>	
		</div>
		<div class="row">
			<div class="vdperanto-tab-center">
				<h3><?php esc_html_e( "Useful Links", 'vdperanto' ); ?></h3>
			</div>
			<div class=" useful_box">
                <div class="vdperanto-tab-pane-half vdperanto-tab-pane-first-half">
                    <a href="<?php echo esc_url('https://vdperanto.webriti.com/'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-desktop info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Lite Demo','vdperanto'); ?></p>
                	</a>
                    <a href="<?php echo esc_url('https://webriti.com/demo/wp/preview/?prev=busiprof/'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-book-alt info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('PRO Demo','vdperanto'); ?></p>
                    </a>        
                </div>
                <div class="vdperanto-tab-pane-half vdperanto-tab-pane-first-half">
                    <a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/vdperanto'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-smiley info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Your feedback is valuable to us','vdperanto'); ?></p>
                    </a>
                    <a href="<?php echo esc_url('https://webriti.com/busiprof/'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-book-alt info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Premium Theme Details','vdperanto'); ?></p>
                    </a>
                </div>
            </div>        
        </div>            
    </div>
</div>