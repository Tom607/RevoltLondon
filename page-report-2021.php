<?php

/*
* Template Name: 2021 Report
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
              2021 Report
            </h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 offset-lg-1" data-aos="fade-in" data-aos-delay="100">
            <p class="color">
              Description about our 2021 report.
            </p>
          </div>
        </div>
    </section>



    <section class="module">
      <div class="container">
        <div class="row">
          <div class="col-10 offset-lg-1">
            <div id="report-2021-table"></div>
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
