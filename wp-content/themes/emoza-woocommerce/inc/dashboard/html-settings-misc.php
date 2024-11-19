<?php

/**
 * Settings - Miscellaneous
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
                    <h2 class="bt-m-0 bt-mb-10px"><?php echo esc_html__( 'Add hover delay to all navigation dropdowns', 'emoza-woocommerce' ); ?></h2>
                    <p class="bt-text-color-grey"><?php esc_html_e('Enable this option to add a slightly hover delay to the navigation dropdowns.', 'emoza-woocommerce'); ?></p>
                </div>
                <div class="emoza-dashboard-module-card-header-actions bt-pt-0">
                    <div class="emoza-dashboard-box-link">
                        <?php if ( get_option( 'emoza_dropdowns_hover_delay', 'yes' ) === 'yes' ) : ?>
                            <a href="#" class="emoza-dashboard-link emoza-dashboard-link-danger emoza-dashboard-option-switcher" data-option-id="emoza_dropdowns_hover_delay" data-option-activate="false">
                                <?php echo esc_html__( 'Deactivate', 'emoza-woocommerce' ); ?>
                            </a>
                        <?php else : ?>
                            <a href="#" class="emoza-dashboard-link emoza-dashboard-link-success emoza-dashboard-option-switcher" data-option-id="emoza_dropdowns_hover_delay" data-option-activate="true">
                                <?php echo esc_html__( 'Activate', 'emoza-woocommerce' ); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>