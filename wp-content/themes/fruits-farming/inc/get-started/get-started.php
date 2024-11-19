<?php
/**
 * Added Omega Page. */

/**
 * Add a new page under Appearance
 */
function fruits_farming_menu()
{
  add_theme_page(__('Omega Options', 'fruits-farming'), __('Omega Options', 'fruits-farming'), 'edit_theme_options', 'fruits-farming-theme', 'fruits_farming_page');
}
add_action('admin_menu', 'fruits_farming_menu');

// Add Getstart admin notice
function fruits_farming_admin_notice() { 
    global $pagenow;
    $theme_args = wp_get_theme();
    $meta = get_option( 'fruits_farming_admin_notice' );
    $name = $theme_args->get( 'Name' );
    $current_screen = get_current_screen();

    if ( ! $meta ) {
        if ( is_network_admin() ) {
            return;
        }

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( $current_screen->base != 'appearance_page_fruits-farming-theme' ) {
            ?>
            <div class="notice notice-success notice-content">
                <h2><?php esc_html_e( 'Thank You for installing Fruits Farming Theme!', 'fruits-farming' ); ?> </h2>
                <div class="info-link">
                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=fruits-farming-theme' ) ); ?>"><?php esc_html_e( 'Omega Options', 'fruits-farming' ); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url( FRUITS_FARMING_LITE_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'fruits-farming' ); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url( FRUITS_FARMING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Upgrade to Pro', 'fruits-farming' ); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url( FRUITS_FARMING_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Premium Demo', 'fruits-farming' ); ?></a>
                </div>
                <p class="dismiss-link"><strong><a href="?fruits_farming_admin_notice=1"><?php esc_html_e( 'Dismiss', 'fruits-farming' ); ?></a></strong></p>
            </div>
            <?php
        }
    }
}
add_action( 'admin_notices', 'fruits_farming_admin_notice' );

if ( ! function_exists( 'fruits_farming_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
 */
function fruits_farming_update_admin_notice() {
    if ( isset( $_GET['fruits_farming_admin_notice'] ) && $_GET['fruits_farming_admin_notice'] == '1' ) {
        update_option( 'fruits_farming_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'fruits_farming_update_admin_notice' );

// After Switch theme function
add_action( 'after_switch_theme', 'fruits_farming_getstart_setup_options' );
function fruits_farming_getstart_setup_options() {
    update_option( 'fruits_farming_admin_notice', false );
}

/**
 * Enqueue styles for the help page.
 */
function fruits_farming_admin_scripts($hook)
{
  wp_enqueue_style('fruits-farming-admin-style', get_template_directory_uri() . '/inc/get-started/get-started.css', array(), '');
}
add_action('admin_enqueue_scripts', 'fruits_farming_admin_scripts');

/**
 * Add the theme page
 */
function fruits_farming_page(){
$fruits_farming_user = wp_get_current_user();
$fruits_farming_theme = wp_get_theme();
?>
<div class="das-wrap">
  <div class="fruits-farming-panel header">
    <div class="fruits-farming-logo">
      <span></span>
      <h2><?php echo esc_html( $fruits_farming_theme ); ?></h2>
    </div>
    <p>
      <?php
        $fruits_farming_theme = wp_get_theme();
        echo wp_kses_post( apply_filters( 'omega_theme_description', esc_html( $fruits_farming_theme->get( 'Description' ) ) ) );
      ?>
    </p>
    <a class="btn btn-primary" href="<?php echo esc_url(admin_url('/customize.php?'));
?>"><?php esc_html_e('Edit With Customizer - Click Here', 'fruits-farming'); ?></a>
  </div>

  <div class="das-wrap-inner">
    <div class="das-col das-col-7">
      <div class="fruits-farming-panel">
        <div class="fruits-farming-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('If you are facing any issue with our theme, submit a support ticket here.', 'fruits-farming'); ?></h3>
          </div>
          <a href="<?php echo esc_url( FRUITS_FARMING_SUPPORT_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Theme Support.', 'fruits-farming'); ?></a>
        </div>
      </div>
      <div class="fruits-farming-panel">
        <div class="fruits-farming-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Please write a review if you appreciate the theme.', 'fruits-farming'); ?></h3>
          </div>
          <a href="<?php echo esc_url( FRUITS_FARMING_REVIEW_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Rank this topic.', 'fruits-farming'); ?></a>
        </div>
      </div>
       <div class="fruits-farming-panel">
        <div class="fruits-farming-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our lite theme documentation to set up our lite theme as seen in the screenshot.', 'fruits-farming'); ?></h3>
          </div>
          <a href="<?php echo esc_url( FRUITS_FARMING_LITE_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Documentation.', 'fruits-farming'); ?></a>
        </div>
      </div>
    </div>
    <div class="das-col das-col-3">
      <div class="upgrade-div">
        <h4>
          <strong>
            <?php esc_html_e('Premium Features Include:', 'fruits-farming'); ?>
          </strong>
        </h4>
        <ul>
          <li>
            <?php esc_html_e('One Click Demo Content Importer', 'fruits-farming'); ?>
          </li>
          <li>
            <?php esc_html_e('Woocommerce Plugin Compatibility', 'fruits-farming'); ?>
          </li>
          <li>
            <?php esc_html_e('Multiple Section for the templates', 'fruits-farming'); ?>            
          </li>
          <li>
            <?php esc_html_e('For a better user experience, make the top of your menu sticky.', 'fruits-farming'); ?>  
          </li>
        </ul>
        <div class="text-center">
          <a href="<?php echo esc_url( FRUITS_FARMING_BUY_NOW ); ?>" target="_blank"
            class="btn btn-success"><?php esc_html_e('Upgrade Pro $40', 'fruits-farming'); ?></a>
        </div>
      </div>
      <div class="fruits-farming-panel">
        <div class="fruits-farming-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Kindly view the premium themes live demo.', 'fruits-farming'); ?></h3>
          </div>
          <a class="btn btn-primary demo" href="<?php echo esc_url( FRUITS_FARMING_DEMO_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Live Demo.', 'fruits-farming'); ?></a>
        </div>
        <div class="fruits-farming-panel-content pro-doc">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our pro theme documentation to set up our premium theme as seen in the screenshot.', 'fruits-farming'); ?></h3>
          </div>
          <a href="<?php echo esc_url( FRUITS_FARMING_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-primary demo"><?php esc_html_e('Pro Documentation.', 'fruits-farming'); ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}