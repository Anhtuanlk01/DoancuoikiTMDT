<?php
/**
 * Template part for displaying reviews advanced content
 *
 * @package Emoza
 */ 

global $_product; ?>

<div class="emoza-adv-reviews-modal">
    <div class="emoza-adv-reviews-modal-body">
        <a href="#" class="emoza-adv-reviews-modal-close" title="<?php echo esc_attr__( 'Close popup', 'emoza-woocommerce' ); ?>">
            <i class="ws-svg-icon icon-cancel">
                <?php echo emoza_get_svg_icon( 'icon-cancel' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </i>
        </a>
        <div class="emoza-adv-reviews-modal-content">
            <h4 class="modal-title-style1"><?php echo esc_html__( 'You are reviewing', 'emoza-woocommerce' ); ?></h4>
            <div class="emoza-adv-reviews-modal-product">
                <?php echo get_the_post_thumbnail( $_product->get_id(), 'woocommerce_thumbnail' ); ?>
                <div class="modal-product-info">
                    <h5><?php echo esc_html( $_product->get_name() ); ?></h5>
                    <?php 
                    
                    /**
                     * Hook 'emoza_advanced_reviews_modal_product_info_description_words_limit'
                     * Filters the number of words in the product description in the advanced reviews modal.
                     * 
                     * @since 2.2.2
                     */
                    echo wp_kses_post( wp_trim_words( $_product->get_short_description(), apply_filters( 'emoza_advanced_reviews_modal_product_info_description_words_limit', 18 ) ) ); ?>
                </div>
            </div>
            <div class="emoza-adv-reviews-modal-rating">
                <?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $_product->get_id() ) ) : ?>
                    <div id="review_form_wrapper">
                        <div id="review_form">
                            <?php
                            $commenter    = wp_get_current_commenter();
                            $comment_form = array(
                                /* translators: %s is product title */
                                'title_reply'         => '',
                                /* translators: %s is product title */
                                'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'emoza-woocommerce' ),
                                'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
                                'title_reply_after'   => '</span>',
                                'comment_notes_after' => '',
                                'label_submit'        => esc_html__( 'Submit', 'emoza-woocommerce' ),
                                'logged_in_as'        => '',
                                'comment_field'       => '',
                            );

                            $name_email_required = (bool) get_option( 'require_name_email', 1 );
                            $fields              = array(
                                'author' => array(
                                    'label'    => __( 'Name', 'emoza-woocommerce' ),
                                    'type'     => 'text',
                                    'value'    => $commenter['comment_author'],
                                    'required' => $name_email_required,
                                ),
                                'email'  => array(
                                    'label'    => __( 'Email', 'emoza-woocommerce' ),
                                    'type'     => 'email',
                                    'value'    => $commenter['comment_author_email'],
                                    'required' => $name_email_required,
                                ),
                            );

                            $comment_form['fields'] = array();

                            foreach ( $fields as $key => $field ) {
                                $field_html  = '<p class="comment-form-' . esc_attr( $key ) . '">';
                                $field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

                                if ( $field['required'] ) {
                                    $field_html .= '&nbsp;<span class="required">*</span>';
                                }

                                $field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></p>';

                                $comment_form['fields'][ $key ] = $field_html;
                            }

                            $account_page_url = wc_get_page_permalink( 'myaccount' );
                            if ( $account_page_url ) {
                                /* translators: %s opening and closing link tags respectively */
                                $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'emoza-woocommerce' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
                            }

                            if ( wc_review_ratings_enabled() ) {
                                $comment_form['comment_field'] = '<div class="comment-form-rating"><label class="modal-title-style1" for="rating">' . esc_html__( 'Rating', 'emoza-woocommerce' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label><select name="rating" id="rating" required>
                                    <option value="">' . esc_html__( 'Rate&hellip;', 'emoza-woocommerce' ) . '</option>
                                    <option value="5">' . esc_html__( 'Perfect', 'emoza-woocommerce' ) . '</option>
                                    <option value="4">' . esc_html__( 'Good', 'emoza-woocommerce' ) . '</option>
                                    <option value="3">' . esc_html__( 'Average', 'emoza-woocommerce' ) . '</option>
                                    <option value="2">' . esc_html__( 'Not that bad', 'emoza-woocommerce' ) . '</option>
                                    <option value="1">' . esc_html__( 'Very poor', 'emoza-woocommerce' ) . '</option>
                                </select></div>';
                            }

                            $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'emoza-woocommerce' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="5" required></textarea></p>';
                            
                            // phpcs:ignore WooCommerce.Commenting.CommentHooks.MissingHookComment
                            comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ), $_product->get_id() );
                            ?>
                        </div>
                    </div>
                <?php else : ?>
                    <p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'emoza-woocommerce' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>