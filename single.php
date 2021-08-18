<?php

/**
 * The template for displaying all single posts
 *
 */

get_header(); ?>


<?php
if (have_posts()) :

  while (have_posts()) : the_post(); ?>

    <section class="overview_description">
      <div class="container">
        <div class="row">


          <!-- TITLE AND DESCRIPTION -->

          <div class="col-lg-6 col-md-10 offset-md-1">
            <h2 class="blog_title title" data-aos="fade-up">
              <?php the_title(); ?>
            </h2>

            <h4 class="balance-text">
              <?php the_field('description'); ?>
            </h4>

            <!-- <p class="post-date grey"><?php $post_date = the_date('j F Y'); echo $post_date ?></p> -->

          </div>
        </div>
      </div>
    </section>

    <section class="project_margin">
      <div class="container">
        <div class="row">

          <!-- CONTENT -->
          <div class="all-content col-lg-6 col-md-10 offset-md-1" data-aos="fade-up">
            <?php
            $image = get_field('', $id);
            if ($image) :
            ?>
              <div class="carusel_slide--image">
                <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
              </div>
            <?php endif; ?>

            <?php the_content(); ?>


            <h3 class="py-5"><a class="what_is--link" href="<?php echo get_permalink(430); ?>">Back to all posts</a></h3>

            <!-- CATEGORIES -->

            <?php
            $categories = get_the_category();
            if ($categories) :
            ?>
              <ul class="page_links">
                <?php foreach ($categories as $key => $category) : ?>
                  <li class="<?php echo ($key == 0) ? 'active' : ''; ?>" data-aos="fade-up" data-aos-delay="<?php echo $key * 50; ?>"><span><?php echo $category->name; ?></span></li>
                <?php endforeach; ?>
              </ul>
            <?php
            endif;
            ?>

          </div>



        </div>
      </div>
    </section>


    </div>
    </div>
<?php endwhile;


endif; ?>

<?php
get_footer();
