<?php
/**
 * Template Name: About page
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

<!-- Page Title -->
<?php get_template_part('template/section-title'); ?>
<!-- End Page Title -->

<!-- About Section -->
<section id="about" class="about section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">
<?php // Check value exists.
if( have_rows('about_part') ):

// Loop through rows.
while ( have_rows('about_part') ) : the_row();

    // Case: Paragraph layout.
    if( get_row_layout() == 'about_hero' ):
        $hero_title = get_sub_field('hero_title');
        $hero_content = get_sub_field('hero_content');
        $state_item = get_sub_field('state_item');
        $hero_bg = get_sub_field('hero_bg');
        $bg_perosn = get_sub_field('bg_perosn');
?> <div class="row align-items-center">
      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
        <div class="about-content">
          <h2><?php echo $hero_title; ?></h2>
          <?php foreach ($hero_content as $caption) {
            $desc_class = $caption['desc_class'];
            $hero_desc = $caption['hero_desc'];
            ?> <p class="<?php if(!empty($desc_class)){ ?> <?php echo $desc_class; ?> <?php } ?>"><?php echo $hero_desc; ?></p> <?php
          } ?>

          <div class="stats-grid">
            <?php foreach ($state_item as $b_item) {
              $state_date = $b_item['state_date'];
              $state_label = $b_item['state_label'];
              ?> <div class="stat-item">
              <span class="stat-number" data-purecounter-start="0" data-purecounter-end="<?php echo $state_date; ?>"data-purecounter-duration="2"><?php echo $state_date; ?></span>
              <span class="stat-label"><?php echo $state_label; ?></span>
            </div> <?php
            } ?>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
        <div class="image-wrapper">
          <img src="<?php echo $hero_bg; ?>" class="img-fluid main-image" alt="Healthcare facility">
          <div class="floating-image" data-aos="zoom-in" data-aos-delay="400">
            <img src="<?php echo $bg_perosn; ?>" class="img-fluid" alt="Medical team">
          </div>
        </div>
      </div>
    </div> <?php

    // Case: Download layout.
    elseif( get_row_layout() == 'values_section' ): 
        $values_title = get_sub_field('values_title');
        $values_caption = get_sub_field('values_caption');
        $values_item = get_sub_field('values_item');
?> <div class="values-section" data-aos="fade-up" data-aos-delay="300">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h3><?php echo $values_title; ?></h3>
          <p class="section-description"><?php echo $values_caption; ?></p>
        </div>
      </div>

      <div class="row">
        <?php foreach ($values_item as $v_item) {
          ?> <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $v_item['values_number']; ?>">
          <div class="value-item">
            <div class="value-icon">
              <i class="<?php echo $v_item['values_icon']; ?>"></i>
            </div>
            <h4><?php echo $v_item['item_title']; ?></h4>
            <p><?php echo $v_item['item_desc']; ?></p>
          </div>
        </div> <?php
        } ?>
      </div>
    </div><!-- End Values Section --> <?php

    // Case: Download layout.
    elseif( get_row_layout() == 'certifications_section' ): 
        $certi_title = get_sub_field('certi_title');
        $certi_desc = get_sub_field('certi_desc');
        $certi_item = get_sub_field('certi_item');
?> <div class="certifications-section" data-aos="fade-up" data-aos-delay="400">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h3><?php echo $certi_title; ?></h3>
          <p class="section-description"><?php echo $certi_desc; ?></p>
        </div>
      </div>

      <div class="row justify-content-center">
        <?php foreach ($certi_item as $item_c) {
         ?> <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="<?php echo $item_c['certi_delay']; ?>">
          <div class="certification-item">
            <img src="<?php echo $item_c['certi_bg']; ?>" class="img-fluid" alt="Healthcare certification">
          </div>
        </div> <?php
        } ?>
      </div><!-- End Certifications Row -->
    </div><!-- End Certifications Section --> <?php
    endif;

// End loop.
endwhile;

// No value.
else :
// Do something...
endif; ?>

  </div>

</section><!-- /About Section -->

</main>

<?php
get_footer();
