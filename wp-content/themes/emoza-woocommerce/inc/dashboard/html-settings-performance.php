<?php

/**
 * Settings - Performance
 * 
 * @package Dashboard
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

?>

<div class="emoza-dashboard-card">
    <div class="emoza-dashboard-card-body">
        <div class="emoza-dashboard-module-card">
            <div class="emoza-dashboard-module-card-header bt-align-items-center">
                <div class="emoza-dashboard-module-card-header-info">
                    <h2 class="bt-m-0 bt-mb-10px"><?php echo esc_html__( 'Load Google Fonts Locally', 'emoza-woocommerce' ); ?></h2>
                    <p class="bt-text-color-grey"><?php esc_html_e('Activate this option to load the Google fonts locally.', 'emoza-woocommerce'); ?></p>
                </div>
                <div class="emoza-dashboard-module-card-header-actions bt-pt-0">
                    <div class="emoza-dashboard-box-link">
                        <?php if (Emoza_Modules::is_module_active('local-google-fonts')) : ?>
                            <a href="#" class="emoza-dashboard-link emoza-dashboard-link-danger emoza-dashboard-module-activation" data-module-id="local-google-fonts" data-module-activate="false">
                                <?php echo esc_html__( 'Deactivate', 'emoza-woocommerce' ); ?>
                            </a>
                        <?php else : ?>
                            <a href="#" class="emoza-dashboard-link emoza-dashboard-link-success emoza-dashboard-module-activation" data-module-id="local-google-fonts" data-module-activate="true">
                                <?php echo esc_html__( 'Activate', 'emoza-woocommerce' ); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>