<?php
/**
 * Template Name: home page
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

<?php // Check value exists.
if( have_rows('home_item') ):

// Loop through rows.
while ( have_rows('home_item') ) : the_row();

    // Case: Paragraph layout.
    if( get_row_layout() == 'hero_section' ):
        $badge_item = get_sub_field('badge_item');
        $home_title = get_sub_field('home_title');
        $home_desc = get_sub_field('home_desc');
        $my_state = get_sub_field('my_state');
        $hero_btn = get_sub_field('hero_btn');
        $phone_icon = get_sub_field('phone_icon');
        $hote_line = get_sub_field('hote_line');
        $phone_no = get_sub_field('phone_no');
        $card_content = get_sub_field('card_content');
        $star_rate = get_sub_field('star_rate');
        $back_item = get_sub_field('back_item');
        $url = get_the_post_thumbnail_url();
?> <!-- Hero Section -->
<section id="hero" class="hero section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="hero-content">
          <div class="trust-badges mb-4" data-aos="fade-right" data-aos-delay="200">
            <?php foreach ($badge_item as $badge) {
              ?> <div class="badge-item">
              <i class="<?php echo $badge['badge_icon']; ?>"></i>
              <span><?php echo $badge['badge_label']; ?></span>
            </div> <?php
            } ?>
          </div>

          <h1 data-aos="fade-right" data-aos-delay="300"><?php echo $home_title; ?></h1>

          <p class="hero-description" data-aos="fade-right" data-aos-delay="400"><?php echo $home_desc; ?></p>

          <div class="hero-stats mb-4" data-aos="fade-right" data-aos-delay="500">
            <?php foreach ($my_state as $state_mg) {
              ?> <div class="stat-item">
              <h3><span data-purecounter-start="0" data-purecounter-end="<?php echo $state_mg['state_no']; ?>" data-purecounter-duration="2"
                  class="purecounter"></span>+</h3>
              <p><?php echo $state_mg['state_tx']; ?></p>
            </div> <?php
            } ?>
          </div>

          <div class="hero-actions" data-aos="fade-right" data-aos-delay="600">
           <?php foreach ($hero_btn as $btn) {
            $h_link = $btn['hero_link'];
            $s_link = $btn['link_class'];
            $b_icon = $btn['btn_icon'];
            ?> <a href="<?php echo $h_link['url']; ?>" title="<?php echo $h_link['title']; ?>" class="<?php echo $s_link; ?>"><?php if(!empty($b_icon)){ ?> <i class="<?php echo $b_icon; ?>"></i> <?php } ?><?php echo $h_link['title']; ?></a> <?php
           } ?>
          </div>

          <div class="emergency-contact" data-aos="fade-right" data-aos-delay="700">
            <div class="emergency-icon">
              <i class="<?php echo $phone_icon; ?>"></i>
            </div>
            <div class="emergency-info">
              <small><?php echo $hote_line; ?></small>
              <strong><?php echo $phone_no; ?></strong>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="hero-visual" data-aos="fade-left" data-aos-delay="400">
          <div class="main-image">
            <img src="<?php echo $url; ?>" alt="Modern Healthcare Facility" class="img-fluid">
            <div class="floating-card appointment-card">
              <div class="card-icon">
                <i class="bi bi-calendar-check"></i>
              </div>
              <?php foreach ($card_content as $h_content) {
                ?> <div class="card-content">
                <h6><?php echo $h_content['t_card']; ?></h6>
                <p><?php echo $h_content['d_card']; ?></p>
                <small><?php echo $h_content['l_card']; ?></small>
              </div> <?php
              } ?>
              
            </div>
            <div class="floating-card rating-card">
              <?php foreach ($star_rate as $p_rate) {
                $star_icon = $p_rate['star_icon'];
              } ?>
              <div class="card-content">
                <div class="rating-stars">
                  <?php foreach ($star_icon as $icon_s) {
                    ?> <i class="<?php echo $icon_s['s_icon'] ?>"></i> <?php
                  } ?>
                </div>
                <h6><?php echo $p_rate['t_rate']; ?></h6>
                <small><?php echo $p_rate['t_view']; ?></small>
              </div>
            </div>
          </div>
          <div class="background-elements">
            <?php foreach ($back_item as $b_item) {
              ?> <div class="element element-<?php echo $b_item['div_class']; ?>"></div> <?php
            } ?>
          </div>
        </div>
      </div>
    </div>

  </div>

</section><!-- /Hero Section --> <?php

    // Case: Download layout.
    elseif( get_row_layout() == 'home_about' ): 
        $about_t = get_sub_field('about_t');
        $about_caption = get_sub_field('about_caption');
        $state_card = get_sub_field('state_card');
        $about_link = get_sub_field('about_link');
        $about_bg = get_sub_field('about_bg');
        $card_one = get_sub_field('card_one');
        $card_two = get_sub_field('card_two');
?> <!-- Home About Section -->
<section id="home-about" class="home-about section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
        <div class="about-content">
          <h2 class="section-heading"><?php echo $about_t; ?></h2>
          <?php foreach ($about_caption as $caption_db) {
            ?> <p class="<?php if(!empty($caption_db['ds_class'])){ ?> <?php echo $caption_db['ds_class']; ?> <?php } ?>"><?php echo $caption_db['about_ds']; ?></p> <?php
          } ?>

          <div class="stats-grid">
            <?php foreach ($state_card as $card_a) {
              ?>  <div class="stat-item">
              <div class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="<?php echo $card_a['s_number']; ?>"
                data-purecounter-duration="1"></div>
              <div class="stat-label"><?php echo $card_a['s_label']; ?></div>
            </div> <?php
            } ?>
          </div>

          <div class="cta-section">
            <a href="<?php echo $about_link['url']; ?>" title="<?php echo $about_link['title']; ?>" class="btn-primary"><?php echo $about_link['title']; ?></a>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        <div class="about-visual">
          <div class="main-image">
            <img src="<?php echo $about_bg; ?>" alt="Modern medical facility" class="img-fluid">
          </div>
          <div class="floating-card">
            <div class="card-content">
              <div class="icon">
                <i class="bi bi-heart-pulse"></i>
              </div>
              <?php foreach ($card_one as $a_one) {
                ?>  <div class="card-text">
                <h4><?php echo $a_one['c_time']; ?></h4>
                <p><?php echo $a_one['c_text']; ?></p>
              </div> <?php
              } ?>
             
            </div>
          </div>
          <div class="experience-badge">
            <?php foreach ($card_two as $a_two) {
              ?> <div class="badge-content">
              <span class="years"><?php echo $a_two['years']; ?>+</span>
              <span class="text"><?php echo $a_two['cares']; ?></span>
            </div> <?php
            } ?>
            
          </div>
        </div>
      </div>
    </div>

  </div>

</section><!-- /Home About Section --><?php

    elseif( get_row_layout() == 'featured_departments' ): 
        $feature_t = get_sub_field('feature_t');
        $feature_desc = get_sub_field('feature_desc');
        $specialty_card = get_sub_field('specialty_card');
        $high_light = get_sub_field('high_light');
        $call_sec = get_sub_field('call_sec');
?> <section id="featured-departments" class="featured-departments section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2><?php echo $feature_t; ?></h2>
    <p><?php echo $feature_desc; ?></p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-5">

      <?php foreach ($specialty_card as $back_a) {
        $spe_feature = $back_a['spe_feature'];
        ?> <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
        <div class="specialty-card">
          <div class="specialty-content">
            <div class="specialty-meta">
              <span class="specialty-label"><?php echo $back_a['spe_label']; ?></span>
            </div>
            <h3><?php echo $back_a['spe_title']; ?></h3>
            <p><?php echo $back_a['spe_desc']; ?></p>
            <div class="specialty-features">
              <?php foreach ($spe_feature as $range) {
              ?> <span><i class="bi bi-check-circle-fill"></i><?php echo $range['feau_label']; ?></span> <?php
              } ?>
            </div>
             <a href="<?php echo $back_a['spe_link']['url']; ?>" title="<?php echo $back_a['spe_link']['title']; ?>" class="specialty-link"><?php echo $back_a['spe_link']['title']; ?> <i class="bi bi-arrow-right"></i>
            </a>
          </div>
          <div class="specialty-visual">
            <img src="<?php echo $back_a['visual_bg']; ?>" alt="Cardiovascular Medicine" class="img-fluid">
            <div class="visual-overlay">
              <i class="<?php echo $back_a['visula_icon']; ?>"></i>
            </div>
          </div>
        </div>
      </div><!-- End Specialty Card --> <?php
      } ?>

      <?php foreach ($high_light as $high) {
        $h_list = $high['h_list'];
        ?> <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="department-highlight">
          <div class="highlight-icon">
            <i class="<?php echo $high['h_icon']; ?>"></i>
          </div>
          <h4><?php echo $high['h_title']; ?></h4>
          <p><?php echo $high['h_desc']; ?></p>
          <ul class="highlight-list">
            <?php foreach ($h_list as $type_i) {
              ?> <li><?php echo $type_i['i_list'] ?></li> <?php
            } ?>
          </ul>
          <a href="<?php echo $high['h_link']['url']; ?>" title="<?php echo $high['h_link']['title']; ?>" class="highlight-cta"><?php echo $high['h_link']['title']; ?></a>
        </div>
      </div><!-- End Department Highlight --> <?php
      } ?>

    </div>

    <div class="emergency-banner" data-aos="fade-up" data-aos-delay="400">
      <?php foreach ($call_sec as $call) {
        ?> <div class="row align-items-center">
        <div class="col-lg-8">
          <div class="emergency-content">
            <h3><?php echo $call['call_t']; ?></h3>
            <p><?php echo $call['call_desc']; ?></p>
          </div>
        </div>
        <div class="col-lg-4 text-lg-end">
          <a href="tel:+15551234567" class="emergency-btn"><i class="bi bi-telephone-fill"></i><?php echo $call['call_no']; ?></a>
        </div>
      </div> <?php
      } ?>
      
    </div>

  </div>

</section> <?php

    elseif( get_row_layout() == 'featured_services' ): 
        $service_title = get_sub_field('service_title');
        $services_desc = get_sub_field('services_desc');
        $services_left = get_sub_field('services_left');
        $side_bar = get_sub_field('side_bar');
        $special = get_sub_field('special');
?> <section id="featured-services" class="featured-services section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2><?php echo $service_title; ?></h2>
    <p><?php echo $services_desc; ?></p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-0">

      <div class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
        <?php foreach ($services_left as $s_left) {
         ?> <div class="featured-service-main">
          <div class="service-image-wrapper">
            <img src="<?php echo $s_left['services_bg']; ?>" alt="Premier Healthcare Services" class="img-fluid" loading="lazy">
            <div class="service-overlay">
              <div class="service-badge">
                <i class="bi bi-heart-pulse"></i>
                <span><?php echo $s_left['services_label']; ?></span>
              </div>
            </div>
          </div>
          <div class="service-details">
            <h2><?php echo $s_left['services_head']; ?></h2>
            <p><?php echo $s_left['services_caption']; ?></p>
            <a href="<?php echo $s_left['services_link']['url']; ?>" title="<?php echo $s_left['services_link']['title']; ?>" class="main-cta"><?php echo $s_left['services_link']['title']; ?></a>
          </div>
        </div> <?php
        } ?>
        
      </div>

      <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
        <div class="services-sidebar">

         <?php foreach ($side_bar as $s_right) {
           $info_link = $s_right['info_link'];
           ?> <div class="service-item" data-aos="fade-up" data-aos-delay="<?php echo $s_right['d_delay']; ?>">
            <div class="service-icon-wrapper">
              <i class="<?php echo $s_right['icon_r']; ?>"></i>
            </div>
            <div class="service-info">
              <h4><?php echo $s_right['info_title']; ?></h4>
              <p><?php echo $s_right['info_desc']; ?></p>
              <a href="<?php echo $info_link['url']; ?>" title="<?php echo $info_link['title']; ?>" class="service-link"><?php echo $info_link['title']; ?></a>
            </div>
          </div> <?php
         } ?>
        </div>
      </div>

    </div>

    <div class="specialties-grid" data-aos="fade-up" data-aos-delay="300">
      <div class="row align-items-center">

       <?php foreach ($special as $s_bottom) {
         ?> <div class="col-lg-3 col-md-6">
          <div class="specialty-card">
            <div class="specialty-image">
        <img src="<?php echo $s_bottom['special_bg']; ?>" alt="Maternal Care" class="img-fluid" loading="lazy">
            </div>
            <div class="specialty-content">
              <h5><?php echo $s_bottom['special_title']; ?></h5>
              <span><?php echo $s_bottom['special_desc']; ?></span>
            </div>
          </div>
        </div> <?php
       } ?>

      </div>
    </div>

  </div>

</section> <?php

    elseif( get_row_layout() == 'doctor_section' ): 
        $doctor_t = get_sub_field('doctor_t');
        $doctor_desc = get_sub_field('doctor_desc');
        $search_t = get_sub_field('search_t');
        $search_desc = get_sub_field('search_desc');
        $doctor_profile = get_sub_field('doctor_profile');
        $link_doctor = get_sub_field('link_doctor');
?> <section id="find-a-doctor" class="find-a-doctor section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2><?php echo $doctor_t; ?></h2>
    <p><?php echo $doctor_desc; ?></p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="200">
      <div class="col-lg-8 text-center">
        <div class="search-section">
          <h3 class="search-title"><?php echo $search_t; ?></h3>
          <p class="search-subtitle"><?php echo $search_desc; ?></p>
          <div class="search-form">
            <?php echo do_shortcode('[contact-form-7 id="bbff4e3" title="Search form"]'); ?>
          </div>
        </div>
      </div>
    </div>

    <div class="doctors-grid" data-aos="fade-up" data-aos-delay="300">
      <?php foreach ($doctor_profile as $doc_tor) {
        $rating_sec = $doc_tor['rating_sec'];
        $doctor_link = $doc_tor['doctor_link'];
        ?> <div class="doctor-profile" data-aos="zoom-in" data-aos-delay="<?php echo $doc_tor['delay_date']; ?>">
        <div class="profile-header">
          <div class="doctor-avatar">
            <img src="<?php echo $doc_tor['d_img']; ?>" alt="Dr. Amanda Foster" class="img-fluid">
            <div class="status-indicator <?php echo $doc_tor['c_status']; ?>"></div>
          </div>
          <div class="doctor-details">
            <h4><?php echo $doc_tor['d_title']; ?></h4>
            <span class="specialty-tag"><?php echo $doc_tor['specialty']; ?></span>
            <div class="experience-info">
              <i class="bi bi-award"></i>
              <span><?php echo $doc_tor['d_info']; ?></span>
            </div>
          </div>
        </div>
        <?php foreach ($rating_sec as $rat_ing) {
          $star_sec = $rat_ing['star_sec'];
          ?> <div class="rating-section">
          <div class="stars">
            <?php foreach ($star_sec as $icon_star) {
             ?> <i class="<?php echo $icon_star['i_star']; ?>"></i> <?php
            } ?>
          </div>
          <span class="rating-score"><?php echo $rat_ing['r_score']; ?></span>
          <span class="review-count"><?php echo $rat_ing['c_review']; ?></span>
        </div> <?php
        } ?>
        <div class="action-buttons">
          <?php foreach ($doctor_link as $doct_link) {
            ?> <a href="<?php echo $doct_link['d_link']['url'] ?>" title="<?php echo $doct_link['d_link']['title'] ?>" class="<?php echo $doct_link['doct_class'] ?>"><?php echo $doct_link['d_link']['title'] ?></a> <?php
          } ?>
        </div>
      </div><!-- End Doctor Profile --> <?php
      } ?>

    </div>

    <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="700">
      <a href="<?php echo $link_doctor['url']; ?>" title="<?php echo $link_doctor['title']; ?>" class="btn-view-all"><?php echo $link_doctor['title']; ?>
        <i class="bi bi-arrow-right"></i>
      </a>
    </div>

  </div>

</section> <?php

    elseif( get_row_layout() == 'call_action' ): 
        $call_title = get_sub_field('call_title');
        $call_desc = get_sub_field('call_desc');
        $cta_btn = get_sub_field('cta_btn');
        $call_bg = get_sub_field('call_bg');
        $call_box = get_sub_field('call_box');
        $call_head = get_sub_field('call_head');
        $call_caption = get_sub_field('call_caption');
        $call_number = get_sub_field('call_number');
        $link_call = get_sub_field('link_call');    
?> <section id="call-to-action" class="call-to-action section light-background">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="hero-content">
      <div class="row align-items-center">

        <div class="col-lg-6">
          <div class="content-wrapper" data-aos="fade-up" data-aos-delay="200">
            <h1><?php echo $call_title; ?></h1>
            <p><?php echo $call_desc; ?></p>

            <div class="cta-wrapper">
              <?php foreach ($cta_btn as $call_btn) {
               ?> <a href="<?php echo $call_btn['cta_link']; ?>" class="<?php echo $call_btn['cta_class']; ?>">
                <span><?php echo $call_btn['cta_text']; ?></span><i class="bi bi-arrow-right"></i></a> <?php
              } ?>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="image-container" data-aos="fade-left" data-aos-delay="300">
            <img src="<?php echo $call_bg; ?>" alt="Medical Excellence" class="img-fluid">
          </div>
        </div>

      </div>
    </div>

    <div class="features-section">

      <div class="row g-0">

      <?php foreach ($call_box as $box_call) {
        ?> <div class="col-lg-4">
          <div class="feature-block" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-icon">
              <i class="<?php echo $box_call['box_icon']; ?>"></i>
            </div>
            <h3><?php echo $box_call['box_title']; ?></h3>
            <p><?php echo $box_call['box_desc']; ?></p>
          </div>
        </div> <?php
      } ?>
      </div>

    </div>

    <div class="contact-block">
      <div class="row">

        <div class="col-lg-8">
          <div class="contact-content" data-aos="fade-up" data-aos-delay="200">
            <h2><?php echo $call_head; ?></h2>
            <p><?php echo $call_caption; ?></p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="contact-actions" data-aos="fade-up" data-aos-delay="300">
            <a href="tel:5551234567" class="emergency-call">
              <i class="bi bi-telephone"></i>
              <span><?php echo $call_number; ?></span>
            </a>
            <a href="<?php echo $link_call['url']; ?>" title="<?php echo $link_call['title']; ?>" class="contact-link"><?php echo $link_call['title']; ?></a>
          </div>
        </div>

      </div>
    </div>

  </div>

</section> <?php

    endif;

// End loop.
endwhile;

// No value.
else :
// Do something...
endif; ?>	

</main>

<?php
get_footer();
