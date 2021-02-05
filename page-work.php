<?php

/*
* Template Name: Work
*/

get_header(); ?>

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>
    <section class="overview_description">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 offset-lg-1" data-aos="fade-left">
            <h2>
              <?php the_field('title'); ?>
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 offset-lg-1" data-aos="fade-in" data-aos-delay="100">
            <p class="grey">
              <?php the_field('description'); ?>
            </p>
          </div>
        </div>
      </div>
    </section>



      <div class="container pt-4">
        <div class="row">
          <div class="col-lg-10 offset-lg-1">
            <div class="overview_grid flex justify-content-between">

              <?php $projects = get_field('projects');
              if ($projects) :

                foreach ($projects as $key => $project) :

                  $project_id = $project['project'];
              ?>
                  <div class="<?php echo $project['size']; ?>" data-aos="fade-up" data-aos-delay="<?php echo $key * 50; ?>">
                    <div class="project_cover">



                      <a href="<?php the_permalink($project_id); ?>" class="img_block hover js-mouse-title" data-mouse-title="<?php echo get_the_title($project_id); ?>">
                        <?php
                        $image = get_field('featured_image', $project_id);
                        if ($image) :
                        ?>
                          <!-- <div class="carusel_slide--image"> -->
                          <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                          <!-- </div> -->
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

      </div>
<?php
  endwhile;
endif;
?>
<?php
get_footer();
