<!-- Footer start -->
<footer>
  <div class="top-sec">
    <div class="container ">
      <div class="row match-height-container">
        <!-- Begin Latest post -->
        <div class="col-sm-5 recent-posts  wow fadeInDown animated text-right" data-wow-delay="1s" data-wow-offset="40">
          <div class="f-title">آخرین مطالب منتشر شده </div>
          <ul class="list-unstyled ">
            <?php
            $get_latest_post = array(
              'showposts' =>3,
            );
            $latest_post = new WP_Query($get_latest_post);
            // print_r($latest_news);
            if($latest_post->have_posts()):
              while ($latest_post->have_posts()):
                $latest_post->the_post();
                ?>
                <li>
                  <a href="<?php echo the_permalink(); ?>">
                    <div class="row">
                      <div class="col-sm-12">
                        <h4> <?php echo the_title(); ?> </h4>
                        <div class="f-sub-info">
                          <p><?php echo limitwords(get_the_excerpt(),12); ?></p>
                          <!-- <div class="time"><span class="ion-android-data icon"></span> <?php the_time('F j, Y'); ?></div>
                          <div class="comments"><span class="ion-chatbubbles icon"></span><?php echo get_comments_number(    );  ?></div> -->
                          <!-- <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div> -->
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <?php
                        if ( has_post_thumbnail() ) {
                          the_post_thumbnail('thumbnail', array( 'class' => 'img-thumbnail pull-left' , 'width' => '70' , 'height' => '70' ));
                        }else {
                          ?>
                          <img src="<?php bloginfo('template_directory'); ?>/images/MA.jpg" alt="<?php the_title(); ?>" />
                          <?php
                        }
                        ?>
                      </div>
                    </div>
                  </a>
                </li>
              <?php endwhile; endif; ?>

            </ul>
          </div>
          <!-- End Latest Post -->
          <!-- Begin Tags Cloud  -->
          <div class="col-sm-5 popular-tags  wow fadeInDown animated text-right" data-wow-delay="1s" data-wow-offset="40">
            <div class="f-title">برچسب های محبوب</div>
            <ul class="tags list-unstyled pull-right">
              <?php
              $all_tags =  wp_tag_cloud('format=array&smallest=0&number=15');
              // print_r($all_tags);
              foreach ($all_tags as $key) {
                ?>
                <li>
                  <?php echo $key; ?>
                </li>
                <?php
              }
              ?>
            </ul>
          </div>
          <!-- End Tags Cloud -->

          <!-- Begin NewsLetter -->
          <div class="col-sm-6 subscribe-info wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
            <div class="row">
              <div class="col-sm-16">
                <div class="f-title"> اولین نفری باشید که از خبرها مطلع می شوید. </div>
                <p>
                  از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است. از آنجایی که طراحان عموما نویسنده متن نیستند و وظیفه رعایت حق تکثیر متون را ندارند و در همان حال
                </p>
              </div>
              <div class="col-sm-16">

                <div class="f-title">عضویت در خبرنامه</div>
                <form class="form-inline" method="post" action="<?php echo home_url(); ?>/?na=s" onsubmit="return newsletter_check(this)">
                  <input type="email" class="form-control" id="input-email" name="ne" placeholder="آدرس ایمیل تان را وارد کنید" required>
                  <button type="submit" class="btn" value="Subscribe"> <span class="ion-paper-airplane text-danger"></span> </button>
                </form>

                <!-- <div class="f-title">عضویت در خبرنامه</div>
                <form class="form-inline">
                <input type="email" class="form-control" id="input-email" placeholder="آدرس ایمیل تان را وارد کنید">
                <button type="submit" class="btn"> <span class="ion-paper-airplane text-danger"></span> </button>
              </form> -->
            </div>
          </div>
        </div>
        <!-- End NewsLetter -->
      </div>
    </div>
  </div>
  <div class="btm-sec">
    <div class="container">
      <div class="row">
        <div class="col-sm-16">
          <div class="row">
            <div class="col-sm-6 col-xs-16 copyrights text-left wow fadeInDown animated" data-wow-delay="0.5s" data-wow-offset="10">
              تمامی حقوق محفوط و متعلق می باشد به استودیو صدابرداری گُـدار
              <span class="glyphicon glyphicon-copyright-mark"></span>
              1396
            </div>
            <div class="col-sm-10 col-xs-16 f-nav wow fadeInDown animated text-right" data-wow-delay="0.5s" data-wow-offset="10">
              <ul class="list-inline float-sub-right ">
                <?php
                // Get Footer Menu
                wp_nav_menu(array(
                  'theme_location'  => 'footer-menu',
                  'menu'            => '',
                  'container'       => 'false',
                  'container_class' => false,
                  'container_id'    => '',
                  'menu_class'      => '',
                  'menu_id'         => '',
                  'echo'            => true,
                  'fallback_cb'     => 'wp_page_menu',
                  'before'          => '',
                  'after'           => '',
                  'link_before'     => '',
                  'link_after'      => '',
                  'items_wrap'      => '%3$s',
                  'depth'           => 0,
                ));
                ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-16 f-social  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="10">
          <ul class="list-inline">
            <li> <a href="#"><span class="ion-social-twitter"></span></a> </li>
            <li> <a href="#"><span class="ion-social-facebook"></span></a> </li>
            <li> <a href="#"><span class="ion-social-instagram"></span></a> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- Footer end -->


</div>
<!-- wrapper end -->

<!-- jQuery -->
<script src="<?php echo THEMEROOT; ?>/js/jquery.min.js"></script>
<!--jQuery easing-->
<script src="<?php echo THEMEROOT; ?>/js/jquery.easing.1.3.js"></script>
<!-- bootstrab js -->
<script src="<?php echo THEMEROOT; ?>/js/bootstrap.js"></script>
<!--style switcher-->
<script src="<?php echo THEMEROOT; ?>/js/style-switcher.js"></script> <!--wow animation-->
<script src="<?php echo THEMEROOT; ?>/js/wow.min.js"></script>
<!-- time and date -->
<script src="<?php echo THEMEROOT; ?>/js/moment.min.js"></script>
<!--news ticker-->
<script src="<?php echo THEMEROOT; ?>/js/jquery.ticker.js"></script>
<!-- owl carousel -->
<script src="<?php echo THEMEROOT; ?>/js/owl.carousel.js"></script>
<!-- magnific popup -->
<script src="<?php echo THEMEROOT; ?>/js/jquery.magnific-popup.js"></script>
<!-- weather -->
<script src="<?php echo THEMEROOT; ?>/js/jquery.simpleWeather.min.js"></script>
<!-- calendar-->
<script src="<?php echo THEMEROOT; ?>/js/jquery.pickmeup.js"></script>
<!-- go to top -->
<script src="<?php echo THEMEROOT; ?>/js/jquery.scrollUp.js"></script>
<!-- scroll bar -->
<script src="<?php echo THEMEROOT; ?>/js/jquery.nicescroll.js"></script>
<script src="<?php echo THEMEROOT; ?>/js/jquery.nicescroll.plus.js"></script>
<!--masonry-->
<script src="<?php echo THEMEROOT; ?>/js/masonry.pkgd.js"></script>
<!--media queries to js-->
<script src="<?php echo THEMEROOT; ?>/js/enquire.js"></script>
<!--custom functions-->
<script src="<?php echo THEMEROOT; ?>/js/custom-fun.js"></script>

<script type="text/javascript">
/* -------------------------------------------------------------------------*
* SETTING DATE AND TIME
* -------------------------------------------------------------------------*/
var datetime = null,
date = null;
var update = function() {
  date = moment(new Date())
  //  dddd, D MMMM  YYYY,
  datetime.html('<?php echo jdate('l, j F Y'); ?>' +' | '+ date.format('H:mm:ss'));
};
datetime = $('#time-date')
update();
setInterval(update, 1000);
</script>

<?php wp_footer(); ?>
</body>
</html>
