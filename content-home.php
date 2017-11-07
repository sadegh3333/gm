<!-- data start -->

<div class="container ">
  <div class="row ">

    <!-- left sec start -->
    <?php get_sidebar(); ?>
    <!-- left sec end -->

    <!-- right sec start -->
    <div class="col-md-11 col-sm-11">
      <div class="row">
        <!--Recent videos start-->
        <div class="col-sm-16 recent-vid wow fadeInDown animated " data-wow-delay="0.5s" data-wow-offset="50">
          <div class="main-title-outer pull-left">
            <div class="main-title"> نمونه دوبله </div>

          </div>
          <div class="row">
            <div class="col-sm-5 col-xs-2"> <!-- required for floating -->
              <!-- Nav tabs -->
              <ul class="nav nav-tabs tabs-right hidden-xs">
                <?php
                $count = 1;
                $query_get_recent_post = array(
                  'cat' => 22,
                  'showposts' => 3,
                  'offset' => 0,
                );
                $get_recent_psot = new WP_Query($query_get_recent_post);
                if($get_recent_psot->have_posts()):
                  while($get_recent_psot->have_posts()):
                    $get_recent_psot->the_post();
                    ?>
                    <li class="<?php if($count == 1 )echo 'active'; ?>">
                      <a data-toggle="tab" href="#vid-<?php echo $count; ?>">
                        <div class="vid-thumb">
                          <div class="vid-box"><span class="ion-eye"></span>
                            <?php
                            $get_img = get_field('img_234*87');
                            ?>
                            <img class="img-thumbnail" src="<?php echo $get_img['url']; ?>" width="234" height="87" alt=""/> </div>
                          </div>
                        </a>
                      </li>
                      <?php $count++; endwhile; endif; ?>

                    </ul>
                  </div>
                  <div class="col-sm-11 col-xs-16">
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <?php
                      $count = 1;
                      $query_get_recent_post = array(
                        'cat' => 22,
                        'showposts' => 3,
                        'offset' => 0,
                      );
                      $get_recent_psot = new WP_Query($query_get_recent_post);
                      if($get_recent_psot->have_posts()):
                        while($get_recent_psot->have_posts()):
                          $get_recent_psot->the_post();
                          ?>
                          <div id="vid-<?php echo $count; ?>" class="tab-pane embed-responsive embed-responsive-16by9 <?php if($count == 1 )echo 'active'; ?>">
                            <?php
                            $get_img = get_field('img_534*300');
                            ?>
                            <img src="<?php echo $get_img['url']; ?>" height="300" width="534" alt="<?php echo $get_img['title']; ?>"/>
                            <!-- <img src="http://hostlink.ir/wp-content/uploads/2017/05/14073116_511190642420094_2082096068_n.jpg" alt=""> -->
                          </div>
                          <?php $count++; endwhile; endif; ?>
                        </div>
                      </div>
                    </div>
                    <hr>
                  </div>
                </div>
                <!--Recent videos end-->

                <!-- news-studio start -->
                <div class="col-sm-16 business  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="50">
                  <div class="main-title-outer pull-left">
                    <div class="main-title">اخبار استودیو</div>

                  </div>
                  <div class="row">
                    <div class="col-md-11 col-sm-16">
                      <div class="row">
                        <div class="col-md-8 col-sm-9 col-xs-16">
                          <?php
                          $count = 0;
                          $query_get_recent_post = array(
                            'cat' => 51,
                            'showposts' => 1,
                            'offset' => 0,
                          );
                          $get_recent_psot = new WP_Query($query_get_recent_post);
                          if($get_recent_psot->have_posts()):
                            while($get_recent_psot->have_posts()):
                              $get_recent_psot->the_post();
                              ?>
                              <div class="topic rtl">
                                <a href="<?php echo the_permalink(); ?>">
                                  <?php
                                  if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('full', array( 'class' => 'img-thumbnail' , 'width' => '600' , 'height' => '398' ));
                                  }else {
                                    ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/images/MA.jpg" alt="<?php the_title(); ?>" />
                                    <?php
                                  }
                                  ?>
                                  <h3><?php echo the_title(); ?></h3>
                                  <div class="text-danger sub-info-bordered">
                                  </div>
                                </a>
                                <p class="justify"><?php echo limited_excerpt(get_the_excerpt(),50); ?></p>
                              </div>
                            <?php endwhile; endif; ?>

                          </div>
                          <div class="col-md-8 col-sm-7 col-xs-16">
                            <ul class="list-unstyled rtl">

                              <?php
                              $count = 0;
                              $query_get_recent_post = array(
                                'cat' => 51,
                                'showposts' => 3,
                                'offset' => 1,
                              );
                              $get_recent_psot = new WP_Query($query_get_recent_post);
                              if($get_recent_psot->have_posts()):
                                while($get_recent_psot->have_posts()):
                                  $get_recent_psot->the_post();
                                  ?>

                                  <li> <a href="<?php echo the_permalink(); ?>">
                                    <div class="row">
                                      <div class="col-sm-16 col-md-16 col-lg-11">
                                        <h4><?php echo the_title(); ?></h4>
                                        <div class="text-danger sub-info">
                                          <p class="justify"><?php echo limitwords(get_the_excerpt(),16); ?></p>
                                        </div>
                                      </div>
                                      <div class="col-sm-5 hidden-sm hidden-md">
                                        <?php
                                        if ( has_post_thumbnail() ) {
                                          the_post_thumbnail('full', array( 'class' => 'img-thumbnail' , 'width' => '76' , 'height' => '76' ));
                                        }else {
                                          ?>
                                          <img src="<?php bloginfo('template_directory'); ?>/images/MA.jpg" alt="<?php the_title(); ?>" />
                                          <?php
                                        }
                                        ?>
                                      </div>
                                      <!-- <img class="img-thumbnail pull-left" src="images/business/business-th-1.jpg" width="76" height="76" alt=""/> </div> -->
                                    </div>
                                  </a>
                                </li>
                              <?php endwhile; endif; ?>

                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5 col-sm-16 hidden-sm hidden-xs  left-bordered">
                        <div id="vid-thumbs" class="owl-carousel">
                          <div class="item">
                            <div class="vid-thumb-outer">
                              <?php
                              $count = 0;
                              $query_get_recent_post = array(
                                'cat' => 51,
                                'showposts' => 2,
                                'offset' => 2,
                              );
                              $get_recent_psot = new WP_Query($query_get_recent_post);
                              if($get_recent_psot->have_posts()):
                                while($get_recent_psot->have_posts()):
                                  $get_recent_psot->the_post();
                                  ?>

                                  <div class="vid-thumb rtl">
                                    <a  href="<?php echo the_permalink(); ?>">
                                      <div class="vid-box">
                                        <span class="ion-ios7-film"></span>
                                        <?php
                                        if ( has_post_thumbnail() ) {
                                          the_post_thumbnail('full', array( 'class' => 'img-thumbnail img-responsive' , 'width' => '250' , 'height' => '143' ));
                                        }else {
                                          ?>
                                          <img src="<?php bloginfo('template_directory'); ?>/images/MA.jpg" alt="<?php the_title(); ?>" />
                                          <?php
                                        }
                                        ?>
                                      </div>
                                      <h4><?php echo the_title(); ?></h4>
                                    </a>
                                  </div>

                                <?php endwhile; endif; ?>

                              </div>
                            </div>
                            <div class="item">
                              <div class="vid-thumb-outer">

                                <?php
                                $count = 0;
                                $query_get_recent_post = array(
                                  'cat' => 51,
                                  'showposts' => 2,
                                  'offset' => 4,
                                );
                                $get_recent_psot = new WP_Query($query_get_recent_post);
                                if($get_recent_psot->have_posts()):
                                  while($get_recent_psot->have_posts()):
                                    $get_recent_psot->the_post();
                                    ?>

                                    <div class="vid-thumb rtl">
                                      <a  href="<?php echo the_permalink(); ?>">
                                        <div class="vid-box">
                                          <span class="ion-ios7-film"></span>
                                          <?php
                                          if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('full', array( 'class' => 'img-thumbnail img-responsive' , 'width' => '250' , 'height' => '143' ));
                                          }else {
                                            ?>
                                            <img src="<?php bloginfo('template_directory'); ?>/images/MA.jpg" alt="<?php the_title(); ?>" />
                                            <?php
                                          }
                                          ?>
                                        </div>
                                        <h4><?php echo the_title(); ?></h4>
                                      </a>
                                    </div>

                                  <?php endwhile; endif; ?>


                                </div>
                              </div>
                              <div class="item">
                                <div class="vid-thumb-outer">

                                  <?php
                                  $count = 0;
                                  $query_get_recent_post = array(
                                    'cat' => 51,
                                    'showposts' => 2,
                                    'offset' => 6,
                                  );
                                  $get_recent_psot = new WP_Query($query_get_recent_post);
                                  if($get_recent_psot->have_posts()):
                                    while($get_recent_psot->have_posts()):
                                      $get_recent_psot->the_post();
                                      ?>

                                      <div class="vid-thumb rtl">
                                        <a  href="<?php echo the_permalink(); ?>">
                                          <div class="vid-box">
                                            <span class="ion-ios7-film"></span>
                                            <?php
                                            if ( has_post_thumbnail() ) {
                                              the_post_thumbnail('full', array( 'class' => 'img-thumbnail img-responsive' , 'width' => '250' , 'height' => '143' ));
                                            }else {
                                              ?>
                                              <img src="<?php bloginfo('template_directory'); ?>/images/MA.jpg" alt="<?php the_title(); ?>" />
                                              <?php
                                            }
                                            ?>
                                          </div>
                                          <h4><?php echo the_title(); ?></h4>
                                        </a>
                                      </div>

                                    <?php endwhile; endif; ?>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <hr>
                        </div>
                        <!-- news-studio end -->
                        <!-- Begin Section Great-voice and voice recorder -->
                        <div class="col-sm-16">
                          <div class="row">
                            <!-- Great-voice start -->
                            <div class="col-xs-16 col-sm-8  wow fadeInLeft animated science" data-wow-delay="0.5s" data-wow-offset="130">
                              <div class="main-title-outer pull-left">
                                <div class="main-title">صداهای ماندگار</div>

                              </div>
                              <div class="row">
                                <?php
                                $query_voice_recorder_big = array(
                                  'cat' => 53,
                                  'showposts' => 1,
                                );
                                $get_post_voice_recorder_big = new WP_Query($query_voice_recorder_big);
                                if($get_post_voice_recorder_big->have_posts()):
                                  while($get_post_voice_recorder_big->have_posts()):
                                    $get_post_voice_recorder_big->the_post();
                                    ?>
                                    <div class="topic col-sm-16 rtl">
                                      <a href="<?php echo the_permalink(); ?>">
                                        <?php
                                        if ( has_post_thumbnail() ) {
                                          the_post_thumbnail('full', array( 'class' => 'img-thumbnail' , 'width' => '600' , 'height' => '227' ));
                                        }else {
                                          ?>
                                          <img src="<?php bloginfo('template_directory'); ?>/images/MA.jpg" alt="<?php the_title(); ?>" />
                                          <?php
                                        }
                                        ?>
                                        <h3><?php echo the_title(); ?></h3>
                                        <div class="text-danger sub-info-bordered">
                                        </div>
                                      </a>
                                      <p class="justify">
                                        <?php echo limited_excerpt(get_the_excerpt(),55); ?>
                                      </p>
                                    </div>
                                  <?php endwhile; endif; ?>
                                  <div class="col-sm-16">
                                    <ul class="list-unstyled  top-bordered ex-top-padding">
                                      <?php
                                      $query_voice_recorder_big = array(
                                        'cat' => 53,
                                        'showposts' => 2,
                                        'offset' => 1,
                                      );
                                      $get_post_voice_recorder_big = new WP_Query($query_voice_recorder_big);
                                      if($get_post_voice_recorder_big->have_posts()):
                                        while($get_post_voice_recorder_big->have_posts()):
                                          $get_post_voice_recorder_big->the_post();
                                          ?>
                                          <li class="rtl txt-right">
                                            <a href="<?php echo the_permalink(); ?>">
                                              <div class="row">
                                                <div class="col-lg-13 col-md-12">
                                                  <h4> <?php echo the_title(); ?> </h4>
                                                  <div class="text-danger sub-info">
                                                  </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 hidden-sm  ">
                                                  <?php
                                                  if ( has_post_thumbnail() ) {
                                                    the_post_thumbnail('thumbnail', array( 'class' => 'img-thumbnail pull-left' , 'width' => '76' , 'height' => '76' ));
                                                  }else {
                                                    ?>
                                                    <img src="<?php bloginfo('template_directory'); ?>/images/MA.jpg" alt="<?php the_title(); ?>" />
                                                    <?php
                                                  }
                                                  ?>
                                                </div>
                                              </div>
                                            </a>
                                            <p class="justify">
                                              <?php echo limited_excerpt(get_the_excerpt(),12);  ?>
                                            </p>
                                          </li>
                                        <?php endwhile; endif; ?>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                <!-- Great-voice End -->
                                <!-- Begin voice recorder -->
                                <div class="col-sm-8 col-xs-16 wow fadeInRight animated" data-wow-delay="0.5s" data-wow-offset="130">
                                  <div class="main-title-outer pull-left">
                                    <div class="main-title">صدابرداری</div>

                                  </div>
                                  <div class="row left-bordered">
                                    <?php
                                    $query_voice_recorder_big = array(
                                      'cat' => 55,
                                      'showposts' => 1,
                                    );
                                    $get_post_voice_recorder_big = new WP_Query($query_voice_recorder_big);
                                    if($get_post_voice_recorder_big->have_posts()):
                                      while($get_post_voice_recorder_big->have_posts()):
                                        $get_post_voice_recorder_big->the_post();
                                        ?>
                                        <div class="topic col-sm-16 rtl">
                                          <a href="<?php echo the_permalink(); ?>">
                                            <?php
                                            if ( has_post_thumbnail() ) {
                                              the_post_thumbnail('full', array( 'class' => 'img-thumbnail' , 'width' => '600' , 'height' => '227' ));
                                            }else {
                                              ?>
                                              <img src="<?php bloginfo('template_directory'); ?>/images/MA.jpg" alt="<?php the_title(); ?>" />
                                              <?php
                                            }
                                            ?>
                                            <h3><?php echo the_title(); ?></h3>
                                            <div class="text-danger sub-info-bordered">
                                            </div>
                                          </a>
                                          <p class="justify">
                                            <?php echo limited_excerpt(get_the_excerpt(),55);  ?>
                                          </p>
                                        </div>
                                      <?php endwhile; endif; ?>
                                      <div class="col-sm-16">
                                        <ul class="list-unstyled top-bordered ex-top-padding">
                                          <?php
                                          $query_voice_recorder_big = array(
                                            'cat' => 55,
                                            'showposts' => 2,
                                            'offset' => 1,
                                          );
                                          $get_post_voice_recorder_big = new WP_Query($query_voice_recorder_big);
                                          if($get_post_voice_recorder_big->have_posts()):
                                            while($get_post_voice_recorder_big->have_posts()):
                                              $get_post_voice_recorder_big->the_post();
                                              ?>
                                              <li class="rtl txt-right">
                                                <a href="<?php echo the_permalink(); ?>">
                                                  <div class="row">
                                                    <div class="col-lg-13 col-md-12">
                                                      <h4> <?php echo the_title(); ?> </h4>
                                                      <div class="text-danger sub-info">
                                                      </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-4 hidden-sm  ">
                                                      <?php
                                                      if ( has_post_thumbnail() ) {
                                                        the_post_thumbnail('thumbnail', array( 'class' => 'img-thumbnail pull-left' , 'width' => '76' , 'height' => '76' ));
                                                      }else {
                                                        ?>
                                                        <img src="<?php bloginfo('template_directory'); ?>/images/MA.jpg" alt="<?php the_title(); ?>" />
                                                        <?php
                                                      }
                                                      ?>
                                                    </div>
                                                  </div>
                                                </a>
                                                <p class="justify">
                                                  <?php echo limited_excerpt(get_the_excerpt(),12);  ?>
                                                </p>
                                              </li>
                                            <?php endwhile; endif; ?>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end Voice Recorder -->
                                  </div>
                                  <hr>
                                </div>
                                <!-- End Section Great-voice and voice recorder -->













                                <!-- Begin Section latest-animation and history-double -->
                                <div class="col-sm-16">
                                  <div class="row">
                                    <!-- latest-animation start -->
                                    <div class="col-xs-16 col-sm-8  wow fadeInLeft animated science" data-wow-delay="0.5s" data-wow-offset="130">
                                      <div class="main-title-outer pull-left">
                                        <div class="main-title"> تازه های انیمیشن </div>

                                      </div>
                                      <div class="row">
                                        <?php
                                        $query_voice_recorder_big = array(
                                          'cat' => 54,
                                          'showposts' => 1,
                                        );
                                        $get_post_voice_recorder_big = new WP_Query($query_voice_recorder_big);
                                        if($get_post_voice_recorder_big->have_posts()):
                                          while($get_post_voice_recorder_big->have_posts()):
                                            $get_post_voice_recorder_big->the_post();
                                            ?>
                                            <div class="topic col-sm-16 rtl">
                                              <a href="<?php echo the_permalink(); ?>">
                                                <?php
                                                if ( has_post_thumbnail() ) {
                                                  the_post_thumbnail('full', array( 'class' => 'img-thumbnail' , 'width' => '600' , 'height' => '227' ));
                                                }else {
                                                  ?>
                                                  <img src="<?php bloginfo('template_directory'); ?>/images/MA.jpg" alt="<?php the_title(); ?>" />
                                                  <?php
                                                }
                                                ?>
                                                <h3><?php echo the_title(); ?></h3>
                                                <div class="text-danger sub-info-bordered">
                                                </div>
                                              </a>
                                              <p class="justify">
                                                <?php echo limited_excerpt(get_the_excerpt(),55);  ?>
                                              </p>
                                            </div>
                                          <?php endwhile; endif; ?>
                                          <div class="col-sm-16">
                                            <ul class="list-unstyled  top-bordered ex-top-padding">
                                              <?php
                                              $query_voice_recorder_big = array(
                                                'cat' => 54,
                                                'showposts' => 2,
                                                'offset' => 1,
                                              );
                                              $get_post_voice_recorder_big = new WP_Query($query_voice_recorder_big);
                                              if($get_post_voice_recorder_big->have_posts()):
                                                while($get_post_voice_recorder_big->have_posts()):
                                                  $get_post_voice_recorder_big->the_post();
                                                  ?>
                                                  <li class="rtl txt-right">
                                                    <a href="<?php echo the_permalink(); ?>">
                                                      <div class="row">
                                                        <div class="col-lg-13 col-md-12">
                                                          <h4> <?php echo the_title(); ?> </h4>
                                                          <div class="text-danger sub-info">
                                                          </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 hidden-sm  ">
                                                          <?php
                                                          if ( has_post_thumbnail() ) {
                                                            the_post_thumbnail('thumbnail', array( 'class' => 'img-thumbnail pull-left' , 'width' => '76' , 'height' => '76' ));
                                                          }else {
                                                            ?>
                                                            <img src="<?php bloginfo('template_directory'); ?>/images/MA.jpg" alt="<?php the_title(); ?>" />
                                                            <?php
                                                          }
                                                          ?>
                                                        </div>
                                                      </div>
                                                    </a>
                                                    <p class="justify">
                                                      <?php echo limited_excerpt(get_the_excerpt(),12);  ?>
                                                    </p>
                                                  </li>
                                                <?php endwhile; endif; ?>
                                              </ul>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- latest-animation end -->
                                        <!-- Begin history-double -->
                                        <div class="col-sm-8 col-xs-16 wow fadeInRight animated" data-wow-delay="0.5s" data-wow-offset="130">
                                          <div class="main-title-outer pull-left">
                                            <div class="main-title"> تاریخچه دوبله </div>

                                          </div>
                                          <div class="row left-bordered">
                                            <?php
                                            $query_voice_recorder_big = array(
                                              'cat' => 56,
                                              'showposts' => 1,
                                            );
                                            $get_post_voice_recorder_big = new WP_Query($query_voice_recorder_big);
                                            if($get_post_voice_recorder_big->have_posts()):
                                              while($get_post_voice_recorder_big->have_posts()):
                                                $get_post_voice_recorder_big->the_post();
                                                ?>
                                                <div class="topic col-sm-16 rtl">
                                                  <a href="<?php echo the_permalink(); ?>">
                                                    <?php
                                                    if ( has_post_thumbnail() ) {
                                                      the_post_thumbnail('full', array( 'class' => 'img-thumbnail' , 'width' => '600' , 'height' => '227' ));
                                                    }else {
                                                      ?>
                                                      <img src="<?php bloginfo('template_directory'); ?>/images/MA.jpg" alt="<?php the_title(); ?>" />
                                                      <?php
                                                    }
                                                    ?>
                                                    <h3><?php echo the_title(); ?></h3>
                                                    <div class="text-danger sub-info-bordered">
                                                    </div>
                                                  </a>
                                                  <p class="justify">
                                                    <?php echo limited_excerpt(get_the_excerpt(),55);  ?>
                                                  </p>
                                                </div>
                                              <?php endwhile; endif; ?>
                                              <div class="col-sm-16">
                                                <ul class="list-unstyled top-bordered ex-top-padding">
                                                  <?php
                                                  $query_voice_recorder_big = array(
                                                    'cat' => 56,
                                                    'showposts' => 2,
                                                    'offset' => 1,
                                                  );
                                                  $get_post_voice_recorder_big = new WP_Query($query_voice_recorder_big);
                                                  if($get_post_voice_recorder_big->have_posts()):
                                                    while($get_post_voice_recorder_big->have_posts()):
                                                      $get_post_voice_recorder_big->the_post();
                                                      ?>
                                                      <li class="rtl txt-right">
                                                        <a href="<?php echo the_permalink(); ?>">
                                                          <div class="row">
                                                            <div class="col-lg-13 col-md-12">
                                                              <h4> <?php echo the_title(); ?> </h4>
                                                              <div class="text-danger sub-info justify">
                                                                <p><?php echo limited_excerpt(get_the_excerpt(),12); ?></p>
                                                              </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-4 hidden-sm  ">
                                                              <?php
                                                              if ( has_post_thumbnail() ) {
                                                                the_post_thumbnail('thumbnail', array( 'class' => 'img-thumbnail pull-left' , 'width' => '76' , 'height' => '76' ));
                                                              }else {
                                                                ?>
                                                                <img src="<?php bloginfo('template_directory'); ?>/images/MA.jpg" alt="<?php the_title(); ?>" />
                                                                <?php
                                                              }
                                                              ?>
                                                              <!-- <img width="76" height="76" alt="" src="images/travel/travel-th-1.jpg" class="img-thumbnail pull-left"> -->
                                                            </div>
                                                          </div>
                                                        </a>
                                                      </li>
                                                    <?php endwhile; endif; ?>
                                                  </ul>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- end history-double -->
                                          </div>
                                          <hr>
                                        </div>
                                        <!-- End Section latest-animation and history-double -->





















                                      </div>
                                    </div>
                                    <!-- right sec end -->

                                  </div>
                                </div>
                                <!-- data end -->
                              </div>
