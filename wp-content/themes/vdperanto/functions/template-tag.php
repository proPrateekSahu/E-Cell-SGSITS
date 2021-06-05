<?php
if (!function_exists('vdperanto_header_sticky_layout')) :

    function vdperanto_header_sticky_layout() {
        $vdperanto_current_options = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), busiprof_theme_setup_data() );?>
        <!-- Navbar -->
        <nav class="navbar navbar-default navbar4">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <?php
                    if (($vdperanto_current_options['enable_logo_text'] == true) && ($vdperanto_current_options['enable_logo_text'] != 'nomorenow') && (!has_custom_logo())) {
                        echo '<a class="navbar-brand" href="' . esc_url(home_url('/')) . '" class="brand">';
                        bloginfo('name');
                        echo '</a>';
                    }
                    elseif (($vdperanto_current_options['upload_image'] != "") && ($vdperanto_current_options['enable_logo_text'] != 'nomorenow') && (!has_custom_logo())) {
                        ?>
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" class="brand">
                            <img alt="<?php bloginfo("name"); ?>" src="<?php echo esc_url($vdperanto_current_options['upload_image']);?>"
                                 alt="<?php bloginfo("name"); ?>"
                                 class="logo_imgae" style="width:<?php echo esc_attr($vdperanto_current_options['width']) . 'px'; ?>; height:<?php echo esc_attr($vdperanto_current_options['height']) . 'px'; ?>;">
                        </a>
                        <?php
                    }
                    else {
                        $vdperanto_current_options['enable_logo_text'] = 'nomorenow';
                        update_option('busiprof_theme_options', $vdperanto_current_options);
                        if (has_custom_logo()):
                            echo '<span class="navbar-brand">';
                            the_custom_logo();
                            echo '</span>';
                        endif;
                        ?>
                        <div class="custom-logo-link-url">
                            <h1 class="site-title"><a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" ><?php bloginfo('name'); ?></a>
                            </h1>
                            <?php
                            $vdperanto_description = get_bloginfo('description', 'display');
                            if ($vdperanto_description || is_customize_preview()) :
                                ?>
                                <p class="site-description"><?php echo $vdperanto_description; ?></p>
                            <?php endif; ?>
                        </div>
                        <?php
                    }?>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only"><?php esc_html_e('Toggle navigation', 'vdperanto'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => 'nav-collapse collapse navbar-inverse-collapse',
                        'menu_class' => 'nav navbar-nav navbar-right',
                        'fallback_cb' => 'busiprof_fallback_page_menu',
                        'walker' => new Busiprof_nav_walker())
                    );
                    ?>
                </div>
            </div>
        </nav>
        <!-- End of Navbar -->
        <?php
         }
endif;

if (!function_exists('vdperanto_header_default_layout')) :

    function vdperanto_header_default_layout() {
        $vdperanto_current_options = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), busiprof_theme_setup_data() );?>
        <!-- Navbar -->
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <?php
                        if (($vdperanto_current_options['enable_logo_text'] == true) && ($vdperanto_current_options['enable_logo_text'] != 'nomorenow') && (!has_custom_logo())) {
                            echo '<a class="navbar-brand" href="' . esc_url(home_url('/')) . '" class="brand">';
                            bloginfo('name');
                            echo '</a>';
                        } elseif (($vdperanto_current_options['upload_image'] != "") && ($vdperanto_current_options['enable_logo_text'] != 'nomorenow') && (!has_custom_logo())) {
                            ?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" class="brand">
                                <img alt="<?php bloginfo("name"); ?>" src="<?php echo esc_url($vdperanto_current_options['upload_image']);?>"
                                     alt="<?php bloginfo("name"); ?>"
                                     class="logo_imgae" style="width:<?php echo esc_attr($vdperanto_current_options['width']) . 'px'; ?>; height:<?php echo esc_attr($vdperanto_current_options['height']) . 'px'; ?>;">
                            </a>
                            <?php
                        } else {
                            $vdperanto_current_options['enable_logo_text'] = 'nomorenow';
                            update_option('busiprof_theme_options', $vdperanto_current_options);
                            if (has_custom_logo()):
                                echo '<span class="navbar-brand">';
                                the_custom_logo();
                                echo '</span>';
                            endif;
                            ?>
                            <div class="custom-logo-link-url">
                                <h1 class="site-title"><a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" ><?php bloginfo('name'); ?></a>
                                </h1>
                                <?php
                                $vdperanto_description = get_bloginfo('description', 'display');
                                if ($vdperanto_description || is_customize_preview()) :
                                    ?>
                                    <p class="site-description"><?php echo $vdperanto_description; ?></p>
                                <?php endif; ?>
                            </div>
                            <?php
                        }
                        ?>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only"><?php esc_html_e('Toggle navigation', 'vdperanto'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container' => 'nav-collapse collapse navbar-inverse-collapse',
                            'menu_class' => 'nav navbar-nav navbar-right',
                            'fallback_cb' => 'busiprof_fallback_page_menu',
                            'walker' => new Busiprof_nav_walker())
                        );
                        ?>
                    </div>
                </div>
            </nav>
            <!-- End of Navbar -->
        <?php
        }
endif;

/**
 * Masonry 2 Column blog Layout
 */
if (!function_exists('vdperanto_blog_masonry_layout')) :

    function vdperanto_blog_masonry_layout() {?>
        <div class="row site-content" id="blog-masonry">
        <?php
        $vdperanto_current_options = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), busiprof_theme_setup_data() );
        $vdperanto_args = array( 'post_type' => 'post','posts_per_page' => 6,'post__not_in'=>get_option("sticky_posts")) ;
        query_posts( $vdperanto_args );
            if(query_posts( $vdperanto_args ))
            {
                while(have_posts()):the_post();
                { ?>
                    <div class="item">
                        <article class="post">
                            <figure class="post-thumbnail"><?php $vdperanto_defalt_arg =array('class' => "");?>
                                <?php if(has_post_thumbnail()){?>
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('',$vdperanto_defalt_arg);?></a>
                                <?php $vdperanto_cat_list = get_the_category_list();
                                $vdperanto_cat_list = get_the_category();
                                if( $vdperanto_current_options['home_recentblog_meta_enable']=='on' ) { 
                                    if(!empty($vdperanto_cat_list)) {
                                        echo '<span class="cat-links">';
                                        foreach ($vdperanto_cat_list as $category){
                                        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->cat_name) . '</a>';
                                        }
                                    echo '</span>';
                                    }
                                }
                                }?>
                            </figure>
                            <aside class="masonry-content">
                                <?php if( $vdperanto_current_options['home_recentblog_meta_enable']=='on' ) { ?>
                                <div class="entry-meta">
                                <?php if(!has_post_thumbnail()){
                                $vdperanto_cat_list = get_the_category_list();
                                $vdperanto_cat_list = get_the_category();
                                    if(!empty($vdperanto_cat_list)) {
                                        echo '<span class="cat-links">';
                                        foreach ($vdperanto_cat_list as $category){
                                        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->cat_name) . '</a>';
                                        }
                                    echo '</span>';
                                    }
                                }?>
                                <span class="entry-date"><a href="<?php echo esc_url( home_url('/') ); ?><?php echo esc_html(date( 'Y/m' , strtotime( get_the_date() )) ); ?>"><time datetime=""><?php echo esc_html(get_the_date());?></time></a></span>
                                <?php if( get_the_tags() ) { ?>
                                <span class="tag-links"><?php the_tags('', ', ', ''); ?></span>
                                <?php } ?>
                                </div>
                                <?php } ?>


                                <header class="entry-header">
                                    <h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                                </header>
                                <div class="entry-content">
                                    <p><?php the_content(__('Read More','vdperanto')); ?></p>
                                </div>
                                <?PHP
                                if( $vdperanto_current_options['home_recentblog_meta_enable']=='on' ) { ?>
                                <span class="author">
                                    <figure class="avatar">
                                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>"><img src="<?php echo esc_url(get_avatar_url('ID'));?>" alt="<?php echo esc_attr(get_the_author()); ?>"></a>
                                    </figure>
                                    by <a rel="tag" class="name" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html(get_the_author()); ?></a>
                                </span>
                                <?Php } ?>

                            </aside>
                        </article>
                    </div>
                <?php
                }
                endwhile;
                wp_reset_postdata();
            }
    }
endif;

/**
 * default blog Layout
 */
if (!function_exists('vdperanto_blog_default_layout')) :

    function vdperanto_blog_default_layout() {?>
        <!-- Blog Post -->
        <div class="row">
        <?php
        $vdperanto_current_options = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), busiprof_theme_setup_data() );
        $vdperanto_args = array( 'post_type' => 'post','posts_per_page' => 4,'post__not_in'=>get_option("sticky_posts")) ;
        query_posts( $vdperanto_args );
            if(query_posts( $vdperanto_args ))
            {
                while(have_posts()):the_post();
            { ?>
            <div class="col-md-6">
                <div class="post">
                    <div class="media">
                        <figure class="post-thumbnail"><?php $vdperanto_defalt_arg =array('class' => "");?>
                            <?php if(has_post_thumbnail()){?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('',$vdperanto_defalt_arg);?></a>
                            <?php } ?>
                        </figure>
                        <div class="media-body">
                            <?php if( $vdperanto_current_options['home_recentblog_meta_enable']=='on' ) { ?>
                            <div class="entry-meta">
                            <span class="entry-date"><a href="<?php echo esc_url( home_url('/') ); ?><?php echo esc_html(date( 'Y/m' , strtotime( get_the_date() )) ); ?>"><time datetime=""><?php echo esc_html(get_the_date());?></time></a></span>
                            <span class="comments-link"><?php  comments_popup_link( esc_html__( 'Leave a Reply', 'vdperanto' ) ); ?></span>
                            <?php if( get_the_tags() ) { ?>
                            <span class="tag-links"><?php the_tags('', ', ', ''); ?></span>
                            <?php } ?>
                            </div>
                            <?php } ?>


                            <div class="entry-header">
                                <h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                            </div>
                            <div class="entry-content">
                                <p><?php the_content(__('Read More','vdperanto')); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
             endwhile;
             wp_reset_postdata();  }?>
        </div>
    <?php
    }
endif;
