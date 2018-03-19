<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ihr-2018
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer l-footer">
    <div class="l-footer-top">
      <div class="wrap">
        <div class="row">
          <div class="column small-12 medium-12">
          <div class="c-footer-options">
            <div class="column small-6 medium-12 large-3">
              <img src="/wp-content/themes/ihr-2018/images/logos/internethealth-white.svg" alt="Mozilla" class="logo" />
            </div>
            <div class="column small-12 medium-12 large-6">
              <form class="c-newsletter" name="newsletter_form" action="https://www.mozilla.org/en-US/newsletter/" method="post">
                <input id="fmt" name="fmt" value="H" type="hidden">
                <input id="lang" name="lang" value="<?php echo ICL_LANGUAGE_CODE; ?>" type="hidden">
                <input id="newsletters" name="newsletters" value="internet-health-report-group" type="hidden">
                <div class="email-button">
                  <input id="email" name="email" required="required" placeholder="<?php esc_html_e( 'Write your email here', 'ihr-2018' ); ?>" aria-label="Email address" type="email">
                  <button id="newsletter_submit" type="submit" class="btn"><?php esc_html_e( 'Subscribe', 'ihr-2018' ); ?></button>
                </div>
                <div class="privacy">
                  <label for="privacy">
                    <input id="privacy" name="privacy" required="" type="checkbox">
                    <?php esc_html_e( "I'm ok with mozilla handling my info as explained in this ", 'ihr-2018' ); ?><a href="https://www.mozilla.org/privacy/websites/"><?php esc_html_e( 'privacy notice', 'ihr-2018' ); ?></a>.
                  </label>
                </div>
              </form>
            </div>
            <div class="column small-6 medium-12 large-3">
              <?php languages_list_footer(); ?>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="l-footer-bottom">
      <div class="c-footer-navigation">
        <div class="wrap">
          <div class="row">
            <div class="column small-6 medium-3">
              <ul>
                <li>
                  <a href="<?php echo get_permalink( get_page_by_path( 'introduction' ) ) ?>" class="text -light -category"><?php esc_html_e( 'Introduction', 'ihr-2018' ); ?></a>
                </li>
                <li>
                  <a href="<?php echo get_permalink( get_page_by_path( 'introduction/what-is-this' ) ) ?>" class="text -light"><?php esc_html_e( 'What is this?', 'ihr-2018' ); ?></a>
                </li>
                <li>
                  <a href="<?php echo get_permalink( get_page_by_path( 'introduction/how-is-the-health-of-the-internet' ) ) ?>" class="text -light"><?php esc_html_e( 'How is the health of the Internet?', 'ihr-2018' ); ?></a>
                </li>
                <li>
                  <a href="<?php echo get_permalink( get_page_by_path( 'introduction/trending-topics' ) ) ?>" class="text -light"><?php esc_html_e( 'Trending topics', 'ihr-2018' ); ?></a>
                </li>
                <li>
                <a href="<?php
                  $locale = get_locale();
                  switch(true) {
                    case preg_match('/en.*/', $locale):
                      echo "https://d20x8vt12bnfa2.cloudfront.net/2018/Internet Health Report 2018.pdf";
                      break;
                    case preg_match('/fr.*/', $locale):
                      echo "https://d20x8vt12bnfa2.cloudfront.net/2018/Bulletin de santé dInternet 2018.pdf";
                      break;
                    case preg_match('/de.*/', $locale):
                      echo "https://d20x8vt12bnfa2.cloudfront.net/2018/Statusbericht zur Internetgesundheit 2018.pdf";
                      break;
                    case preg_match('/es.*/', $locale):
                      echo "https://d20x8vt12bnfa2.cloudfront.net/2018/Informe de Salud de Internet 2018.pdf";
                      break;
                  }
                ?>" class="text -light">Download PDF</a>
                </li>
              </ul>
            </div>
            <div class="column small-6 medium-3">
              <ul>
                <li>
                  <a href="<?php echo get_permalink( get_page_by_path( 'issues' ) ) ?>" class="text -light -category"><?php esc_html_e( 'Issues', 'ihr-2018' ); ?></a>
                </li>
                <li>
                  <a href="<?php echo get_category_link( get_cat_ID( 'openness' ) ) ?>" class="text -light"><?php esc_html_e( 'Openness', 'ihr-2018' ); ?></a>
                </li>
                <li>
                  <a href="<?php echo get_category_link( get_cat_ID( 'digital inclusion' ) ) ?>" class="text -light"><?php esc_html_e( 'Digital Inclusion', 'ihr-2018' ); ?></a>
                </li>
                <li>
                  <a href="<?php echo get_category_link( get_cat_ID( 'decentralization' ) ) ?>" class="text -light"><?php esc_html_e( 'Decentralization', 'ihr-2018' ); ?></a>
                </li>
                <li>
                  <a href="<?php echo get_category_link( get_cat_ID( 'web literacy' ) ) ?>" class="text -light"><?php esc_html_e( 'Web literacy', 'ihr-2018' ); ?></a>
                </li>
                <li>
                <a href="<?php echo get_category_link( get_cat_ID( 'privacy and security' ) ) ?>" class="text -light"><?php esc_html_e( 'Privacy and Security', 'ihr-2018' ); ?></a>
                </li>
              </ul>
            </div>
            <div class="column small-6 medium-3">
              <ul>
                <li>
                  <a href="<?php echo get_permalink( get_page_by_path( 'participate' ) ) ?>" class="text -light -category"><?php esc_html_e( 'Participate', 'ihr-2018' ); ?></a>
                </li>
                <li>
                  <a href="<?php echo get_permalink( get_page_by_path( 'participate/what-you-can-do' ) ) ?>" class="text -light"><?php esc_html_e( 'What you can do', 'ihr-2018' ); ?></a>
                </li>
                <li>
                  <a href="<?php echo get_permalink( get_page_by_path( 'participate/contact-us' ) ) ?>" class="text -light"><?php esc_html_e( 'Contact us', 'ihr-2018' ); ?></a>
                </li>
                <li>
                  <a href="<?php echo get_permalink( get_page_by_path( 'participate/recent-comments' ) ) ?>" class="text -light"><?php esc_html_e( 'Recent Comments', 'ihr-2018' ); ?></a>
                </li>
              </ul>
            </div>
            <div class="column small-6 medium-3">
              <div class="extra-links">
                <ul>
                  <li><a href="#" class="text -light -category download-pdf-link"><?php esc_html_e( 'Download PDF', 'ihr-2018' ); ?> <svg class="c-icon -small"><use xlink:href="#icon-download"></use></svg></a></li>
                  <li><a href="<?php echo get_permalink( get_page_by_path( 'search-result' ) ) ?>" class="text -light -category"><?php esc_html_e( 'Explore', 'ihr-2018' ); ?></a></li>
                  <li><a href="<?php echo get_permalink( get_page_by_path( 'search-result' ) ) ?>" class="text -light"><?php esc_html_e( 'Explore', 'ihr-2018' ); ?></a></li>
                  <li><a href="http://blog" class="text -light -category"><?php esc_html_e( 'Blog', 'ihr-2018' ); ?></a></li>
                  <li><a href="https://internethealthreport.org/2018/sitemap.xml" class="text -light -category"><?php esc_html_e( 'Sitemap', 'ihr-2018' ); ?></a></li>
                  <li><a href="https://internethealthreport.org/2017/" class="text -light -category"><?php esc_html_e( 'Previous report', 'ihr-2018' ); ?></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="column small-12 medium-6">
             <p class="legal-advice"><?php esc_html_e( "This website is licensed under a ", 'ihr-2018' ); ?><a href="https://creativecommons.org/licenses/by/4.0/"><?php esc_html_e( 'Creative Commons BY 4.0 license', 'ihr-2018' ); ?></a>,<?php esc_html_e( " excluding portions of the content attributed to third parties", 'ihr-2018' ); ?>.</p>
            </div>
            <div class="column small-12 medium-3 legal-advice">
              <ul>
                <li><a href="https://www.mozilla.org/en-US/privacy/websites/"><?php esc_html_e( 'Privacy', 'ihr-2018' ); ?></a>
                </li>
                <li><a href="https://www.mozilla.org/en-US/privacy/websites/#cookies"><?php esc_html_e( 'Cookies', 'ihr-2018' ); ?></a>
                </li>
                <li><a href="https://www.mozilla.org/en-US/about/legal/terms/mozilla/"><?php esc_html_e( 'Terms of Use', 'ihr-2018' ); ?></a>
                </li>
              </ul>
            </div>
            <div class="column small-12 medium-3">
              <p class="powered-by -light">
              <?php esc_html_e( 'Powered by', 'ihr-2018' ); ?>
                <a href="https://www.mozilla.org/">
                  <img src="/wp-content/themes/ihr-2018/images/logos/mozilla-white.svg" alt="Mozilla" />
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php if (is_single()): ?>

  <div class="fixedfooter">
    <div class="wrap">
      <ul>
        <li>
          <a href="http://www.facebook.com/share.php?u=<?php print(urlencode(get_permalink())); ?>&amp;t=<?php echo urlencode(get_the_title()); ?>" title="<?php _e('Share on Facebook', 'ihr-2018'); ?>">
            <svg class="c-icon"><use xlink:href="#icon-facebook"></use></svg>
          </a>
        </li>
        <li>
          <a href="http://twitter.com/home?status=<?php echo urlencode(get_the_title()); ?>+<?php print(urlencode(get_permalink())); ?>" title="<?php _e('Share on Twitter', 'ihr-2018'); ?>">
            <svg class="c-icon"><use xlink:href="#icon-twitter"></use></svg>
          </a>
        </li>
        <li class="text">
          <?php _e('Share this', 'ihr-2018');?>
        </li>
      </ul>
      <div>
        <ul>
          <li class="comments">
            <svg class="c-icon"><use xlink:href="#icon-comment_icon"></use></svg>
            <span class="text"><?php echo comments_count(get_the_ID()) . ' ' . translate('Comments', 'ihr-2018');?>
          </li>
          <li class="text">
            <?php
              $reactions = reaction_count(get_the_ID())['total_reactions'];
              echo ($reactions ? $reactions : '0') . ' '. translate('Reactions', 'ihr-2018');
            ?>
          </li>
        </ul>
        <!-- <a href="https://internethealthreport.org/2018/" style="background-color:<?php echo the_field('color', 'category_' . get_the_category()[0]->term_id); ?>">
          <span class="text -large">&#43;</span>
        </a> -->
      </div>
    </div>
  </div>

<?php endif; ?>



</div>
</div>

</body>
</html>
