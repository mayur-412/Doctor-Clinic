<?php
/**
 * Template Name: Gallery page
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
	$gallery_box = get_field('gallery_box');
	?>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">

         <?php foreach ($gallery_box as $gallery) {
          $gallery_bg = $gallery['gallery_bg'];
          $image_title = $gallery['image_title'];
          ?> <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
              <img src="<?php echo $gallery_bg; ?>" class="img-fluid" alt="">
              <div class="gallery-links d-flex align-items-center justify-content-center">
                <a href="<?php echo $gallery_bg; ?>" title="<?php echo $image_title; ?>" class="glightbox preview-link"><i
                    class="bi bi-arrows-angle-expand"></i></a>
                <a href="#" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
          </div><!-- End Gallery Item --> <?php
         } ?>

        </div>

      </div>

    </section><!-- /Gallery Section -->

  </main>

<?php
get_footer();
