<?php
/**
 * The template for displaying the footer
 * @package Fruits Farming
 * @since 1.0.0
 */

/**
 * Toogle Contents
 * @hooked fruits_farming_content_offcanvas - 30
*/

do_action('fruits_farming_before_footer_content_action'); ?>

</div>

<footer id="site-footer" role="contentinfo">

    <?php
    /**
     * Footer Content
     * @hooked fruits_farming_footer_content_widget - 10
     * @hooked fruits_farming_footer_content_info - 20
    */

    do_action('fruits_farming_footer_content_action'); ?>

</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
