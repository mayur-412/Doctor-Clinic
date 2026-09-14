<?php
/**
 * Template Name: Contact page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clinic
 */

get_header();
?>

  <main class="main">

      <?php
      // Page Title
      get_template_part('template/section-title'); 
       //End Page Title
      $info_item = get_field('info_item');
      $form_title = get_field('form_title');
      $form_desc = get_field('form_desc');
      ?>

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-5">
          <div class="col-lg-5">
            <div class="contact-info-wrapper">
              <?php foreach ($info_item as $info) {
               $date_delay = $info['date_delay'];
               $info_icon = $info['info_icon'];
               $info_title = $info['info_title'];
               $info_desc   = $info['info_desc'];
              ?> <div class="contact-info-item" data-aos="fade-up" data-aos-delay="<?php echo $date_delay; ?>">
                <div class="info-icon">
                  <i class="<?php echo $info_icon; ?>"></i>
                </div>
                <div class="info-content">
                  <h3><?php echo $info_title; ?></h3>
                  <p><?php echo $info_desc; ?></p>
                </div>
              </div> <?php
              } ?>
            </div>
          </div>
          

          <div class="col-lg-7">
            <div class="contact-form-card" data-aos="fade-up" data-aos-delay="200">
              <h2><?php echo $form_title; ?></h2>
              <p class="mb-4"><?php echo $form_desc; ?></p>
              <div action="forms/contact.php" method="post" class="php-email-form">
                <?php
                  echo do_shortcode('[contact-form-7 id="f73ceeb" title="Clinic form"]');
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid map-container" data-aos="fade-up" data-aos-delay="200">
        <div class="map-overlay"></div>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
          width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

    </section><!-- /Contact Section -->

  </main>

<?php
get_footer();
