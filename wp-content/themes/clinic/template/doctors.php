<?php
/**
 * Template Name: Doctors page
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
?>

<!-- Doctors Section -->
<section id="doctors" class="doctors section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">
 
     <?php
     $doctor_card = get_field('doctor_card');
     foreach ($doctor_card as $d_card) {
      $date_delay = $d_card['date_delay'];
      $doctor_bg = $d_card['doctor_bg'];
      $social_media = $d_card['social_media'];
      $doctor_name = $d_card['doctor_name'];
      $doctor_label = $d_card['doctor_label'];
      $doctor_desc = $d_card['doctor_desc'];
      $doctor_meta = $d_card['doctor_meta'];
      $doctor_link = $d_card['doctor_link'];
     ?>
     <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $date_delay; ?>">
        <div class="doctor-card">
          <div class="doctor-image">
            <img src="<?php echo $doctor_bg; ?>" alt="Dr. Marcus Johnson" class="img-fluid">
            <div class="doctor-overlay">
              <div class="social-links">
                <?php foreach ($social_media as $media) {
                  $social_link = $media['social_link'];
                  $social_icon = $media['social_icon'];
                ?> <a href="<?php echo $social_link['url']; ?>" title="<?php echo $social_link['title']; ?>" ><i class="<?php echo $social_icon; ?>"></i></a> <?php
                } ?>
              </div>
            </div>
          </div>
          <div class="doctor-content">
            <h4><?php echo $doctor_name; ?></h4>
            <span class="specialty"><?php echo $doctor_label; ?></span>
            <p><?php echo $doctor_desc; ?></p>
            <div class="doctor-meta">
              <?php foreach ($doctor_meta as $d_meta) {
                $meta_class = $d_meta['meta_class'];
                $doctor_icon = $d_meta['doctor_icon'];
                $doctor_text = $d_meta['doctor_text'];
              ?>  <div class="<?php echo $meta_class; ?>">
                <i class="<?php echo $doctor_icon; ?>"></i>
                <span><?php echo $doctor_text; ?></span>
              </div> <?php
              } ?>
            </div>
            <a href="<?php echo $doctor_link['url']; ?>" title="<?php echo $doctor_link['title']; ?>" class="btn-appointment"><?php echo $doctor_link['title']; ?></a>
          </div>
        </div>
      </div><!-- End Doctor Card -->
     <?php
     }
     ?>

    </div>

  </div>

</section><!-- /Doctors Section -->

</main>

<?php
get_footer();
