<?php
/**
 * Template Name: Frequently Asked Questions page
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
	$faq_item = get_field('faq_item');
	?>

<!-- Faq Section -->
<section id="faq" class="faq section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row justify-content-center">
      <div class="col-lg-9">

        <div class="faq-wrapper">
          <?php foreach ($faq_item as $faq) {
           $faq_delay = $faq['faq_delay'];
           $faq_class = $faq['faq_class'];
           $faq_no = $faq['faq_no'];
           $faq_title = $faq['faq_title'];
           $faq_desc = $faq['faq_desc'];
           ?> <div class="faq-item <?php if(!empty($faq_class)){ ?> <?php echo $faq_class; ?> <?php } ?>" data-aos="fade-up" data-aos-delay="<?php echo $faq_delay; ?>">
            <div class="faq-header">
              <span class="faq-number"><?php echo $faq_no; ?></span>
              <h4><?php echo $faq_title; ?></h4>
              <div class="faq-toggle">
                <i class="bi bi-plus"></i>
                <i class="bi bi-dash"></i>
              </div>
            </div>
            <div class="faq-content">
              <div class="content-inner">
                <p><?php echo $faq_desc; ?></p>
              </div>
            </div>
          </div><!-- End FAQ Item --> <?php
          } ?>

        </div>

      </div>
    </div>

  </div>

</section><!-- /Faq Section -->

</main>

<?php
get_footer();
