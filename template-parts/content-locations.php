<?php
/**
 * Template part for displaying posts.
 *
 * @package _s
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'locations' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php dmap_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
        <?php echo the_field('description');
        $photograph = get_field('photograph');
        if ($photograph) {?>
        <img src="<?php echo $photograph; ?>">
        <?php }?>


<p><?php echo get_the_term_list( $post->ID, 'local_authority', 'Local Authority: ', ', ' ); ?></p>
<p><?php echo get_the_term_list( $post->ID, 'problem_type', 'Problem: ', ', ' ); ?></p>






		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'dmap' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dmap' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php dmap_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
