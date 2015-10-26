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


    <?php the_excerpt();?>

    <a href="<?php echo get_post_type_archive_link( 'locations' ); ?>">All Reported Locations</a>

    </div><!-- .entry-content -->


</article><!-- #post-## -->



<aside id="quickSearch">

<h4><?php _e( 'View Locations in Your Area' ); ?></h4>
	<?php wp_dropdown_categories( 'show_option_none=Select Local Authority&taxonomy=local_authority&hide_empty=0' ); ?>
	<script type="text/javascript">
		<!--
		var dropdown = document.getElementById("cat");
		function onCatChange() {
			if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
				location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?local_authority="+dropdown.options[dropdown.selectedIndex].text;
			}
		}
		dropdown.onchange = onCatChange;
		-->
	</script>



</aside>

<aside id="left">
<?php the_content();?>
</aside>

<aside id="right">
Dementia by region in Scotland
<div id="chart_div">
</div>
</aside>
