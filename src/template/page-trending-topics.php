<?php
/*
 Template Name: Trending topics
 */

get_header(); 

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main l-main" style="padding-bottom: 0px;">

      <?php
        // Defines active tab
        $current = get_the_ID();

        // Get parent page info.
        $parent = $post->post_parent;

        // Determine wheter we are in the section's root
        if ($parent == 0) {
          $section_root = true;
        } else {
          $section_root = false;
        };

        // Get the current post info
        $current_post = get_post($parent);
        $parent_title = $current_post->post_title;
        $content = $current_post->post_content;

        // Draw section header
        ?>
          <div class="wrap">
            <div class="l-section-header">
              <div class="row">
                <div class="column small-12 medium-8">
                  <h2><?php echo $parent_title; ?></h2>
                  <p><?php echo $content; ?></p>
                </div>
              </div>
            </div>
          </div>
        <?php

        // Determine active section to ask for children
        if ($section_root) {
          $active_page = $current;
        } else {
          $active_page = $parent;
        }

        // Determine pages
        $mypages = get_pages( array( 'child_of' => $active_page, 'sort_column' => 'menu_order', 'sort_order' => 'asc' ) );

        // Draw tabs
        if(count($mypages) > 0) {
          // Declare global var with pages to be available in the template
          set_query_var( 'mypages', $mypages );
          set_query_var( 'isRoot', $section_root );
          // Get tabs template
          get_template_part( 'template-parts/tab' );
        }

      ?>
    <div id="primary" class="content-area l-main">
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
        ?>
      </div>
    </div><!-- #primary -->

    </main><!-- #main -->
</div><!-- #primary -->





<?php
get_sidebar();
get_footer();