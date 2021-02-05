<?php

/*
* Template Name: Jobs
*/

get_header(); ?>

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>
    <div class="background-color">
    </div>

      <section class="overview_description">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 offset-lg-1" data-aos="fade-left">
              <h3>
                <?php the_field('jobs_page_title'); ?>
              </h3>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 offset-lg-1" data-aos="fade-in" data-aos-delay="100">
              <p class="color">
                <?php the_field('description'); ?>
              </p>
            </div>
          </div>
      </section>

      <section>
        <div class="container">
          <div class="row">
            <div class="col-lg-5 offset-lg-1" data-aos="fade-in" data-aos-delay="100">
              <h5>
                Our Benefits
              </h5>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 offset-lg-1" data-aos="fade-in" data-aos-delay="100">
              <p class="benefits-list color">
                <?php the_field('benefits_list'); ?>
              </p>
            </div>
          </div>
        </div>
      </section>


      <section class="module">
        <div class="container px-lg-0">
          <div class="row offset-lg-1">

            <?php $jobs_list = get_field('jobs_list');
            if ($jobs_list) :

              foreach ($jobs_list as $key => $jobs) :

                // $project_id = $project['project'];
            ?>
                <div class="col-lg-5 col-md-6">
                  <div class="jobs-post">
                    <h4>
                      <?php echo $jobs['title']; ?>
                    </h4>
                    <p>
                      <?php echo $jobs['summary']; ?>
                    </p>
                    <p class="color">
                      <?php echo $jobs['description']; ?>
                    </p>
                    <a href="mailto:talent@revoltlondon.com?subject=Revolt Job Application" class="button" target="_blank">Meet us</a>
                  </div>
                </div>

            <?php
              endforeach;
            endif;
            ?>
          </div>


        </div>
      </section>

      <section>
        <div class="container">
          <div class="row">
            <div class="col-md-6 offset-lg-1">
              <h4>If these roles spark something for you, get in touch with <a href="mailto:talent@revoltlondon.com">talent@revoltlondon.com</a> or click 'Meet us' under the related role. We are always up for meeting you.</h4>
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
