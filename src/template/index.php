<?php
/**
 * The main template file
 * - Home page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ihr-2018
 */

get_header(); ?>

	<div id="primary" class="content-area l-main">
		<main id="main" class="site-main">
    		<?php
    		if ( have_posts() ) :

          echo "<div class='wrap'><div class='row'>";
    			if ( is_home() && ! is_front_page() ) : ?>
    				<header>
    					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
    				</header>

    			<?php
    			endif;

    			/* Start the Loop */
    			while ( have_posts() ) : the_post();

    				/*
    				 * Include the Post-Format-specific template for the content.
    				 * If you want to override this in a child theme, then include a file
    				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
    				 */
    				get_template_part( 'template-parts/content', get_post_format() );

    			endwhile;

    			the_posts_navigation();

          echo "</div></div>";

    		else :
          echo "<div class='wrap'><div class='row'>";
    			get_template_part( 'template-parts/content', 'none' );
          echo "</div></div>";
    		endif;
          echo "<div class='wrap'><div class='row'>";
          get_template_part( 'template-parts/categories');
          echo "</div></div>";
    		?>
      </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// echo do_shortcode('[effecto-bar id=\'home\']');
get_footer();
