<?php
/**
 * Template Name: Testimonials page
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

    <!-- Featured Testimonials Section -->
    <section id="featured-testimonials" class="featured-testimonials section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="testimonials-14 swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 3,
              "spaceBetween": 24,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 16
                },
                "768": {
                  "slidesPerView": 2,
                  "spaceBetween": 24
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 24
                }
              }
            }
          </script>

          <div class="swiper-wrapper">

            <?php
            $testimonials_slide = get_field('testimonials_slide');
            foreach ($testimonials_slide as $slid_item) {
             $star_item = $slid_item['star_item'];
             $item_desc = $slid_item['item_desc'];
             $item_bg = $slid_item['item_bg'];
             $person_name = $slid_item['person_name'];
             $person_id = $slid_item['person_id'];
             ?> <!-- Testimonial Item 1 -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                	<?php foreach ($star_item as $star) {
                	 $star_icon = $star['star_icon'];
                	 ?> <i class="<?php echo $star_icon; ?>"></i> <?php
                	} ?>
                </div>
                <p><?php echo $item_desc; ?></p>
                <div class="profile">
                  <img src="<?php echo $item_bg; ?>" class="testimonial-img" alt="" loading="lazy">
                  <div class="info">
                    <h4><?php echo $person_name; ?> <i class="bi bi-patch-check-fill"></i></h4>
                    <span><?php echo $person_id; ?></span>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item --> <?php
            }
            ?>

          </div>

          <div class="swiper-pagination"></div>

        </div>

      </div>

    </section><!-- /Featured Testimonials Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">

         <?php
          $comment_box = get_field('comment_box');
          foreach ($comment_box as $comment) {
          	$date_delay = $comment['date_delay'];
          	$star_box = $comment['star_box'];
          	$comment_desc = $comment['comment_desc'];
          	$comment_bg = $comment['comment_bg'];
          	$man_name = $comment['man_name'];
          	$man_fild = $comment['man_fild'];
           ?> <!-- Testimonial Item 1 -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="<?php echo $date_delay; ?>">
            <div class="testimonial-item">
              <div class="stars">
              	<?php foreach ($star_box as $star_i) {
              	 $icon_star = $star_i['icon_star'];
              	 ?> <i class="<?php echo $icon_star; ?>"></i> <?php
              	} ?>
                
              </div>
              <p><?php echo $comment_desc; ?></p>
              <div class="testimonial-footer">
                <div class="testimonial-author">
                  <img src="<?php echo $comment_bg; ?>" alt="Author" class="img-fluid rounded-circle"
                    loading="lazy">
                  <div>
                    <h5><?php echo $man_name; ?></h5>
                    <span><?php echo $man_fild; ?></span>
                  </div>
                </div>
                <div class="quote-icon">
                  <i class="bi bi-quote"></i>
                </div>
              </div>
            </div>
          </div><!-- End Testimonial Item --> <?php
          }
         ?>

        </div>

      </div>

    </section><!-- /Testimonials Section -->

  </main>

<?php
get_footer();
