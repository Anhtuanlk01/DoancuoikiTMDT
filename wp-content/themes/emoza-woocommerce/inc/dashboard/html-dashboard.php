<?php
/**
 * Dashboard HTML
 *
 * @package Emoza
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$user_id             = get_current_user_id();
$current_user        = wp_get_current_user(); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
$notification_read   = $this->latest_notification_is_read();
$notifications_count = 1;

?>
<div class="emoza-dashboard emoza-dashboard-wrap">
    <div class="emoza-dashboard-top-bar">
        <a href="<?php echo esc_url($this->settings['upgrade_pro']); ?>" class="emoza-dashboard-top-bar-logo" target="_blank" style=" display: flex; color: #333; font-weight: bold; font-size: 24px; ">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none">
                <circle cx="10" cy="10" r="9.75" fill="#FFFEFE" stroke="#3858e9" stroke-width=".5" style=""></circle>
                <path d="M8.767 13.394a5.471 5.471 0 0 0 4.247.476 5.571 5.571 0 0 0 1.938-1.03 5.722 5.722 0 0 0 1.408-1.709 5.835 5.835 0 0 0 .484-4.35 5.735 5.735 0 0 0-.998-1.979 5.584 5.584 0 0 0-1.663-1.434l-2.708 5.013-2.708 5.013ZM11.17 6.295a5.472 5.472 0 0 0-4.247-.477 5.57 5.57 0 0 0-1.937 1.03 5.723 5.723 0 0 0-1.409 1.71 5.836 5.836 0 0 0-.483 4.35c.202.72.54 1.393.997 1.978a5.583 5.583 0 0 0 1.663 1.434l2.708-5.013 2.708-5.012Z" fill="#000" style="
                fill: #3858e9;"></path>
            </svg>
            <span style=" margin-left: 4px; margin-top: -2px; ">emoza</span>
        </a>
        <div class="emoza-dashboard-top-bar-infos">
            <div class="emoza-dashboard-top-bar-info-item">
                <div class="emoza-dashboard-theme-version">
                    <strong><?php echo esc_html( ( ! $this->settings[ 'has_pro' ] ) ? EMOZA_VERSION : EMOZA_PRO_VERSION ); ?></strong>
                    <span class="emoza-dashboard-badge<?php echo ( $this->settings[ 'has_pro' ] ) ? ' emoza-dashboard-badge-pro' : ''; ?>">
                        <?php echo esc_html( ( ! $this->settings[ 'has_pro' ] ) ? __( 'FREE', 'emoza-woocommerce' ) : __( 'PRO', 'emoza-woocommerce' ) ); ?>
                    </span>
                </div>
            </div>
            <div class="emoza-dashboard-top-bar-info-item">
                <a href="<?php echo esc_url( $this->settings['website_link'] ); ?>" class="emoza-dashboard-theme-website" target="_blank">
                    <?php echo esc_html__( 'Website', 'emoza-woocommerce' ); ?>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6 2.40002H7.20002L8.00002 4.00002H11.264L6.39202 8.88002L7.52002 10.008L12 5.53602V8.00002L13.6 8.80002V2.40002ZM9.60002 9.60002V12H4.00002V6.40002H7.20002L8.80002 4.80002H2.40002V13.6H11.2V8.00002L9.60002 9.60002Z" fill="#2271b1"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <?php require get_template_directory() . '/inc/dashboard/html-notifications-sidebar.php'; ?>
    <?php require get_template_directory() . '/inc/dashboard/html-dashboard-body.php'; ?>
</div>