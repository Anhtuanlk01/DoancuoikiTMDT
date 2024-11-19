<?php
/**
 * The main template file
 * @package Fruits Farming
 * @since 1.0.0
 */

get_header();
$fruits_farming_default = fruits_farming_get_default_theme_options();
$fruits_farming_global_sidebar_layout = esc_html( get_theme_mod( 'fruits_farming_global_sidebar_layout',$fruits_farming_default['fruits_farming_global_sidebar_layout'] ) );
$fruits_farming_sidebar_column_class = 'column-order-2';
if ($fruits_farming_global_sidebar_layout == 'right-sidebar') {
    $fruits_farming_sidebar_column_class = 'column-order-1';
}

global $fruits_farming_archive_first_class; ?>
    <div class="archive-main-block">
        <div class="wrapper">
            <div class="column-row">

                <div id="primary" class="content-area <?php echo esc_attr($fruits_farming_sidebar_column_class) ; ?>">
                    <main id="site-content" role="main">

                        <?php

                        if( !is_front_page() ) {
                            fruits_farming_breadcrumb();
                        }

                        if( have_posts() ): ?>

                            <div class="article-wraper article-wraper-archive">
                                <?php
                                while( have_posts() ):
                                    the_post();

                                    get_template_part( 'template-parts/content', get_post_format() );

                                endwhile; ?>
                            </div>

                            <?php
                            if( is_search() ){
                                the_posts_pagination();
                            }else{
                                do_action('fruits_farming_archive_pagination');
                            }

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif; ?>
                    </main>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
<?php
get_footer();
