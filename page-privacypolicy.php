<?php

/*
* Template Name: Privacy Policy
*/

get_header(); ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
?>

        <section class="overview_description">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1" data-aos="fade-left">
                        <h3>
                            <?php the_title(); ?>
                        </h3>
                    </div>
                </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-1" data-aos="fade-in" data-aos-delay="100">
                        <?php the_content(); ?>

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
