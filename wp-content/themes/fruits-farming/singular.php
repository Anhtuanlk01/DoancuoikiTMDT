<?php
/**
 * The template for displaying single posts and pages.
 * @package Fruits Farming
 * @since 1.0.0
 */
get_header();

    $fruits_farming_default = fruits_farming_get_default_theme_options();
    $fruits_farming_global_sidebar_layout = esc_html( get_theme_mod( 'fruits_farming_global_sidebar_layout',$fruits_farming_default['fruits_farming_global_sidebar_layout'] ) );
    $fruits_farming_post_sidebar = esc_html( get_post_meta( $post->ID, 'fruits_farming_post_sidebar_option', true ) );
    $fruits_farming_sidebar_column_class = 'column-order-1';

    if (!empty($fruits_farming_post_sidebar)) {
        $fruits_farming_global_sidebar_layout = $fruits_farming_post_sidebar;
    }

    if ($fruits_farming_global_sidebar_layout == 'left-sidebar') {
        $fruits_farming_sidebar_column_class = 'column-order-2';
    } ?>

    <div id="single-page" class="singular-main-block">
        <div class="wrapper">
            <div class="column-row">

                <div id="primary" class="content-area <?php echo esc_attr($fruits_farming_sidebar_column_class); ?>">
                    <main id="site-content" class="" role="main">

                        <?php
                            fruits_farming_breadcrumb();

                        if( have_posts() ): ?>

                            <div class="article-wraper">

                                <?php while (have_posts()) :
                                    the_post();

                                    get_template_part('template-parts/content', 'single');

                                    if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && !post_password_required() ) { ?>

                                        <div class="comments-wrapper">
                                            <?php comments_template(); ?>
                                        </div>

                                    <?php
                                    }

                                endwhile; ?>

                            </div>

                        <?php
                        else :

                            get_template_part('template-parts/content', 'none');

                        endif;

                        /**
                         * Navigation
                         * 
                         * @hooked fruits_farming_related_posts - 20  
                         * @hooked fruits_farming_single_post_navigation - 30  
                        */

                        do_action('fruits_farming_navigation_action'); ?>

                    </main>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </div>

<?php
get_footer();
