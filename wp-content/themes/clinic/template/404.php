<?php
/**
 * Template Name: 404 error
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
  $main_title = get_field('main_title');
  $section_title = get_field('section_title');
  $section_desc = get_field('section_desc');
  $section_btn = get_field('section_btn');
  $sub_title = get_field('sub_title');
  $helpful_link = get_field('helpful_link');
  ?>

  <!-- Error 404 Section -->
  <section id="error-404" class="error-404 section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">

          <div class="error-number" data-aos="zoom-in" data-aos-delay="200">
            <?php echo $main_title; ?>
          </div>

          <h1 class="error-title" data-aos="fade-up" data-aos-delay="300"><?php echo $section_title; ?></h1>

          <p class="error-description" data-aos="fade-up" data-aos-delay="400"><?php echo $section_desc; ?></p>

          <div class="error-actions" data-aos="fade-up" data-aos-delay="500">
            <?php foreach ($section_btn as $btn_link) {
             $section_link = $btn_link['section_link'];
             $link_class = $btn_link['link_class'];
             $link_icon = $btn_link['link_icon'];
              ?> <a href="<?php echo $section_link['url']; ?>" title="<?php echo $section_link['title']; ?>"class="<?php echo $link_class; ?>"><i class="<?php echo $link_icon; ?>"></i><?php echo $section_link['title']; ?></a> <?php
            } ?>
          </div>

        </div>
      </div>

      <div class="row justify-content-center mt-5">
        <div class="col-lg-10">

          <div class="helpful-links" data-aos="fade-up" data-aos-delay="600">
            <h3><?php echo $sub_title; ?></h3>
            <div class="links-grid">
              <?php foreach ($helpful_link as $full) {
               $help_link = $full['help_link'];
               $help_icon = $full['help_icon'];
               $help_text = $full['help_text'];
               ?> <a href="<?php echo $help_link['url']; ?>" title="<?php echo $help_link['title']; ?>" class="link-item"><i class="<?php echo $help_icon; ?>"></i><span><?php echo $help_text; ?></span>
              </a> <?php
              } ?>
            </div>
          </div>

        </div>
      </div>

    </div>

  </section><!-- /Error 404 Section -->

</main>

<?php
get_footer();
