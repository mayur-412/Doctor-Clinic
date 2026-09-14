<?php
/**
 * Template Name: Service Details page
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

<!-- Service Details 2 Section -->
<section id="service-details-2" class="service-details-2 section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">
<?php
// Check value exists.
if( have_rows('services_details') ):

// Loop through rows.
while ( have_rows('services_details') ) : the_row();

    // Case: Paragraph layout.
    if( get_row_layout() == 'hero_section' ):
        $hero_label = get_sub_field('hero_label');
        $hero_title = get_sub_field('hero_title');
        $hero_desc = get_sub_field('hero_desc');
        $details_item = get_sub_field('details_item');
        $hero_bg = get_sub_field('hero_bg');
        $stat_item = get_sub_field('stat_item');
?> <div class="row">

      <div class="col-lg-8 mx-auto text-center mb-5" data-aos="fade-up" data-aos-delay="150">
        <div class="service-header">
          <div class="service-category">
            <span><?php echo $hero_label; ?></span>
          </div>
          <h2><?php echo $hero_title; ?></h2>
          <p class="lead"><?php echo $hero_desc; ?></p>
        </div>
      </div>

    </div>

    <div class="row gy-4 align-items-center">

      <div class="col-lg-5" data-aos="fade-right" data-aos-delay="200">
        <div class="service-details">

        <?php foreach ($details_item as $details) {
         $item_icon = $details['item_icon'];
         $item_title = $details['item_title'];
         $item_desc = $details['item_desc'];
         ?> <div class="detail-item">
            <div class="icon-wrapper">
              <i class="<?php echo $item_icon; ?>"></i>
            </div>
            <div class="content">
              <h4><?php echo $item_title; ?></h4>
              <p><?php echo $item_desc; ?></p>
            </div>
          </div> <?php
         } ?>

        </div>
      </div>

      <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
        <div class="service-visual">
          <img src="<?php echo $hero_bg; ?>" alt="Neurology Services" class="img-fluid">
          <div class="visual-overlay">
            <div class="stats-card">
              <?php foreach ($stat_item as $stat) {
                $stat_label = $stat['stat_label'];
                ?>
                <div class="stat">
                  <?php foreach ($stat_label as $labels) {
                  $stat_class = $labels['stat_class'];
                  $stat_text = $labels['stat_text'];
                  ?> <span class="<?php echo $stat_class; ?>"><?php echo $stat_text; ?></span> <?php
                } ?>
              </div>
                 <?php
              } ?>
            </div>
          </div>
        </div>
      </div>

    </div> <?php

    // Case: Download layout.
    elseif( get_row_layout() == 'about_section' ): 
        $about_title = get_sub_field('about_title');
        $about_desc = get_sub_field('about_desc');
        $feature_box = get_sub_field('feature_box');
        $areas_title = get_sub_field('areas_title');
        $tag_item = get_sub_field('tag_item');
?> <div class="row gy-4 mt-5">

      <div class="col-12" data-aos="fade-up" data-aos-delay="100">
        <div class="service-overview">
          <div class="row align-items-center">

            <div class="col-lg-6">
              <h3><?php echo $about_title; ?></h3>
              <p><?php echo $about_desc; ?></p>

              <div class="features-grid">
                <?php foreach ($feature_box as $feat_ure) {
                  $box_icon = $feat_ure['box_icon'];
                  $box_title = $feat_ure['box_title'];
                  ?> <div class="feature">
                  <i class="<?php echo $box_icon; ?>"></i>
                  <span><?php echo $box_title; ?></span>
                </div> <?php
                } ?>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="treatment-areas">
                <h4><?php echo $areas_title; ?></h4>
                <div class="condition-tags">
                  <?php foreach ($tag_item as $tags) {
                    $tag_text = $tags['tag_text'];
                    ?> <span class="tag"><?php echo $tag_text; ?></span> <?php
                  } ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div> <?php

    // Case: Download layout.
    elseif( get_row_layout() == 'action_card' ): 
        $action_box = get_sub_field('action_box');
?> <div class="row gy-4 mt-5">
       
       <?php foreach ($action_box as $box_sec) {
         $date_delay = $box_sec['date_delay'];
         $card_icon = $box_sec['card_icon'];
         $card_title = $box_sec['card_title'];
         $card_desc = $box_sec['card_desc'];
         $card_link = $box_sec['card_link'];
         $card_label = $box_sec['card_label'];
         ?> <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="<?php echo $date_delay; ?>">
        <div class="action-card primary">
          <div class="card-header">
            <i class="<?php echo $card_icon; ?>"></i>
            <h4><?php echo $card_title; ?></h4>
          </div>
          <p><?php echo $card_desc; ?></p>
          <div class="card-footer">
            <a href="<?php echo $card_link['url']; ?>" title="<?php echo $card_link['title']; ?>" class="btn-action"><?php echo $card_link['title']; ?></a>
            <span class="availability"><?php echo $card_label; ?></span>
          </div>
        </div>
      </div> <?php
       } ?>

    </div>
 <?php

    endif;

// End loop.
endwhile;

// No value.
else :
// Do something...
endif;
?>

  </div>

</section><!-- /Service Details 2 Section -->

</main>

<?php
get_footer();
