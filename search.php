<?php get_header(); ?>





<div class="container rtl">

  <!-- bage header start -->
  <div class="page-header">
    <h1> صفحه جستجو </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo home_url(); ?>">
        <i class="icon ion-ios-home"></i>
        خانه
      </a></li>
      <li class="active"><?php echo $_GET['s']; ?></li>
    </ol>
  </div>

  <!-- bage header end -->

</div>

<!-- data start -->
<section>
  <div class="container ">
    <div class="row ">

      <!-- right sec Start -->
      <?php get_sidebar(); ?>
      <!-- Right Sec End -->


      <!-- left sec start -->
      <div class="col-md-11 col-sm-11 rtl">
        <div class="row">
          <div class="col-sm-16">
            <?php
            /* Search Count */
            $allsearch = new WP_Query("s=$s&showposts=-1");
            $count_post_found = $allsearch->post_count;
            wp_reset_query();
            ?>
            <h3><span class="text-danger"><?php echo $count_post_found; ?> مطلب یافت شده</span></h3>
            <hr>
          </div>

          <?php
          if(have_posts()){
            while(have_posts()):
              the_post();
              ?>
              <div class="sec-topic col-sm-16 wow fadeInDown animated " data-wow-delay="0.5s">
                <div class="row">
                  <div class="col-sm-9">
                    <a href="<?php echo the_permalink(); ?>">
                      <div class="sec-info">
                        <h3><?php echo the_title(); ?></h3>
                        <div class="text-danger sub-info-bordered">
                          <div class="time"><span class="ion-android-data icon"></span> <?php  the_time('j F Y '); ?></div>
                          <div class="comments"><span class="ion-chatbubbles icon"></span><?php $comments_number = get_comments_number(); echo $comments_number; ?></div>
                        </div>
                      </div>
                    </a>
                    <p>
                      <?php echo the_excerpt(); ?>
                    </p>
                  </div>
                  <div class="col-sm-7">
                    <?php
                    if ( has_post_thumbnail() ) {
                      the_post_thumbnail('full', array( 'class' => 'img-thumbnail' , 'width' => '1000' , 'height' => '606' ));
                    }
                    ?>
                  </div>
                  <!-- <img width="1000" height="606" alt="" src="images/sec/sec-1.jpg" class="img-thumbnail"></div> -->

                </div>
              </div>
            <?php endwhile; }else{ ?>

              <div class="col-sm-16">
                متسفانه موضوعی که به دنبال آن بودید یافت نشد.
                <h5>
                  <a href="<?php echo home_url(); ?>"><i class="icon ion-ios-home"></i> بازگشت به خانه </a>
                </h5>
              </div>
              <?php } ?>
              <div class="col-sm-16">
                <hr>
                <?php wpbeginner_numeric_posts_nav(); ?>
              </div>
            </div>
          </div>
          <!-- left sec end -->





        </div>
      </div>
    </section>
    <!-- data end -->












    <?php get_footer(); ?>
