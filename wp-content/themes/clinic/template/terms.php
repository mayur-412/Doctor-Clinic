<?php
/**
 * Template Name: Terms page
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
  $terms_label = get_field('terms_label');
  $tersm_title = get_field('tersm_title');
  $terms_desc = get_field('terms_desc');
  $terms_box = get_field('terms_box');
  ?>

	<!-- Terms Of Service Section -->
 <section id="terms-of-service" class="terms-of-service section">

	<div class="container" data-aos="fade-up">
	<!-- Page Header -->
	<div class="tos-header text-center" data-aos="fade-up">
	  <span class="last-updated"><?php echo $terms_label; ?></span>
	  <h2><?php echo $tersm_title; ?></h2>
	  <p><?php echo $terms_desc; ?></p>
	</div>

	<!-- Content -->
	<div class="tos-content" data-aos="fade-up" data-aos-delay="200">
	 <?php foreach ($terms_box as $terms) {
	 	$sub_title = $terms['sub_title'];
	 	$sub_desc = $terms['sub_desc'];
	 	$info_icon = $terms['info_icon'];
	 	$info_desc = $terms['info_desc'];
	 	$class_name = $terms['class_name'];
	 	$list_class = $terms['list_class'];
	 	$list_label = $terms['list_label'];
	 	$list_item = $terms['list_item'];
	 	$notice_title = $terms['notice_title'];
	 	$notic_desc = $terms['notic_desc'];
	 	$pro_hibit = $terms['pro_hibit'];
	 	
	 	?> <div id="agreement" class="content-section">
	    <h3><?php echo $sub_title; ?></h3>
	    <p><?php echo $sub_desc; ?></p>
	    <?php if(!empty($pro_hibit)){ ?>
	    	<div class="prohibited-list">
	    	 <?php foreach ($pro_hibit as $hibit) {
	    	 	$pro_label = $hibit['pro_label'];
	    	 	?> <div class="prohibited-item">
	        <i class="bi bi-x-circle"></i>
	        <span><?php echo $pro_label; ?></span>
	      </div> <?php
	    	 } ?>
	      
	    </div>
	    <?php } ?>
       <?php if(!empty($notice_title)) { ?>
       	<div class="alert-box">
	      <i class="bi bi-exclamation-triangle"></i>
	      <div class="alert-content">
	        <h5><?php echo $notice_title; ?></h5>
	        <p><?php echo $notic_desc; ?></p>
	      </div>
	    </div>
        <?php } ?>  
	    <?php if(!empty($class_name)){ ?>
	    <div class="<?php echo $class_name; ?>">
	      <i class="<?php echo $info_icon; ?>"></i>
	      <p><?php echo $info_desc; ?></p>
	    </div><?php } ?>
	    <?php if(!empty($list_class)){ ?> 
	   <div class="<?php echo $list_class; ?>">
	   	<?php if(!empty($list_label)){ ?> <p><?php echo $list_label; ?></p> <?php } ?>
	     <ul>
	     	<?php foreach ($list_item as $list) {
	     		$list_text = $list['list_text'];
	     		?> <li><?php echo $list_text; ?></li> <?php
	     	} ?>
	     </ul>
	   </div> <?php } ?>
	  </div> <?php
	 } ?>

	</div>

 </section><!-- /Terms Of Service Section -->

</main>

<?php
get_footer();
