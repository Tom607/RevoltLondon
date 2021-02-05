<?php
get_header(); ?>

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
    $is_image = get_field('homepage_herobanner_is_video');
    $image = get_field('homepage_herobanner_image');
?>
    <section class="home_banner flex align-items-center justify-content-center">
      <div class="bg-video" style="background-image: url(<?php echo $image; ?>);">
        <?php if (!$is_image) : ?>
          <?php
          $video = get_field('homepage_herobanner_video');
          if ($video) :
          ?>
            <video muted="" loop="" autoplay="" playsinline="">
              <source src="<?php echo $video; ?>" type="video/mp4">
            </video>
          <?php endif; ?>
        <?php endif; ?>
      </div>
      <div class="container hero-text">
        <div class="row justify-content-center">
          <div class="col-sm-12 col-md-11 col-lg-10" data-aos="fade-up" data-aos-delay="500" data-aos-duration="2000">
            <h2>
              <?php the_field('homepage_herobanner_text'); ?>
            </h2>
          </div>
        </div>
      </div>
    </section>

    <section class="what_is module" data-aos="fade-up">
      <div class="container pb-5">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-8 col-lg-5 offset-lg-1">
            <h2>
              <?php the_field('homepage_wir_title'); ?>
            </h2>
          </div>
          <div class="col-12 col-sm-12 col-md-8 col-lg-4 offset-lg-1">
            <p>
              <?php the_field('homepage_wir_description'); ?>
            </p>
            <div>
              <a class="button" href="<?php the_field('homepage_wir_link'); ?>" class="what_is--link">
                Learn more about what we do
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- WORK CAROUSEL -->

    <div class="container pt-5">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <?php echo do_shortcode('[wd_hustle id="2" type="embedded"/]'); ?>
        </div>
      </div>
    </div>

    <!-- LATEST WORK -->

    <section class="module">
      <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="200">
          <div class="col-12 col-sm-12 col-md-11 col-lg-8 offset-lg-1">
            <h3> Latest Work </h3>
          </div>
          <div class="col-12 col-sm-12 col-md-11 col-lg-5 offset-lg-1">
            <p class="grey balance-text">
              <?php the_field('homepage_latest_work_description'); ?>
            </p>
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="400">
          <div class="offset-lg-1 col-lg-10">
            <div class="overview_grid flex justify-content-between">

              <?php $projects = get_field('projects');
              if ($projects) :

                foreach ($projects as $key => $project) :

                  $project_id = $project['project'];
              ?>
                  <div class="<?php echo $project['size']; ?>" data-aos="fade-up" data-aos-delay="<?php echo $key * 50; ?>">
                    <div class="project_cover home">
                      <a href="<?php the_permalink($project_id); ?>" class="img_block hover js-mouse-title" data-mouse-title="<?php echo get_the_title($project_id); ?>">
                        <?php
                        $image = get_field('featured_image', $project_id);
                        if ($image) :
                        ?>
                          <div class="carusel_slide--image">
                            <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                          </div>
                        <?php endif; ?>
                      </a>
                    </div>
                    <span class='project-category'><?php the_field('category', $project_id); ?></span>
                    <span class="client_name">
                      <?php echo get_the_title($project_id); ?>
                    </span>
                  </div>
              <?php
                endforeach;
              endif;
              ?>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-12 col-sm-12 col-md-11 col-lg-5 offset-lg-1">
            <a class="button" href="<?php the_field('homepage_work_link'); ?>">
              See all work
            </a>
          </div>
        </div>



      </div>
    </section>

    <!-- PICK YOUR FIGHT -->

    <section class="module">
      <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="200">
          <div class="col-12 col-sm-12 col-md-11 col-lg-8 offset-lg-1">
            <h3>
              <a class="noFocus" href="<?php the_field('homepage_pyf_link'); ?>"> <?php the_field('homepage_pyf_title'); ?> </a>
            </h3>
          </div>
          <div class="col-12 col-sm-12 col-md-11 col-lg-5 offset-lg-1">
            <p class="grey">
              <?php the_field('homepage_pyf_description'); ?>
            </p>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-lg-5 offset-lg-1 pt-5" data-aos="fade-up" data-aos-delay="400">
            <?php if (get_field('workbooks_image')) : ?>
              <a href="<?php echo get_the_permalink("816"); ?>">
                <img class="hover" src="<?php the_field('workbooks_image'); ?>" />
              </a>
            <?php endif; ?>
          </div>


          <div class="col-12 col-lg-5 pt-5" data-aos="fade-up" data-aos-delay="500">
            <?php if (get_field('toolkits_image')) : ?>
              <a href="<?php echo get_the_permalink("809"); ?>">
                <img class="hover" src="<?php the_field('toolkits_image'); ?>" />
              </a>
            <?php endif; ?>
          </div>
        </div>

        <div class="row pt-4">
          <div class="col offset-lg-1 pt-5">
            <a class="button" href="<?php the_field('homepage_pyf_link'); ?>">
              Explore all Revolt tools
            </a>
          </div>
        </div>



      </div>
    </section>

    <!-- <section class="module">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 offset-lg-1">
            <img src="<?php the_field('pyf_divider'); ?>" alt="">
          </div>
        </div>
      </div>
    </section> -->


    <!-- BLOG POSTS UPDATED -->

    <section class="module">
      <div class="container">

        <div class="row" data-aos="fade-up" data-aos-delay="200">
          <div class="col-12 col-sm-12 col-md-11 col-lg-8 offset-lg-1">
            <h3>Latest News</h3>
          </div>
          <div class="col-12 col-sm-12 col-md-11 col-lg-5 offset-lg-1">
            <p class="grey">
              <?php the_field('news_description'); ?>
            </p>
          </div>
        </div>

        <div class="row py-5">

          <div class="col-lg-10 offset-lg-1" data-aos="fade-up" data-aos-delay="400">
            <?php
            $featured_post = get_field('featured_post');
            if ($featured_post) : ?>
              <?php
              $image = get_field('blog_thumbnail', $featured_post);
              if ($image) :
              ?>
                <a href="<?php echo get_the_permalink($featured_post); ?>"><img class="pb-3 hover" src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>"></a>
          </div>

          <div class="col-lg-6 offset-lg-1" data-aos="fade-up" data-aos-delay="500">
            <h5>
              <a href="<?php echo get_the_permalink($featured_post); ?>">
                <?php echo esc_html($featured_post->post_title); ?>
              </a>
            </h5>
            <p class="project-category">
              <?php the_field('blog_excerpt', $featured_post); ?>
            </p>
          <?php endif; ?> <?php endif; ?>

          </div>
        </div>




        <div class="row">
          <div class="offset-lg-1 col-lg-10">
            <div class="row py-5">

              <?php
              $blog_post_ids = get_field('homepage_blog_posts');
              if ($blog_post_ids) :

              ?>
                <?php
                foreach ($blog_post_ids as $key => $id) :
                ?>
                  <div class="col-sm-6 col-md-4 col-lg-4 pb-3" data-aos="fade-up" data-aos-delay="<?php echo $key * 200; ?>">
                    <a href="<?php echo get_the_permalink($id); ?>">
                      <?php
                      $image = get_field('blog_thumbnail', $id);
                      $size = 'large';
                      $thumb = $image['sizes'][$size];
                      if ($image) :
                      ?>
                        <img class="pb-3 hover" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>">
                      <?php endif; ?>

                      <h6>
                        <?php echo get_the_title($id); ?>
                      </h6>

                      <p class="project-category">
                        <?php the_field('blog_excerpt', $id); ?>
                      </p>
                    </a>
                  </div>

                <?php endforeach; ?>
            </div>




            <div class="row">
              <div class="col">
                <a class="button" href="<?php echo get_the_permalink("430"); ?>">
                  See all news
                </a>
              </div>
            </div>

          <?php endif; ?>




          </div>
        </div>

    </section>

    <!-- CLIENTS -->

    <section class="module">
      <div class="container">
        <div class="row">
          <div class="col offset-lg-1">
            <h4>Our clients</h4>
          </div>
        </div>
        <div class="col-lg-10 offset-lg-1">
          <div class="row">


            <?php



            // check if the repeater field has rows of data
            if (have_rows('client_logos')) :

              // loop through the rows of data
              while (have_rows('client_logos')) : the_row();

                // display a sub field value
                $image = get_sub_field('logo');
                $size = 'medium';
                $thumb = $image['sizes'][$size];
            ?>



                <div class="col-md-3 col-6 clientgraveyard">
                  <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                </div>
            <?php
              endwhile;

            else :

            // no rows found

            endif;

            ?>
          </div>
        </div>


      </div>
    </section>




    <?php get_template_part('template-parts/address', 'bar'); ?>

<?php endwhile;


endif; ?>


<?php
get_footer();
