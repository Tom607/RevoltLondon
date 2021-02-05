<?php

/**
 * The template for displaying all single posts
 *
 */

get_header(); ?>



<?php
if (have_posts()) :

  while (have_posts()) : the_post(); ?>

    <section>
      <div class="container">
        
        <div class="row">
          <div class="col-lg-7 offset-lg-1" data-aos="fade-left">
            <h2>
              <?php the_field('headline'); ?>
            </h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-2">
            <div class="logo_block">
              <?php
              $logo = get_field('logo');
              if ($logo) :
              ?>
                <img class="case-study-logo" src="<?php echo $logo["url"]; ?>" alt="<?php echo $logo["alt"]; ?>">
              <?php endif; ?>
            </div>
          </div>
        </div>

        
      </div>
    </section>

    <?php the_content(); ?>


    <!-- CONTENT ROW -->

    <?php
    if (have_rows('content')) :

      // Loop through rows.
      while (have_rows('content')) : the_row();

        // Case: Paragraph layout.
        if (get_row_layout() == 'content_row') :
          $content_1 = get_sub_field('content_row-content_1');
    ?>
          <section class="project_margin" data-aos="fade-up">
            <div class="container">
              <div class="overview_grid flex">
                <div class="w100">
                  <p>
                    <?php echo $content_1; ?>
                  </p>
                </div>
              </div>
            </div>
          </section>
        <?php

        elseif (get_row_layout() == 'content_half_row_double') :
          $content_1 = get_sub_field('content_half_row-content_1');
          $content_2 = get_sub_field('content_half_row-content_2');
        ?>
          <section class="no_margin">
            <div class="container">
              <div class="overview_grid flex">
                <div class="w50 project_margin" data-aos="fade-up">
                  <p>
                    <?php echo $content_1; ?>
                  </p>
                </div>
                <div class="w50 project_margin" data-aos="fade-up" data-aos-delay="100">
                  <p>
                    <?php echo $content_2; ?>
                  </p>
                </div>
              </div>
            </div>
          </section>

          <!-- CUSTOM HALF ROW SINGLE -->

          <?php

        elseif (get_row_layout() == 'content_half_row_single') :
          $content_1 = get_sub_field('content_half_row-content_1');
        ?>
          <section class="project_margin">
            <div class="container">
              <div class="overview_grid flex">
                <div class="w50" data-aos="fade-up">
                  <p>
                    <?php echo $content_1; ?>
                  </p>
                </div>
              </div>
            </div>
          </section>

          <!-- CUSTOM HALF ROW PULL QUOTE -->

        <?php

        elseif (get_row_layout() == 'content_half_row_quote') :
          $content_1 = get_sub_field('pull-quote');
        ?>
          <section class="project_margin">
            <div class="container">
              <div class="overview_grid flex justify-content-between">
                <div class="w50" data-aos="fade-up">
                  <h3>
                    <?php echo $content_1; ?>
                  </h3>
                </div>
              </div>
            </div>
          </section>

          <!-- CUSTOM HALF ROW PULL QUOTE RIGHT -->

        <?php

        elseif (get_row_layout() == 'content_half_row_quote_right') :
          $content_1 = get_sub_field('pull-quote');
        ?>
          <section class="project_margin">
            <div class="container">
              <div class="overview_grid flex justify-content-end">
                <div class="w50" data-aos="fade-up">
                  <h3>
                    <?php echo $content_1; ?>
                  </h3>
                </div>
              </div>
            </div>
          </section>

          <!-- CUSTOM 1/2 1/2 IMAGE CONTENT -->

        <?php

        elseif (get_row_layout() == '12_-_12_image_content') :
          $image = get_sub_field('image_half-row_image');
          $content_1 = get_sub_field('content_half-row_content');
        ?>
          <section class="no_margin">
            <div class="container">
              <div class="overview_grid flex justify-content-between">
                <div class="w50 align-self-center project_margin" data-aos="fade-up">
                  <p>
                    <?php echo $content_1; ?>
                  </p>
                </div>
                <div class="w50 project_margin">
                  <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                </div>
              </div>
            </div>
          </section>



          <!-- CUSTOM 1/2 1/2 IMAGE CONTENT RIGHT -->

        <?php

        elseif (get_row_layout() == '12_-_12_image_content_right') :
          $image = get_sub_field('image_half-row_image');
          $content_1 = get_sub_field('content_half-row_content');
        ?>
          <section class="no_margin">
            <div class="container">
              <div class="overview_grid flex justify-content-between py-3">
                <div class="w50 project_margin">
                  <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                </div>
                <div class="w50 align-self-center project_margin" data-aos="fade-up">
                  <p>
                    <?php echo $content_1; ?>
                  </p>
                </div>
              </div>
            </div>
          </section>

        <?php
        elseif (get_row_layout() == 'image_row') :
          $image = get_sub_field('image_row-image');
        ?>
          <section class="project_margin" data-aos="fade-up">
            <div class="container">
              <div class="overview_grid flex justify-content-between">
                <div class="w100">
                  <div class="project_block">
                    <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                  </div>
                </div>
              </div>
            </div>
          </section>


        <?php
        elseif (get_row_layout() == 'image_half_row') :
          $image = get_sub_field('image_half_row-image');
          $image_2 = get_sub_field('image_half_row-image_2');
        ?>
          <section class="no_margin">
            <div class="container">
              <div class="overview_grid flex justify-content-between">
                <div class="w50" data-aos="fade-up">
                  <div class="project_block project_margin">
                    <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                  </div>
                </div>
                <div class="w50" data-aos="fade-up" data-aos-delay="100">
                  <div class="project_block project_margin">
                    <img src="<?php echo $image_2["url"]; ?>" alt="<?php echo $image_2["alt"]; ?>">
                  </div>
                </div>
              </div>
            </div>
          </section>


        <?php
        elseif (get_row_layout() == 'image_2_3_row') :
          $image = get_sub_field('image_2_3_row-image');
          $image_2 = get_sub_field('image_2_3_row-image_2');
        ?>
          <section class="no_margin">
            <div class="container">
              <div class="overview_grid flex justify-content-between">
                <div class="w59 project_margin" data-aos="fade-up">
                  <div class="project_block">
                    <div class="img_block">
                      <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                    </div>
                  </div>
                </div>
                <div class="w41 project_margin" data-aos="fade-up" data-aos-delay="100">
                  <div class="project_block">
                    <div class="img_block">
                      <img src="<?php echo $image_2["url"]; ?>" alt="<?php echo $image_2["alt"]; ?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>



        <?php
        elseif (get_row_layout() == 'image_3_2_row') :
          $image = get_sub_field('image_3_2_row-image');
          $image_2 = get_sub_field('image_3_2_row-image_2');
        ?>
          <section class="no_margin">
            <div class="container">
              <div class="overview_grid flex justify-content-between">
                <div class="w41 project_margin" data-aos="fade-up">
                  <div class="project_block">
                    <div class="img_block">
                      <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                    </div>
                  </div>
                </div>
                <div class="w59 project_margin" data-aos="fade-up" data-aos-delay="100">
                  <div class="project_block">
                    <div class="img_block">
                      <img src="<?php echo $image_2["url"]; ?>" alt="<?php echo $image_2["alt"]; ?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        <?php
        elseif (get_row_layout() == 'fullwidth_image_row') :
          $image = get_sub_field('fullwidth_image_row-image');
        ?>
          <section class="full_width_image project_margin" data-aos="fade-in">
            <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
          </section>
        <?php
        elseif (get_row_layout() == 'video_section') :
          $video_source = get_sub_field('video_section-video_source');
          $revolt_video = get_sub_field('video_section-revolt_video');
          $revolt_video_poster  = get_sub_field('video_section-revolt_poster');
          $youtube_video_id = get_sub_field('video_section-youtube_video_id');
          $vimeo_video_id = get_sub_field('video_section-vimeo_video_id');
        ?>
          <section class="full_width_video <?php echo ($video_source == 'revolt') ? 'revolt-video' : ''; ?>" data-aos="fade-in">
            <div class="video_wrapper">
              <?php
              if ($video_source == 'revolt') :
              ?>
                <video poster="<?php echo $revolt_video_poster["url"]; ?>">
                  <source src="<?php echo $revolt_video["url"]; ?>" type="video/mp4">
                </video>
              <?php elseif ($video_source == 'vimeo') :  ?>
                <iframe src="https://player.vimeo.com/video/<?php echo $vimeo_video_id; ?>?api=1&background=1&autoplay=0&loop=1&byline=0&title=0" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
              <?php elseif ($video_source == 'yt') : ?>
                <iframe id="yt-iframe" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtube_video_id; ?>?enablejsapi=1&autoplay=0&iv_load_policy=3&showinfo=0&controls=0&autohide=1&rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <script>
                  var tag = document.createElement("script");
                  tag.id = "iframe-demo";
                  tag.src = "https://www.youtube.com/iframe_api";
                  var firstScriptTag = document.getElementsByTagName("script")[0];
                  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                  // 3. This function creates an <iframe> (and YouTube player)
                  //    after the API code downloads.
                  var player;

                  function onYouTubeIframeAPIReady() {
                    player = new YT.Player("yt-iframe", {
                      events: {
                        // onReady: onPlayerReady,
                        'onStateChange': onPlayerStateChange
                      },
                    });
                  }

                  // function onPlayerReady(event) {
                  //   console.log("onPlayerReady");
                  // }

                  function onPlayerStateChange(event) {

                    if (event.data == 1) {
                      //is playing
                      jQuery(document).ready(function($) {
                        // $(this).find('.video_wrapper').addClass('is-passive');
                        // $('#custom-cursor').hide();
                        $("#custom-cursor span").text("PAUSE");
                      });
                    }

                    if (event.data == 2) {
                      // is pause
                      jQuery(document).ready(function($) {
                        //   // $(this).find('.video_wrapper').removeClass('is-passive');
                        //   // $('#custom-cursor').show();
                        $("#custom-cursor span").text("PLAY");
                      });
                    }
                  }

                  jQuery(document).ready(function($) {
                    var isPlay = false;
                    $(".full_width_video").on("click", function(e) {
                      if (isPlay) {
                        player.pauseVideo();
                      } else {
                        $("#custom-cursor span").text("PAUSE");
                        player.playVideo();
                      }
                      isPlay = !isPlay;
                    });

                    $(".full_width_video")
                      .mouseenter(function() {
                        $("#custom-cursor span").text("PLAY");
                      })
                      .mouseleave(function() {
                        $("#custom-cursor span").text("");
                      });
                  });
                </script>
              <?php endif; ?>
            </div>
          </section>
    <?php
        endif;
      endwhile;
    endif;
    ?>
    </section>


    <section data-aos="fade-in">

      <?php

      $prev_post = get_previous_post();
      $next_post = get_next_post();

      if ($prev_post) {
        $prev_post_id = $prev_post->ID;
      } else {
        $args = array(
          "post_type" => "projects",
          "posts_per_page" => 1,
          "order" => "DESC",
          'fields' => 'ids'
        );

        $first = new WP_Query($args);
        $first->the_post();
        $prev_post_id =  $first->posts[0];
        wp_reset_postdata();
      };

      if ($next_post) {
        $next_post_id = $next_post->ID;
      } else {

        $args = array(
          "post_type" => "projects",
          "posts_per_page" => 1,
          "order" => "ASC",
          'fields' => 'ids'
        );

        $last = new WP_Query($args);
        $last->the_post();
        $next_post_id =  $last->posts[0];
        wp_reset_postdata();
      };

      ?>
      <div class="container prev-next-navigation">
      <a href="<?php the_permalink($prev_post_id); ?>" class="prev_project js-mouse-title" data-mouse-title="Previous">
        <?php
        $image = get_field('featured_image', $prev_post_id);
        if (!$image) :
          $image = get_field('revolt_logo', 'options');
        endif;
        ?>
        <img src="<?php echo $image["url"]; ?>" />
      </a>

      <a href="<?php the_field('all_project_link', 'options') ?>" class="all_projects">
        <span>WORK</span>
      </a>

      <a href="<?php the_permalink($next_post_id); ?>" class="next_project js-mouse-title" data-mouse-title="Next">
        <?php
        $image = get_field('featured_image', $next_post_id);
        if (!$image) :
          $image = get_field('revolt_logo', 'options');
        endif;
        ?>
        <img src="<?php echo $image["url"]; ?>" />
      </a>
      </div>
      
    </section>

<?php endwhile;
endif;
?>

<?php
get_footer();
