<?php
/**
 * Template part for displaying location meta.
 *
 * @package _s
 */

?>



	<div class="entry-content">
        <?php echo the_field('description');
        ?>


<p><?php echo get_the_term_list( $post->ID, 'local_authority', 'Local Authority: ', ', ' ); ?></p>
<p><?php echo get_the_term_list( $post->ID, 'problem_type', 'Problem: ', ', ' ); ?></p>


<?php
$photograph = get_field('photograph');
        if ($photograph) {?>
        <img src="<?php echo $photograph; ?>">
        <?php }

// get the custom post type's taxonomy terms

$custom_taxterms = wp_get_post_terms( $post->ID, 'local_authority', array('fields' => 'ids') );
// arguments
$args = array(
'post_type' => 'locations',
'post_status' => 'publish',
'posts_per_page' => 3, // you may edit this number
'orderby' => 'rand',
'tax_query' => array(
    array(
        'taxonomy' => 'local_authority',
        'field' => 'id',
        'terms' => $custom_taxterms
    )
),
'post__not_in' => array ($post->ID),
);
$related_items = new WP_Query( $args );
// loop over query
if ($related_items->have_posts()) :
echo '<h2>Recently Reported Problems In This Area</h2>';
while ( $related_items->have_posts() ) : $related_items->the_post();
?>
        <div id="related"><h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4><?php echo the_field('description') . '</div>'; ?>
<?php
endwhile;
endif;
// Reset Post Data
wp_reset_postdata();
?>


<!-- end custom related loop, isa -->


	</div><!-- .entry-content -->
