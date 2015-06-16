<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _s
 */

?>




<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php the_post_thumbnail('full');?>

	<div class="home-content">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>


    <?php the_content();?>

    <a href="<?php echo get_post_type_archive_link( 'locations' ); ?>">locations Archive</a>

    </div><!-- .entry-content -->




</article><!-- #post-## -->

