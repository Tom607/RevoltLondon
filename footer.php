<?php

/**
 * The template for displaying the footer
 *
 *
 */

?>


<footer class="footer">
  <hr>
  <div class="container">
    <div class="row align-items-lg-start  align-items-md-center  align-items-sm-center" data-aos="fade-up" data-aos-delay="0">
      <div class="col-lg-3 col-md-3 col-6 offset-md-1">

        <?php
        wp_nav_menu(array(
          'theme_location' => 'footer-menu',
          'container' => false,
          'menu_class' => 'footer__socials',
        ));
        ?>
      </div>
      <div class="col-lg-2 col-md-2 col-6" data-aos="fade-up" data-aos-delay="50">
        <?php $image = get_field('revolt_b_corporation', 'options');
        if ($image) : ?>
          <div class="footer__logo">
            <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
          </div>
        <?php endif; ?>
      </div>
      <div class="col-lg-5 col-md-7 offset-lg-0 offset-md-1 pt-lg-0 pt-md-5 pt-3" data-aos="fade-up" data-aos-delay="100">
        <h5 class="newsletter_title newsletter-btn">
          <a href="">Newsletter</a>
        </h5>
        <p class="pt-2 grey">
          <?php the_field('revolt_newsletter', 'options'); ?>
        </p>
        <?php $privacy_page = get_field('revolt_privacy_page', 'options');
        if ($privacy_page) : ?>
          <a href="<?php echo $privacy_page; ?>" class="privacy_policy_link">
            Privacy Policy
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>