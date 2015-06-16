<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _s
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>



	<header id="masthead" class="site-header" role="banner">
         <button id="openForm" aria-controls="primary-menu" aria-expanded="false">Report a Location</button>



                            <div id="modal" aria-hidden="true" aria-labelledby="modalTitle" aria-describedby="modalDescription" role="dialog">
                                <div id="modalDescription" class="screen-reader-text">
                                Beginning of dialog window. Escape will cancel and close the window.
                                </div>
                                <button id="cancelButton" title="Close Accessibility Tips"><span id="cancel">Shut it down</span></button>
                                <h1 id="modalTitle">Report Location</h1>

                                 <div class="frm">
       <?php acf_form(array(
                        'post_id'	=> 'new',
                        'field_groups'	=> array( 213 ),
                        'submit_value'	=> 'Report location'

                    )); ?>
        </div>


                                <button id="modalCloseButton" class="modalCloseButton" title="Close Accessibility Tips"><span id="cancel">Close</span></button>

                            </div>




		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<!-- .site-description <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2> -->
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>

			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->

        <nav class="menu-opener">
    <div class="menu-opener-inner"></div>
  </nav>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
