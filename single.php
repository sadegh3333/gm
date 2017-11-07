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
          <li><i class="ion-ios-home icon"></i> <a href="<?php echo home_url(); ?>">خانه</a></li>
          <li>
            <?php
            $category = get_the_category();
            $firstCategory = $category[0]->cat_name;
            ?>
            <a href="<?php echo home_url(); ?>/?cat=<?php echo $category[0]->term_id; ?>">
              <?php
              echo $firstCategory;
              ?>
            </a>
          </li>
          <li class="active"><?php echo the_title(); ?></li>
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
              <div class="col-sm-16 rtl">
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
                          <div class="time"><span class="ion-android-data icon"></span><?php  the_time('j F Y '); ?></div>
                          <div class="comments"><span class="ion-chatbubbles icon"></span><?php $comments_number = get_comments_number(); echo $comments_number; ?></div>
                        </div>
                        <p>
                          <?php echo the_content(); ?>
                        </p>
                        <hr>
                      </div>
                    </div>
                  </div>

                <div class="col-sm-16 related">
                  <div class="main-title-outer pull-left">
                    <div class="main-title">مطالب مشابه</div>
                  </div>
                  <div class="row">

                    <?php
                    $categories = get_the_category();
                    $catid  = $category[0]->cat_ID;

                    $make_query_related_post = array(
                      'cat' => $catid,
                      'orderby' => 'rand',
                      'showposts' => 3,
                    );
                    $querysamepost = new WP_Query($make_query_related_post);
                    if($querysamepost->have_posts()):
                      while($querysamepost->have_posts()):
                        $querysamepost->the_post();
                        ?>
                        <div class="item topic col-sm-5 col-xs-16">
                          <a href="<?php echo the_permalink(); ?>">
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
                            <!-- <img class="img-thumbnail" src="images/sec/sec-1.jpg" width="1000" height="606" alt=""/> -->
                            <h4><?php echo the_title(); ?></h4>
                            <div class="text-danger sub-info-bordered remove-borders">
                              <div class="time"><span class="ion-android-data icon"></span><?php  the_time('j F Y '); ?></div>
                              <div class="comments"><span class="ion-chatbubbles icon"></span><?php $comments_number = get_comments_number(); echo $comments_number; ?></div>
                            </div>
                          </a>
                        </div>

                      <?php endwhile; endif; wp_reset_query(); ?>
                    </div>
                  </div>


                  <?php comments_template(); ?>


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
