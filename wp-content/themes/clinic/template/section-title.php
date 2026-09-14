<?php
/**
 * Template Name: Section title
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

$heading_title = get_field('heading_title');
$heading_caption = get_field('heading_caption');
$heading_btn = get_field('heading_btn');
?>

<main class="main">

<!-- Page Title -->
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title"><?php echo $heading_title ?></h1>
          <p class="mb-0"><?php echo $heading_caption ?></p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <?php foreach ($heading_btn as $link_top) {
          $heading_link = $link_top['heading_link'];
          $link_class = $link_top['link_class'];
          ?> 
        <li class="<?php if(!empty($link_class)){ ?> <?php echo $link_class; ?> <?php } ?>"><a href="<?php echo $heading_link['url']; ?>" title="<?php echo $heading_link['title']; ?>" ><?php echo $heading_link['title']; ?></a></li> <?php
        } ?>
      </ol>
    </div>
  </nav>
</div><!-- End Page Title -->


</main>

<?php
