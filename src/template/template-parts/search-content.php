<?php
/**
 * Template part for displaying posts in the explore:
 * - Each block detail in the grid on the homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ihr-2018
 */
?>

<?php
  $type = 'type-' . get_post_meta($post->ID, 'type', true);
  $image = get_post_meta($post->ID, 'image', true);


  $columns = 'medium-' . 6 . ' large-' . 4;
?>

<div class="column small-12 <?php echo $columns ?> l-card">
  <a href="<?php echo get_permalink() ?>" class="c-single-post <?php echo $type ?>" id="post-<?php the_ID(); ?>">

    <span class="color-border" <?php post_class(); ?> style="background-color:<?php the_field('color', 'category_' . get_the_category()[0]->term_id)?>;"></span>

    <!-- <div class="visited" style="border-bottom-color:<?php the_field('color', 'category_' . get_the_category()[0]->term_id)?>;"></div> -->

    <div class="single-post-body <?php if($image){echo '-image';}; ?>">
    	<header class="single-post-header">
        <p class="text -link -secondary"><?php echo get_the_category()[0]->cat_name?> // <?php echo the_field('type')?></p>
    	</header><!-- .entry-header -->

      <div class="single-post-title">
        <p class="text -box2 "><?php echo the_title(); ?></p>
      </div>
      <!--
      <div class="c-comments-band">
        <span class="comments">
          <svg class="c-icon -small"><use xlink:href="#icon-comment_icon"></use></svg>
          <span class="text">381</span>
        </span>
        <span class="reactions">
          <svg class="c-icon -small"><use xlink:href="#icon-comment_icon"></use></svg>
          <span class="text"><?php 
          //$reactions = reaction_count(get_the_ID());
          //echo $reactions['total_reactions'];
          ?></span>
        </span>
      </div>
      -->
    </div>
    <?php
      if ($image) { ?>
        <div class='single-post-image' style='background-image:url(<?php the_field('image')?>)'></div>
      <?php }
    ?>
  </a><!-- #post-<?php the_ID(); ?> -->
</div>