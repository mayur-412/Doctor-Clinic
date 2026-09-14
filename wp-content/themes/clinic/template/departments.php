<?php
/**
 * Template Name: Departments page
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
if( have_rows('departments_part') ):

// Loop through rows.
while ( have_rows('departments_part') ) : the_row();

    // Case: Paragraph layout.
    if( get_row_layout() == 'departments_section' ):
        $tab_section = get_sub_field('tab_section');
        $tab_content = get_sub_field('tab_content');
?> <!-- Departments Tabs Section -->
<section id="departments-tabs" class="departments-tabs section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="medical-specialties">
      <div class="row">
        <div class="col-12">
          <div class="specialty-navigation">
            <div class="nav nav-pills d-flex" id="specialty-tabs" role="tablist" data-aos="fade-up"
              data-aos-delay="400">
              <?php $i = 1; foreach ($tab_section as $top_tab) {
                $active_class = $top_tab['active_class'];
                $link_id = $top_tab['link_id'];
                $link_text = $top_tab['link_text'];
                $link_controls = $top_tab['link_controls'];
                $aria_selected = $top_tab['aria_selected'];
                $link_delay = $top_tab['link_delay'];
                ?>
                <a class="nav-link department-tab <?php echo $active_class; ?>" id="<?php echo $link_id; ?>" data-bs-toggle="pill" href="#top-<?php echo $i; ?>" role="tab" aria-controls="<?php echo $link_controls; ?>" aria-selected="<?php echo $aria_selected; ?>" data-aos="fade-up" data-aos-delay="<?php echo $link_delay; ?>"><?php echo $link_text; ?></a>
                <?php
                $i++;
              } ?>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="tab-content department-content" id="specialty-content" data-aos="fade-up"
            data-aos-delay="500">
              
            <?php $i = 1; foreach ($tab_content as $top_content) {
              $content_class = $top_content['content_class'];
              $aria_label = $top_content['aria_label'];
              $content_bg = $top_content['content_bg'];
              $contet_title = $top_content['contet_title'];
              $content_caption = $top_content['content_caption'];
              $left_content = $top_content['left_content'];
             ?><div class="tab-pane fade <?php echo $content_class; ?>" id="top-<?php echo $i; ?>" role="tabpanel" aria-labelledby="<?php echo $aria_label; ?>">
              <div class="row department-layout">
                <div class="col-lg-4 order-lg-2">
                  <div class="department-image">
                    <img src="<?php echo $content_bg; ?>" alt="Neurology Department" class="img-fluid">
                  </div>
                </div>
                <div class="col-lg-8 order-lg-1">
                  <div class="department-info">
                    <h2 class="department-title"><?php echo $contet_title; ?></h2>
                    <p class="department-description"><?php echo $content_caption; ?></p>

                    <div class="row mt-4">
                      <?php foreach ($left_content as $top_left) {
                       $service_icon = $top_left['service_icon'];
                       $service_title = $top_left['service_title'];
                       $service_desc = $top_left['service_desc'];
                       ?> <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="<?php echo $service_icon; ?>"></i>
                          </div>
                          <div class="service-content">
                            <h4><?php echo $service_title; ?></h4>
                            <p><?php echo $service_desc; ?></p>
                          </div>
                        </div>
                      </div> <?php
                      } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div><?php
             $i++;
            } ?>

          </div>
        </div>
      </div>
    </div>

  </div>

</section><!-- /Departments Tabs Section --> <?php

    // Case: Download layout.
    elseif( get_row_layout() == 'second_section' ): 
        $second_box = get_sub_field('second_box');
?> <section id="departments" class="departments section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-5">
  
     <?php foreach ($second_box as $top_box) {
      $box_dealy = $top_box['box_dealy'];
      $department_icon = $top_box['department_icon'];
      $second_bg = $top_box['second_bg'];
      $second_title = $top_box['second_title'];
      $second_desc = $top_box['second_desc'];
      $second_link = $top_box['second_link'];
      $second_text = $top_box['second_text'];
      ?> <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $box_dealy; ?>">
        <div class="department-card">
          <div class="department-icon">
            <i class="<?php echo $department_icon; ?>"></i>
          </div>
          <div class="department-image">
            <img src="<?php echo $second_bg; ?>" alt="Cardiology Department" class="img-fluid">
          </div>
          <div class="department-content">
            <h3><?php echo $second_title; ?></h3>
            <p><?php echo $second_desc; ?></p>
            <a href="<?php echo $second_link['url']; ?>" title="<?php echo $second_link['title']; ?>" class="learn-more">
              <span><?php echo $second_text; ?></span>
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div> <?php
     } ?>

    </div>

  </div>

</section> <?php

    endif;

// End loop.
endwhile;

// No value.
else :
// Do something...
endif;


?>

<!-- Departments Section -->
<!-- <section id="departments" class="departments section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-5">

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="department-card">
          <div class="department-icon">
            <i class="fas fa-heartbeat"></i>
          </div>
          <div class="department-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/health/cardiology-3.webp" alt="Cardiology Department" class="img-fluid">
          </div>
          <div class="department-content">
            <h3>Cardiology</h3>
            <p>Comprehensive heart care with advanced diagnostic tools and expert cardiologists dedicated to your
              cardiovascular health.</p>
            <a href="#!" class="learn-more">
              <span>Learn More</span>
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="department-card">
          <div class="department-icon">
            <i class="fas fa-brain"></i>
          </div>
          <div class="department-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/health/neurology-2.webp" alt="Neurology Department" class="img-fluid">
          </div>
          <div class="department-content">
            <h3>Neurology</h3>
            <p>Advanced treatment for neurological disorders with cutting-edge technology and specialized
              neurological care teams.</p>
            <a href="#!" class="learn-more">
              <span>Learn More</span>
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="department-card">
          <div class="department-icon">
            <i class="fas fa-bone"></i>
          </div>
          <div class="department-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/health/orthopedics-4.webp" alt="Orthopedics Department" class="img-fluid">
          </div>
          <div class="department-content">
            <h3>Orthopedics</h3>
            <p>Expert bone and joint care offering comprehensive treatment from sports injuries to complex
              reconstructive surgery.</p>
            <a href="#!" class="learn-more">
              <span>Learn More</span>
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="department-card">
          <div class="department-icon">
            <i class="fas fa-child"></i>
          </div>
          <div class="department-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/health/pediatrics-3.webp" alt="Pediatrics Department" class="img-fluid">
          </div>
          <div class="department-content">
            <h3>Pediatrics</h3>
            <p>Specialized medical care for infants, children, and adolescents with compassionate pediatric
              specialists.</p>
            <a href="#!" class="learn-more">
              <span>Learn More</span>
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="department-card">
          <div class="department-icon">
            <i class="fas fa-hand-holding-medical"></i>
          </div>
          <div class="department-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/health/dermatology-4.webp" alt="Dermatology Department" class="img-fluid">
          </div>
          <div class="department-content">
            <h3>Dermatology</h3>
            <p>Complete skin care services from medical dermatology to cosmetic procedures for healthy, beautiful
              skin.</p>
            <a href="#!" class="learn-more">
              <span>Learn More</span>
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="department-card">
          <div class="department-icon">
            <i class="fas fa-ribbon"></i>
          </div>
          <div class="department-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/health/oncology-2.webp" alt="Oncology Department" class="img-fluid">
          </div>
          <div class="department-content">
            <h3>Oncology</h3>
            <p>Comprehensive cancer care with multidisciplinary approach and latest treatment options for all cancer
              types.</p>
            <a href="#!" class="learn-more">
              <span>Learn More</span>
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

    </div>

  </div>

</section> --><!-- /Departments Section -->

</main>

<?php
get_footer();
