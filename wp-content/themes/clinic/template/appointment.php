<?php
/**
 * Template Name: Appointment page
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
$appointment_title = get_field('appointment_title');
$appointment_desc = get_field('appointment_desc');
$step_box = get_field('step_box');
$emergency_text_ = get_field('emergency_text_');
?>

<!-- Appointmnet Section -->
<section id="appointmnet" class="appointmnet section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="booking-wrapper">
          <div class="booking-header text-center" data-aos="fade-up" data-aos-delay="200">
            <h2><?php echo $appointment_title; ?></h2>
            <p><?php echo $appointment_desc; ?></p>
          </div>

          <div class="booking-steps" data-aos="fade-up" data-aos-delay="300">
            <?php foreach ($step_box as $by_step) {
              $step_icon = $by_step['step_icon'];
              $step_title = $by_step['step_title'];
              $step_desc = $by_step['step_desc'];
              ?> <div class="step">
              <div class="step-icon">
                <i class="<?php echo $step_icon; ?>"></i>
              </div>
              <div class="step-content">
                <h4><?php echo $step_title; ?></h4>
                <p><?php echo $step_desc; ?></p>
              </div>
            </div> <?php
            } ?>
          </div>

          <div class="appointment-form" data-aos="fade-up" data-aos-delay="400">
            <div action="forms/book-appointment.php" method="post" class="php-email-form">
              <?php echo do_shortcode('[contact-form-7 id="31821ca" title="Appointment form"]'); ?>
            </div>
          </div>

          <div class="emergency-info" data-aos="fade-up" data-aos-delay="500">
            <p><i class="bi bi-exclamation-triangle"></i> <?php echo $emergency_text_; ?></p>
          </div>

        </div>
      </div>
    </div>

  </div>

</section><!-- /Appointmnet Section -->

</main>


<?php
get_footer();
