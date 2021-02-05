<?php

/*
* Template Name: Tools
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
            <h2>
              <?php the_field('title'); ?>
            </h2>

            <h4 class="balance-text" data-aos="fade-left" data-aos-delay="100">
              <?php the_field('sub_title'); ?>
            </h4>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-md-8 offset-lg-1" data-aos="fade-up" data-aos-delay="200">
            <p class="grey">
              <?php the_field('description'); ?>
            </p>
          </div>
        </div>
      </div>
    </section>


    <!-- FIELD REPORTS -->

    <section class="module">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 offset-lg-1" data-aos="fade-left">
            <h3 data-aos="fade-left" data-aos-delay="100">
              <?php the_field('reports_title'); ?>
            </h3>
          </div>
        </div>
        <div class="row pb-3">
          <div class="col-lg-4 col-md-8 offset-lg-1" data-aos="fade-up" data-aos-delay="200">
            <p class="grey">
              <?php the_field('reports_description'); ?>
            </p>
          </div>
        </div>
      </div>

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
                    $thumb = $image['sizes'][$size];
                    if ($image) :
                    ?>

                      <a href="<?php echo $report["url"]; ?>" target="_blank">
                        <img class="hover" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>">
                      </a>

                    <?php endif; ?>
                    <a href="<?php echo $report["url"]; ?>">
                      <h5 class="balance-text">
                        <?php echo $report['title']; ?>
                      </h5>
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
            <div class="row pt-5">
              <div class="col">
                <a class="button" href="<?php echo get_the_permalink("809"); ?>">
                  See all Field Reports
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

    <!-- FIGHT FINDER -->
    <section class="fight module">
      <div class="description_sect">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 offset-lg-1" data-aos="fade-left">
              <h3>
                <?php the_field('pyf_title'); ?>
              </h3>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 col-md-8 offset-lg-1" data-aos="fade-up" data-aos-delay="100">
              <p class="grey">
                <?php the_field('pyf_description'); ?>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="fight_sect" data-aos="fade-left" data-aos-delay="50">
        <div class="container">
          <div class="row">
            <div class="col-lg-10  offset-lg-1">

              <?php
              $args = array(
                'post_type' => 'topic',
                'posts_per_page' => -1
              );

              $topics = new WP_Query($args);

              $main_titles = array();

              if ($topics->have_posts()) :
                while ($topics->have_posts()) : $topics->the_post();
                  // print_r($topic);
                  // echo get_the_ID();
                  $main_title = get_field_object('main_list', get_the_ID());
                  $value = $main_title['value'];
                  $choices = $main_title['choices'];
                  $label = $main_title['choices'][$value];

                  $topic_title = get_field_object(strtolower($value) . '_list', get_the_ID());
                  $topic_choices = $topic_title['choices'];

                  $main_titles[$value] = array(
                    'label' => $label,
                    'choices' => $topic_choices
                  );

                endwhile;

                $first_item = reset($main_titles);

                $main_title_keys = array_keys($main_titles);
                $first_item_key = reset($main_title_keys);


                $first_choice = reset($first_item["choices"]);

                $first_choice_keys = array_keys($first_item["choices"]);
                $first_choice_key = reset($first_choice_keys);


              endif;

              wp_reset_postdata();

              ?>
              <h1 class="pick-your-fight-holder" data-main-title="<?php echo $first_item_key; ?>" data-sub-title="<?php echo $first_choice_key; ?>">
                If you care about
                <a class="fight__link main-title" data-list="main-title" href="#"><span><?php echo $first_item["label"]; ?></span></a>
                then consider how
                <a class="fight__link main-sub-title" data-list-index="0" data-list="main-sub-title" href="#"><span><?php echo $first_choice; ?></span></a>
                needs to improve by leaning into
                <a class="fight__link js-post-link" href="#"><span>&nbsp;</span></a>
                <span>→</span>
              </h1>
            </div>
          </div>
        </div>


      </div>
      <div class="fight-picker-overlay">
        <ul class="main-title">
          <?php
          $index = 0;
          foreach ($main_titles as $key => $title) :
            // print_r($title);
          ?>
            <li data-index="<?php echo $index; ?>" data-value="<?php echo $key; ?>"><?php echo $title["label"]; ?></li>
          <?php
            $index++;
          endforeach;
          ?>
        </ul>


        <?php
        $index = 0;
        foreach ($main_titles as $key => $title) :

        ?>
          <ul class="main-sub-title" data-parent="<?php echo $key; ?>" data-sub-index="<?php echo $index; ?>">
            <?php
            foreach ($title['choices'] as $key => $choice) :
            ?>
              <li data-value="<?php echo $key; ?>"><?php echo $choice; ?></li>

            <?php
            endforeach;
            ?>
          </ul>
        <?php
          $index++;
        endforeach;
        ?>

        <ul class="post-list">
          <!-- AJAX CONTENT -->
        </ul>

      </div>
      <div class="pick-your-fight-post-detail container">
        <div class="bg-holder"></div>
        <div class="row">
          <div class="col-lg-6 offset-lg-1">
            <div class="post-ajax-holder">

              <p>
                Inclusivity is about ensuring everyone is treated as equals with empathy and respect.
              </p>
              <p>
                You might fight for discriminated groups such as people with disabilities or mental health issues where accessibility, representation, and understanding are still battles to work on.
                The rise of Islamophobia and treatment of minority faiths also shows that religious understanding is a growing need. The way forward requires us to address assimilation vs amalgamation of cultural groups, immigration and racial prejudices.
              </p>
              <p>
                Despite great strides within LGBT+ rights, attitudes towards sexuality are not universally as progressive, whilst attitudes towards transgender and intersex people still lag behind.
                Leaning into inclusivity might also mean addressing specific behaviours. Most overtly, minority groups suffer bullying and harassment because they are often misunderstood and frequently don’t receive necessary support. But indirect discrimination also requires its own distinct revolutionaries.
              </p>
              <p>
                So get in touch and find out how we can create change against any one of these issues. You pick your battle and we’ll help you fight it.
              </p>
              <p>
                Let's start a revolution today
              </p>

            </div>
            <div class="let-start-content">
              <p>
                <a href="#" class="button">Let's start a revolution today</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="related_content mt-3">
      <div class="container px-lg-0">
        <div class="row offset-lg-1">
          <div class="col-lg-10">
            <h4 class="related_content--title">Related Content</h4>
          </div>
        </div>
        <div class="offset-lg-1 col-lg-10">
          <div class="row related-ajax-posts">
            <!-- AJAX CONTENT -->
          </div>
        </div>

      </div>
    </section>



    <!-- DIVIDER IMAGE -->

    <?php
    $image = get_field('divider_image_tools');
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




    <!-- WORKBOOKS -->


    <section class="module">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 offset-lg-1" data-aos="fade-left">
            <h3 data-aos="fade-left" data-aos-delay="100">
              <?php the_field('workbooks_title'); ?>
            </h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-8 offset-lg-1" data-aos="fade-up" data-aos-delay="200">
            <p class="grey">
              <?php the_field('workbooks_description'); ?>
            </p>
          </div>
        </div>
      </div>

      <div class="container pt-5">
        <div class="row">
          <div class="offset-lg-1 col-lg-10">
            <div class="row">


              <?php $workbooks = get_field('workbooks');
              if ($workbooks) :

                foreach ($workbooks as $key => $workbook) :

              ?>
                  <div class="col-lg-6 col-sm-6 pb-3">
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
            <div class="row pt-4">
              <div class="col">
                <a class="button" href="<?php echo get_the_permalink("816"); ?>">
                  See all Toolkits
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>

    <!-- WEBINARS -->


    <section class="module">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 offset-lg-1" data-aos="fade-left">
            <h3 data-aos="fade-left" data-aos-delay="100">
              <?php the_field('webinar_title'); ?>
            </h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-8 offset-lg-1" data-aos="fade-up" data-aos-delay="200">
            <p class="grey">
              <?php the_field('webinar_description'); ?>
            </p>
          </div>
        </div>
      </div>

      <div class="container pt-5">
        <div class="row">
          <div class="offset-lg-1 col-lg-10">
            <div class="row">


              <?php $webinar = get_field('webinars');
              if ($webinar) :

                foreach ($webinar as $key => $webinar) :

              ?>
                  <div class="col-lg-6 col-sm-6 pb-3">

                    <div class='embed-container'>
                      <?php echo $webinar['vimeo']; ?>
                    </div>


                    <a href="<?php echo $webinar["url"]; ?>" target="_blank">
                      <h6 class="balance-text">
                        <?php echo $webinar['title']; ?>
                      </h6>
                    </a>

                    <p class="grey">
                      <?php echo $webinar['description']; ?><br><br>
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

    <!-- Open Revolt -->

    <section class="module" data-aos="fade-up">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-1">
            <h3><?php the_field('open_title_copy'); ?></h3>
          </div>
        </div>
        <div class="row align-items-center  justify-content-between">
          <div class="col-lg-5 offset-lg-1 pb-5">
            <p class="grey">
              <?php the_field('open_description_copy'); ?>
            </p>
          </div>
        </div>
        <div class="row">
          <?php
          $download_image = get_field('open_download_copy');
          if ($download_image) :
          ?>
            <div class="col-lg-10 offset-lg-1" data-aos="fade-up" data-aos-delay="100">
              <a href="<?php the_field('open_download_url_copy'); ?>" class="download_btn">
                <img src="<?php echo $download_image["url"]; ?>" alt="<?php echo $download_image["alt"]; ?>">
              </a>
            </div>
        </div>
      <?php endif; ?>
      </div>
      </div>
    </section>

    <!-- OPEN REVOLT -->

    <!-- <section class="disclosure pb-5" data-aos="fade-up">
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-1">
            <h4>
              <?php the_field('hcyi_title'); ?>
            </h4>
          </div>

          <div class="col-md-6 offset-md-1 py-4">
            <p>
              <?php the_field('hcyi_description'); ?>
            </p>
          </div>
        </div>
        <div class="row">
          <?php
          $download_image = get_field('hcyi_image');
          if ($download_image) :
          ?>
            <div class="col-md-10 offset-md-1 py-5" data-aos="fade-up" data-aos-delay="100">
              <a href="<?php the_field('open_download_url_copy'); ?>" class="download_btn">
                <img src="<?php echo $download_image["url"]; ?>" alt="<?php echo $download_image["alt"]; ?>">
              </a>
            </div>
        </div>
      <?php endif; ?>
      </div>
    </section> -->


<?php
  endwhile;
endif;
?>
<?php
get_footer();
