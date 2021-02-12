<?php

/*
* Template Name: 2021 Report
*/

get_header(); ?>

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>



    <section class="overview_description description_sect">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-1" data-aos="fade-left">
            <h1>
              Causes That Count Index 2021
            </h1>

            <h4 data-aos="fade-left" data-aos-delay="100">
              Causes That Count Index 2021
            </h4>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 col-md-10 offset-lg-1" data-aos="fade-up" data-aos-delay="200">
            <p class="grey">At Revolt, we’re often asked by our clients how they can stand for something that matters to their audience. Following a landmark year, it felt like an opportune moment to pause and take stock of what people really care about. The Causes That Count 2021 study surveyed 1600 people across the US, the UK, China and Brazil to paint a uniquely global picture. We hope that this annual index will provide further insights in the years to come.</p>

          </div>
        </div>
      </div>
    </section>


    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-10 offset-lg-1">
            <div id="report-2021-table"></div>
          </div>
    </section>



<?php
  endwhile;
endif;
?>
<?php
get_footer();
