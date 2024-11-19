<?php
/**
 * The default template for displaying content
 * @package Fruits Farming
 * @since 1.0.0
 */

$fruits_farming_default = fruits_farming_get_default_theme_options();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 

	<?php if( has_post_thumbnail() ){
		
		if( is_single() ){ ?>

				<div class="post-thumbnail">

					<?php fruits_farming_post_thumbnail(); ?>
						
				</div>

			<?php

		}else{ ?>

			<div class="post-thumbnail">
			
				<?php fruits_farming_post_thumbnail(); ?>

			</div>

		<?php
		}

	}

	if ( is_singular() ) { ?>

		<header class="entry-header entry-header-1">

			<h1 class="entry-title entry-title-large">

	            <span><?php the_title(); ?></span>

	        </h1>

		</header>

	<?php }

	if( is_single() && 'post' === get_post_type() ){ ?>

		<div class="entry-meta">

			<?php
			fruits_farming_posted_by();
			fruits_farming_posted_on();
			fruits_farming_entry_footer( $cats = true, $tags = false, $edits = false );
			?>

		</div>

	<?php } ?>
	<div class="post-content-wrap">

		<div class="post-content">

			<div class="entry-content">

				<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Read More %s <span class="meta-nav">&rarr;</span>', 'fruits-farming' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fruits-farming' ),
					'after'  => '</div>',
				) ); ?>

			</div>

			<?php
			if ( is_singular() && 'post' === get_post_type() ){ ?>

				<div class="entry-footer">
                    <div class="entry-meta">
                        <?php fruits_farming_entry_footer( $cats = false, $tags = true, $edits = true ); ?>
                    </div>
				</div>

			<?php } ?>

		</div>

	</div>

</article>