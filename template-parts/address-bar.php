<?php
$revolt_addresses = get_field('revolt_addresses', 'options');
if ($revolt_addresses) :
?>

  <section class="home_contact_details module">
    <div class="container">
      <div class="row">

        <?php
        foreach ($revolt_addresses as $key => $address) :
          // print_r($blog_post);
        ?>
          <div class="col-md-4 offset-md-1 col-6" data-aos="fade-left" data-aos-delay="<?php echo 100 * $key; ?>">
            <div class="info_block">
              <h5 style="border-bottom-color:<?php echo $address['color']; ?>;">
                <?php echo $address['title']; ?>
              </h5>
              <div class="details_info grey">
                <p>
                  <a href="mailto:<?php echo $address['email']; ?>"><?php echo $address['email']; ?></a> <br>
                  <a href="tel:<?php echo $address['phone']; ?>"><?php echo $address['phone']; ?></a><br>
                  <?php echo $address['working_hours']; ?>
                </p>
                <p>
                  <?php echo $address['address']; ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
