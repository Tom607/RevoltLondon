<?php

/*
* Template Name: Reports
*/

get_header(); ?>

<!-- TITLE -->

<section class="overview_description description_sect">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-1" data-aos="fade-left">
            <h1>
              <?php the_field('title'); ?>
            </h1>

            <h4 data-aos="fade-left" data-aos-delay="100">
              <?php the_field('sub_title'); ?>
            </h4>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-8 offset-lg-1" data-aos="fade-up" data-aos-delay="200">
            <p class="grey">
              <?php the_field('description'); ?>
            </p>
          </div>
        </div>
      </div>
      </section>
<!-- FIELD REPORTS -->

<section class="pt-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 offset-lg-1">
            <div class="row">



              <?php $reports = get_field('reports');
              if ($reports) :

                foreach ($reports as $key => $report) :

                  // $project_id = $project['project'];
              ?>
                  <div class="col-lg-6 col-sm-6 py-5">

                    <?php
                    $image = $report['image'];
                    $size = 'large';
                    $thumb = $image['sizes'][ $size ];
                    if ($image) :
                    ?>

                      <a href="<?php echo $report["url"]; ?>" target="_blank">
                        <img class="hover" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>">
                      </a>

                    <?php endif; ?>
                    <a href="<?php echo $report["url"]; ?>">
                      <h6 class="balance-text">
                        <?php echo $report['title']; ?>
                      </h6>
                    </a>

                    <p class="grey">
                      <?php echo $report['description']; ?>
                    </p>
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
get_footer();
