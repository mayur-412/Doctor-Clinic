<?php
/**
 * Template Name: Department Details page
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

<!-- Department Details Section -->
<section id="department-details" class="department-details section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">
<?php // Check value exists.
if( have_rows('department_details') ):

// Loop through rows.
while ( have_rows('department_details') ) : the_row();

    // Case: Paragraph layout.
    if( get_row_layout() == 'department_hero' ):
        $hero_label = get_sub_field('hero_label');
        $hero_title = get_sub_field('hero_title');
        $hero_desc = get_sub_field('hero_desc');
        $high_light = get_sub_field('high_light');
        $hero_btn = get_sub_field('hero_btn');
        $hero_bg = get_sub_field('hero_bg');
        $card_title = get_sub_field('card_title');
        $card_desc = get_sub_field('card_desc');
?> <div class="row">
  <div class="col-xl-6 col-lg-7">
    <div class="department-hero" data-aos="fade-right" data-aos-delay="200">
      <div class="badge-wrap">
        <span class="specialty-badge"><?php echo $hero_label; ?></span>
      </div>
      <h1 class="department-title"><?php echo $hero_title; ?></h1>
      <p class="department-intro"><?php echo $hero_desc; ?></p>

      <div class="key-highlights">
        <?php foreach ($high_light as $b_high) {
         $light_number = $b_high['light_number'];
         $light_text = $b_high['light_text'];
         ?> <div class="highlight-item">
          <span class="highlight-number"><?php echo $light_number; ?></span>
          <span class="highlight-text"><?php echo $light_text; ?></span>
        </div> <?php
        } ?>
      </div>

      <div class="action-group">
        <?php foreach ($hero_btn as $h_btn) {
         $hero_link = $h_btn['hero_link'];
         $link_class = $h_btn['link_class'];
         $link_icon = $h_btn['link_icon'];
         ?> <a href="<?php echo $hero_link['url']; ?>" title="<?php echo $hero_link['title']; ?>" class="<?php echo $link_class; ?>"><span><?php echo $hero_link['title']; ?></span><?php if(!empty($link_icon)){ ?> <i class="<?php echo $link_icon; ?>"></i> <?php } ?></a> <?php
        } ?>
      </div>
    </div>
  </div>

  <div class="col-xl-6 col-lg-5">
    <div class="department-visual" data-aos="fade-left" data-aos-delay="300">
      <div class="image-container">
        <img src="<?php echo $hero_bg; ?>" alt="Neurology Department"
          class="img-fluid primary-image">
        <div class="floating-card" data-aos="zoom-in" data-aos-delay="500">
          <div class="card-icon">
            <i class="bi bi-brain"></i>
          </div>
          <div class="card-content">
            <h4><?php echo $card_title; ?></h4>
            <p><?php echo $card_desc; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <?php

    // Case: Download layout.
    elseif( get_row_layout() == 'services_overview' ): 
        $overview_title = get_sub_field('overview_title');
        $overview_desc = get_sub_field('overview_desc');
        $overview_item = get_sub_field('overview_item');
?> <div class="services-overview" data-aos="fade-up" data-aos-delay="400">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="overview-header">
            <h3><?php echo $overview_title; ?></h3>
            <p><?php echo $overview_desc; ?></p>
          </div>
        </div>
      </div>

      <div class="row gy-4 services-grid">
       <?php foreach ($overview_item as $over_view) {
         $item_dealy = $over_view['item_dealy'];
         $item_icon = $over_view['item_icon'];
         $item_title = $over_view['item_title'];
         $item_desc = $over_view['item_desc'];
         ?> <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $item_dealy; ?>">
          <div class="service-item">
            <div class="service-icon">
              <i class="<?php echo $item_icon; ?>"></i>
            </div>
            <h4><?php echo $item_title; ?></h4>
            <p><?php echo $item_desc; ?></p>
          </div>
        </div> <?php
       } ?>

      </div>
    </div> <?php

    // Case: Download layout.
    elseif( get_row_layout() == 'care_section' ): 
        $care_bg = get_sub_field('care_bg');
        $care_title = get_sub_field('care_title');
        $care_desc = get_sub_field('care_desc');
        $list_item = get_sub_field('list_item');
        $contact_info = get_sub_field('contact_info');
?> <div class="expert-care-section" data-aos="fade-up" data-aos-delay="800">
      <div class="row align-items-center">
        <div class="col-lg-5" data-aos="fade-right" data-aos-delay="900">
          <div class="expert-image">
            <img src="<?php echo $care_bg; ?>" alt="Neurological Expert" class="img-fluid">
          </div>
        </div>

        <div class="col-lg-7" data-aos="fade-left" data-aos-delay="900">
          <div class="expert-content">
            <h3><?php echo $care_title; ?></h3>
            <p class="lead"><?php echo $care_desc; ?></p>

            <div class="expertise-list">
              <?php foreach ($list_item as $item_top) {
               $list_text = $item_top['list_text'];
               ?> <div class="expertise-item">
                <i class="bi bi-check2"></i>
                <span><?php echo $list_text ?></span>
              </div> <?php
              } ?>
            </div>

            <div class="contact-info">
              <?php foreach ($contact_info as $info) {
               $contact_icon = $info['contact_icon'];
               $contact_label = $info['contact_label'];
               $contact_number = $info['contact_number'];
               ?> <div class="contact-item">
                <i class="<?php echo $contact_icon; ?>"></i>
                <div>
                  <span class="contact-label"><?php echo $contact_label; ?></span>
                  <span class="contact-value"><?php echo $contact_number; ?></span>
                </div>
              </div> <?php
              } ?>
            </div>
          </div>
        </div>
      </div>
    </div> <?php
    endif;

// End loop.
endwhile;

// No value.
else :
// Do something...
endif;
 ?>

  </div>

</section><!-- /Department Details Section -->

</main>

<?php
get_footer();
