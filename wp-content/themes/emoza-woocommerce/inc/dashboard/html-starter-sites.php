<?php

/**
 * Tabs Nav Items
 * 
 * @package Dashboard
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

?>

<div class="emoza-dashboard-row">
    <div class="emoza-dashboard-column">
        <div class="emoza-dashboard-card emoza-dashboard-card-top-spacing emoza-dashboard-card-tabs-divider">
            <div class="emoza-dashboard-card-body">
                
                <?php if ( in_array( $this->get_plugin_status( $this->settings['starter_plugin_path'] ), array( 'inactive', 'not_installed' ) ) ) : ?>

                <div class="emoza-dashboard-row">

                    <div class="emoza-dashboard-starter-sites">

                        <div class="emoza-dashboard-starter-sites-locked">
                            <div class="emoza-dashboard-starter-sites-notice">
                                <div class="emoza-dashboard-starter-sites-notice-text"><?php esc_html_e('Coming Soon!.', 'emoza-woocommerce'); ?></div>
                            </div>
                        </div>

                        <?php foreach ($this->settings['demos'] as $demo) : // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
                        ?>
                            <div class="emoza-dashboard-box">
                                <div class="emoza-dashboard-box-image">
                                    <figure>
                                        <img src="<?php echo esc_url($demo['thumbnail']); ?>" />
                                    </figure>
                                </div>
                                <div class="emoza-dashboard-box-link">
                                    <a href="#" target="_blank" class="button button-primary"><?php esc_html_e('Import', 'emoza-woocommerce'); ?></a>
                                    <a href="#" target="_blank" class="button button-secondary"><?php esc_html_e('Preview', 'emoza-woocommerce'); ?></a>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>

                <?php else : ?>

                <div class="emoza-dashboard-row">
                    <?php
                    if (has_action('emoza_starter_sites')) {
                        
                        /**
                         * Hook 'emoza_starter_sites'
                         *
                         * @since 1.0.0
                         */
                        do_action('emoza_starter_sites'); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
                    } else {
                        wp_safe_redirect(add_query_arg(array( 'page' => 'starter-sites' ), admin_url('admin.php')));
                        exit;
                    }
                    ?>
                </div>

                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
