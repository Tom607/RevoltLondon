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

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-lg-1">
            <!-- Begin Mailchimp Signup Form -->
            <div id="mc_embed_signup">
              <form action="https://revoltlondon.us5.list-manage.com/subscribe/post?u=04ea4594ec3a0711214c8b5d8&amp;id=31395af80d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">

                  <div class="mc-field-group">
                    <label for="mce-EMAIL">Email Address </label>
                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                  </div>
                  <div class="mc-field-group">
                    <label for="mce-FNAME">First Name </label>
                    <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                  </div>
                  <div class="mc-field-group">
                    <label for="mce-LNAME">Last Name </label>
                    <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                  </div>
                  <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                  </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                  <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_04ea4594ec3a0711214c8b5d8_31395af80d" tabindex="-1" value=""></div>
                  <div class="clear"><input type="submit" value="Download" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                </div>
              </form>
            </div>

            <!--End mc_embed_signup-->
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
