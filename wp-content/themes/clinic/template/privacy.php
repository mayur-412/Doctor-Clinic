<?php
/**
 * Template Name: Privacy page
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
      $privacy_label = get_field('privacy_label');
      $privacy_title = get_field('privacy_title');
      $privacy_desc = get_field('privacy_desc');
      $content_section = get_field('content_section');
    ?>

    <!-- Privacy Section -->
    <section id="privacy" class="privacy section">

      <div class="container" data-aos="fade-up">
        <!-- Header -->
        <div class="privacy-header" data-aos="fade-up">
          <div class="header-content">
            <div class="last-updated"><?php echo $privacy_label; ?></div>
            <h1><?php echo $privacy_title; ?></h1>
            <p class="intro-text"><?php echo $privacy_desc; ?></p>
          </div>
        </div>

        <!-- Main Content -->
        <div class="privacy-content" data-aos="fade-up">
        <?php foreach ($content_section as $content) {
          $contet_title = $content['contet_title'];
          $content_desc = $content['content_desc'];
          $sub_desc = $content['sub_desc'];
          $privacy_item = $content['privacy_item'];
        ?>  <!-- Introduction -->
          <div class="content-section">
            <h2><?php echo $contet_title; ?></h2>
            <p><?php echo $content_desc; ?><p>
           <?php if(!empty($sub_desc)){ ?> <p><?php echo $sub_desc; ?></p> <?php } ?>
           <?php if(!empty($privacy_item)){ ?>
            <?php foreach ($privacy_item as $top_list) {
              $item_title = $top_list['item_title'];
              $item_desc = $top_list['item_desc'];
              $list_item = $top_list['list_item'];
            ?> <h3><?php echo $item_title; ?></h3>
            <p><?php echo $item_desc; ?></p>
            <?php if(!empty($list_item)){ ?>
              <ul>
            <?php foreach ($list_item as $top_item) {
              $list_text = $top_item['list_text'];
            ?> <li><?php echo $list_text; ?></li> <?php
            } ?>
            </ul>
            <?php } ?>
             <?php
            } ?>
           <?php } ?>
          </div> <?php
        } ?>
        </div>

     <?php
     $last_title = get_field('last_title');
     $last_desc = get_field('last_desc');
     $contact_details = get_field('contact_details');
     ?>
        <!-- Contact Section -->
        <div class="privacy-contact" data-aos="fade-up">
          <h2><?php echo $last_title; ?></h2>
          <p><?php echo $last_desc; ?></p>
          <div class="contact-details">
            <?php foreach ($contact_details as $details) {
             $contact_tx = $details['contact_tx'];
             ?> <p><?php echo $contact_tx; ?></p> <?php
            } ?>
          </div>
        </div>

      </div>

    </section><!-- /Privacy Section -->

</main>

<?php
get_footer();
