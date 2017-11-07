<?php get_header(); ?>


<?php
if(have_posts()):
  while (have_posts()):
    the_post();

    ?>

    <!-- bage header Start -->
    <div class="container rtl">
      <div class="page-header">
        <!-- <h1>Section Topic Details </h1> -->
        <ol class="breadcrumb">
        </ol>
      </div>
    </div>
    <!-- bage header End -->





    <!-- data Start -->
    <section>
      <div class="container ">
        <div class="row ">

          <!-- right sec Start -->
          <?php get_sidebar(); ?>
          <!-- Right Sec End -->

          <!-- left sec Start -->
          <div class="col-md-11 col-sm-11">
            <div class="row">
              <!-- post details start -->
              <div class="col-sm-16 rtl line-height">
                <div class="row">
                  <div class="sec-topic col-sm-16  wow fadeInDown animated " data-wow-delay="0.5s">
                    <div class="row">
                      <div class="col-sm-16">
                        <?php
                        if ( has_post_thumbnail() ) {
                          the_post_thumbnail('full',
                          array(
                            'class' => 'img-thumbnail' ,
                            'width' => '1000' ,
                            'height' => '606'
                          ));
                        }
                        ?>
                        <!-- <img width="1000" height="606" alt="" src="images/sec/sec-3.jpg" class="img-thumbnail"> -->
                      </div>
                      <div class="col-sm-16 sec-info">
                        <h3><?php echo the_title(); ?></h3>
                        <div class="text-danger sub-info-bordered">
                          <?php if (get_field('show_date')): ?>
                            <div class="time">
                              <span class="ion-android-data icon"></span><?php the_time(__('j F, Y')) ?> <?php _e('ساعت'); ?> <?php the_time() ?>
                            </div>
                          <?php endif; ?>
                        </div>
                        <p>
                          <?php echo the_content(); ?>
                        </p>
                        <hr>
                      </div>
                    </div>
                  </div>



                </div>
              </div>
              <!-- post details end -->

            </div>
          </div>
          <!-- left sec End -->

        </div>
      </div>
    </section>
    <!-- Data End -->

  <?php endwhile; endif; ?>

  <?php get_footer(); ?>
