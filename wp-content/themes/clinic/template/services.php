<?php
/**
 * Template Name: Services page
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

// Check value exists.
if( have_rows('services_part') ):

// Loop through rows.
while ( have_rows('services_part') ) : the_row();

    // Case: Paragraph layout.
    if( get_row_layout() == 'services_section' ):
        $services_card = get_sub_field('services_card');
?> <section id="services" class="services section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

     <?php foreach ($services_card as $s_card) {
      $date_delay = $s_card['date_delay'];
      $services_bg = $s_card['services_bg'];
      $card_icon = $s_card['card_icon'];
      $services_title = $s_card['services_title'];
      $services_desc = $s_card['services_desc'];
      $services_feature = $s_card['services_feature'];
      $services_link = $s_card['services_link'];
      $link_text = $s_card['link_text'];
      ?> <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $date_delay; ?>">
        <div class="service-item">
          <div class="service-image">
            <img src="<?php echo $services_bg; ?>" alt="Cardiology Services" class="img-fluid">
            <div class="service-overlay">
              <i class="<?php echo $card_icon; ?>"></i>
            </div>
          </div>
          <div class="service-content">
            <h3><?php echo $services_title; ?></h3>
            <p><?php echo $services_desc; ?></p>
            <div class="service-features">
              <?php foreach ($services_feature as $feat_ure) {
                $feature_tx = $feat_ure['feature_tx'];
                ?> <span class="feature-item"><i class="fas fa-check"></i> <?php echo $feature_tx; ?></span> <?php 
              } ?>
              
            </div>
            <a href="<?php echo $services_link['url']; ?>" title="<?php echo $services_link['title']; ?>" class="service-btn">
              <span><?php echo $link_text; ?></span>
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div><!-- End Service Item --> <?php
     } ?>

    </div>

  </div>

</section> <?php

    // Case: Download layout.
    elseif( get_row_layout() == 'download' ): 
        $file = get_sub_field('file');
        // Do something...

    endif;

// End loop.
endwhile;

// No value.
else :
// Do something...
endif;
?>

</main>

<?php
get_footer();
