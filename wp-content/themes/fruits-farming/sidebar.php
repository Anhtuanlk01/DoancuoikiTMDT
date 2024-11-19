<?php
/**
 * The sidebar containing the main widget area
 * @package Fruits Farming
 */

$fruits_farming_default = fruits_farming_get_default_theme_options();

$post_id = get_the_ID(); // Get the post ID

$fruits_farming_post_sidebar = esc_html(get_post_meta($post_id, 'fruits_farming_post_sidebar_option', true));
$fruits_farming_sidebar_column_class = 'column-order-2';

if (empty($fruits_farming_post_sidebar)) {
    $fruits_farming_global_sidebar_layout = esc_html(get_theme_mod('fruits_farming_global_sidebar_layout', $fruits_farming_default['fruits_farming_global_sidebar_layout']));
} else {
    $fruits_farming_global_sidebar_layout = $fruits_farming_post_sidebar;
}
if (!is_active_sidebar('sidebar-1') || $fruits_farming_global_sidebar_layout == 'no-sidebar') {
    return;
}

if ($fruits_farming_global_sidebar_layout == 'left-sidebar') {
    $fruits_farming_sidebar_column_class = 'column-order-1';
}
?>

<aside id="secondary" class="widget-area <?php echo esc_attr($fruits_farming_sidebar_column_class); ?>">
    <div class="widget-area-wrapper">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </div>
</aside>
