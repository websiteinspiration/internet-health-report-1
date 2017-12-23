<?php
/**
 * Template part for displaying posts:
 * - Each block detail in the grid on the homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ihr-2018
 */
?>

<?php
  $importance = get_post_meta($post->ID, 'importance', true);
  $type = 'type-' . get_post_meta($post->ID, 'type', true);

  if ($importance == 1) : $columns = 'large-' . 12;
  elseif ($importance == 2) : $columns = 'medium-' . 6 . ' large-' . 8;
  else : $columns = 'medium-' . 6 . ' large-' . 4; endif;

?>

<div class="column small-12 <?php echo $columns ?> l-card">
  <a href="<?php echo get_permalink() ?>" class="c-single-post <?php echo $type ?>" id="post-<?php the_ID(); ?>">
    <span class="color-border" <?php post_class(); ?> style="background-color:<?php the_field('color', 'category_' . get_the_category()[0]->term_id)?>;"></span>
  	<header class="single-post-header">
      <?php echo the_field('type')?> // <?php echo get_the_category()[0]->cat_name?>
  	</header><!-- .entry-header -->

  	<div class="single-post-content">
      <div class="single-post-title">
        <p class="text -box1"><?php echo the_title(); ?></p>
      </div>

      <?php
        $image = get_post_meta($post->ID, 'image', true);
        //TODO
        if ($image) {
          echo "<div class='single-post-image'><img src=" . the_field('image') . "></div>";
        }
      ?>

  	</div><!-- .entry-content -->

  	<footer class="single-post-footer"></footer><!-- .entry-footer -->
  </a><!-- #post-<?php the_ID(); ?> -->
</div>
