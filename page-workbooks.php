<?php

/*
* Template Name: Workbooks
*/

get_header(); ?>

<!-- TITLE -->

<section class="overview_description description_sect">
      <div class="container pb-5">
        <div class="row">
          <div class="col-lg-6 offset-lg-1" data-aos="fade-left">
            <h1>
              <?php the_field('title'); ?>
            </h1>

            <h4 class="balance-text" data-aos="fade-left" data-aos-delay="100">
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
<!-- Workbooks -->
<section class="pt-5">
      <div class="container">
        <div class="row">
          <div class="offset-lg-1 col-lg-10">
            <div class="row">


              <?php $workbooks = get_field('workbooks');
              if ($workbooks) :

                foreach ($workbooks as $key => $workbook) :

                  // $project_id = $project['project'];
              ?>
                  <div class="col-lg-4 col-sm-6 pb-3">
                    <?php
                    $image = $workbook['image'];
                    if ($image) :
                    ?>
                      <a href="<?php echo $workbook["url"]; ?>" target="_blank">
                        <img class="hover" src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                      </a>
                    <?php endif; ?>

                    <a href="<?php echo $workbook["url"]; ?>">
                      <h6 class="balance-text">
                        <?php echo $workbook['title']; ?>
                      </h6>
                    </a>

                    <p class="grey">
                      <?php echo $workbook['description']; ?><br><br>
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
      </div>
    </section>


<?php
get_footer();
