<?php

/*
* Template Name: About
*/

get_header(); ?>

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>

    <section class="overview_description">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-8 offset-lg-1" data-aos="fade-left">
            <h2>
              <?php the_field('wwd_page_title'); ?>
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-md-8 offset-lg-1" data-aos="fade-left" data-aos-delay="100">
            <p class="grey">
              <?php the_field('description'); ?>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- THREE PILLARS -->

    <?php
    $services = get_field('services');
    if ($services) :
    ?>
      <section class="module">
        <div class="container" data-aos="fade-up" data-aos-delay="<?php echo $key * 150; ?>">
          <div class="row offset-lg-1">
            <?php foreach ($services as $key =>  $service) : ?>
              <div class="col-lg-3 col-md-4 col-12 pr-5 pl-lg-0">

                <h4 class="pt-5">0<?php echo ($key + 1); ?>. <?php echo $service['title']; ?></h4>
                <p class="grey">
                  <?php echo $service['description']; ?>
                </p>
              </div>
            <?php endforeach; ?>

          </div>
        </div>


        </div>
      </section>
    <?php endif; ?>


    <!-- TEAM IMAGE -->

    <?php
    $image = get_field('team_photo');
    if ($image) :
    ?>
      <section class="module">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
              <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
            </div>
          </div>
        </div>
      </section>

    <?php endif; ?>



    <!-- TEAM GRID SECTION -->

    <section class="module">
      <div class="container">
        <div class="row">
          <div class="col-md-9 offset-lg-1">
            <h3>
              <?php the_field('team_member_title'); ?>
            </h3>
          </div>
          <div class="col-lg-6 col-md-8 offset-lg-1 pb-3" data-aos="fade-up" data-aos-delay="100">
            <p class="grey balance-text">
              <?php the_field('team-description'); ?>
            </p>
          </div>
        </div>
        <div class="col-lg-10 offset-lg-1 px-0">
          <div class="row team_grid justify-content-start">

            <?php
            $args = array(
              'post_type' => 'team-members',
              'posts_per_page' => -1,
              'order' => 'ASC'
            );
            $team_members = new WP_Query($args);
            if ($team_members->have_posts()) :
              while ($team_members->have_posts()) : $team_members->the_post();
                $image = get_field('image');
                $alt = $image['alt'];
                $size = 'medium';
                $thumb = $image['sizes'][$size];
            ?>

                <div class="col-lg-3 col-md-4 col-4 px-2">
                  <span class="team_member">
                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>">
                    <div class="member-bg-holder" style="background-color: <?php the_field('color'); ?>"></div>
                    <div class="info white">
                      <h4 class="pb-1"><?php the_title(); ?></h4>
                      <p><?php the_field('title'); ?></p>
                    </div>
                    <div class="categories">
                      <p><?php the_field('fact_fight_insight'); ?></p>
                    </div>
                  </span>
                </div>

            <?php
              endwhile;
              wp_reset_postdata();
            endif;
            ?>
            <?php
            $join_team = get_field('join_team');
            if ($join_team) :
            ?>
              <div class="col-lg-3 col-md-4 col-4 px-2">
                <a href="<?php echo $join_team["link"]; ?>" class="team_member">
                  <img src="<?php echo $join_team["image"]["url"]; ?>" alt="<?php echo $join_team["image"]["alt"]; ?>">
                  <div class="member-bg-holder" style="background-color: blue"></div>
                  <div class="info white">
                    <h6><?php echo $join_team["name"]; ?></h6>
                    <p><?php echo $join_team["job_title"]; ?></p>
                  </div>
                  <div class="categories">
                    <p><?php echo $join_team["fact_fight_insight"]; ?></p>
                  </div>
                </a>
              </div>
            <?php endif; ?>
          </div>
        </div>

      </div>
      </div>
    </section>



<!-- B CORP -->
    <section class="module">
      <div class="container">
        <div class="row">
          <div class="col offset-md-1">
            <h3>B Corp Certified</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 offset-md-1" data-aos="fade-up" data-aos-delay="100">
            <p class="grey">
              <?php the_field('b_corporation_description'); ?>
            </p>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-1 col-md-2 col-3 offset-md-1 py-5" data-aos="fade-up">
            <a href="https://bcorporation.net/about-b-corps">
            <?php
            $image = get_field('b_corporation_logo');
            if ($image) :
            ?>
              <div class="img_block">
                <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
              </div>
            </a>
            <?php endif; ?>
          </div>
        </div>


      </div>

      </div>
      </div>
    </section>


    <!-- DIVIDER IMAGE -->

    <!-- <?php
    $image = get_field('team_photo');
    if ($image) :
    ?>
      <section class="module">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
              <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
            </div>
          </div>
        </div>
      </section>

    <?php endif; ?> -->




<!-- IMPACT REPORT -->
    <section class="module" data-aos="fade-up">
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-1">
            <h3><?php the_field('disclosure_title'); ?></h3>
          </div>
        </div>
        <div class="row align-items-center  justify-content-between">
          <div class="col-md-6 offset-md-1">
            <p class="grey">
              <?php the_field('disclosure_description'); ?>
            </p>
          </div>
        </div>
        <div class="row">
          <?php
          $download_image = get_field('disclosure_download');
          if ($download_image) :
          ?>
            <div class="col-md-10 text-center offset-md-1 py-5" data-aos="fade-up" data-aos-delay="100">
              <a href="<?php the_field('disclosure_download_url'); ?>" class="hover js-mouse-title" data-mouse-title="Download">
                <img src="<?php echo $download_image["url"]; ?>" alt="<?php echo $download_image["alt"]; ?>">
              </a>
            </div>
        </div>
      <?php endif; ?>
      </div>
      </div>
    </section>


    <?php get_template_part('template-parts/address', 'bar'); ?>
<?php
  endwhile;
endif;
?>
<?php
get_footer();
