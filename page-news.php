<?php

/*
* Template Name: News
*/

get_header(); ?>

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>
    <section class="overview_description">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-1" data-aos="fade-left">
            <h2>
              <?php the_field('title'); ?>
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 offset-lg-1" data-aos="fade-in" data-aos-delay="100">
            <p class="grey">
              <?php the_field('description'); ?>
            </p>
          </div>
        </div>
      </div>
      </section>

      <section class="pt-5">
      <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="row">
          <?php $blog_posts = get_field('blog_posts');
          if ($blog_posts) :

            foreach ($blog_posts as $key => $post) :

              $post_id = $post['post'];
          ?>
              <div class="col-md-6 py-5" data-aos="fade-up" data-aos-delay="<?php echo $key * 50; ?>">


                  <a href="<?php the_permalink($post_id); ?>" class="hover" data-mouse-title="<?php echo get_the_title($post_id); ?>">
                    <?php
                    $image = get_field('blog_thumbnail', $post_id);
                    if ($image) :
                    ?>
                      <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                    <?php endif; ?>
                  </a>


                  <a href="<?php the_permalink($post_id); ?>">
                    <h6>
                      <?php echo get_the_title($post_id); ?>
                    </h6>
                    </a>
                  <p class="grey">
                    <?php echo get_the_excerpt($post_id); ?>
                  </p>
                  <!-- <p class="post-date"><?php $post_date = get_the_date('j F Y', $post = $post_id); echo $post_date ?></p> -->

                  </div>

          <?php
            endforeach;
          endif;
          ?>
          </div>

        </div>

          
      </div>
      </div>

    </section>
<?php
  endwhile;
endif;
?>
<?php
get_footer();
