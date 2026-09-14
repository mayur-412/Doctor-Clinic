<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package clinic
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

<header id="header" class="header fixed-top">

 <div class="topbar d-flex align-items-center dark-background">
  <div class="container d-flex justify-content-center justify-content-md-between">
    <?php
    $mail_box = get_field('mail_box', 'option');
    foreach ($mail_box as $mail_b) {
      ?> <div class="contact-info d-flex align-items-center">
      <i class="<?php echo $mail_b['icon_mail']; ?> d-flex align-items-center"><a
          href="mailto:contact@example.com"><?php echo $mail_b['mail_tx']; ?></a></i>
      <i class="<?php echo $mail_b['phone_icon']; ?> d-flex align-items-center ms-4"><span>+<?php echo $mail_b['phone_no']; ?></span></i>
    </div> <?php
    }
    ?>
    <div class="social-links d-none d-md-flex align-items-center">
      <?php
      $header_media = get_field('header_media', 'option');
      foreach ($header_media as $social) {
        $media_link = $social['media_link'];
        $media_class = $social['media_class'];
        ?> <a href="<?php echo $media_link['url']; ?>" title="<?php echo $media_link['title']; ?>" class="<?php echo $media_class; ?>"><i class="bi bi-twitter-x"></i></a> <?php      }
      ?>
    </div>
  </div>
 </div><!-- End Top Bar -->

 <div class="branding d-flex align-items-cente">

  <div class="container position-relative d-flex align-items-center justify-content-between">
    <?php
    $header_logo = get_field('header_logo', 'option');
    $logo_link = get_field('logo_link', 'option');
    ?>
    <a href="<?php echo $logo_link['url']; ?>" title="<?php echo $logo_link['title']; ?>" class="logo d-flex align-items-center">
      <h1 class="sitename"><?php echo $header_logo; ?></h1>
    </a>

    <nav id="navmenu" class="navmenu">
	     <?php
		wp_nav_menu( array(
			'theme_location' => 'menu-1',
			'container'      => false,
			'menu_class'     => '',
			'fallback_cb'    => false,
			'walker'         => new Clinic_Navwalker(),
		) );
		?>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>

 </div>
</header>

