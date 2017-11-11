<div class="col-sm-5 hidden-xs right-sec">
  <div class="bordered">
    <div class="row ">
      <!-- Begin Links in Sidebar -->
      <div class="col-sm-16 bt-spac wow fadeInUp animated" data-wow-delay="0.2s" data-wow-offset="150">
        <div class="row">

          <!-- menu start -->
          <div class="col-sm-16 wow fadeInLeft animated rtl" data-wow-delay="0.5s">
            <div style="
            font-size: 14px;
            padding: 10px 5px;
            border-right: 1px rgb(231, 76, 60) solid;
            border-top: 4px rgb(231,76,60) solid;
            border-left: 1px rgb(231,76,60) solid;
            border-radius: 5px 5px 0px 0px !important;
            text-align: center;
            font-weight: bold;
            color: black;
            ">
            <i class="fa fa-server" aria-hidden="true"></i>
            خدمات ارایه شده توسط استدیو گدار
          </div>
          <ul class="list-group">
            <?php
            // Get Footer Menu
            wp_nav_menu(array(
              'theme_location'  => 'links-in-sidebar',
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
      <!-- menu end -->
    </div>
    <!-- End Links in sidebar -->


    <style media="screen">
    .search-pro {
      margin: 5px 3px;
      border-radius: 5px !important;
      box-shadow: -3px 4px 2px #0000000a;
    }
    .search-pro > .head-title {
      font-size: 14px;
      padding: 10px 5px;
      border-right: 1px rgb(231, 76, 60) solid;
      border-top: 4px rgb(231,76,60) solid;
      border-left: 1px rgb(231,76,60) solid;
      border-radius: 5px 5px 0px 0px !important;
      text-align: center;
      font-weight: bold;
      color: black;
    }
    .search-pro > form {
      direction: rtl;
      padding: 10px 10px;
      border: 1px solid rgb(175, 175, 175);
    }
    .search-pro > form label {
      display: block;
    }
    .search-pro > form input[type="text"] {
      width: 100%;
      border: 1px #ddd solid;
      padding: 5px 10px;
      margin-bottom: 9px;
    }
    .search-pro > form input[type="number"] {
      width: 100%;
      border: 1px #ddd solid;
      padding: 5px 10px;
      margin-bottom: 9px;
    }
    .search-pro > form select {
      width: 100%;
      padding: 10px 10px;
      border: 1px #ddd solid;
      color: #00000057;
      font-size: 14px;
    }
    .search-pro > form .submit-box {
      text-align: center;
      padding-top: 20px;
    }
    .search-pro > form .submit-box > input[type="submit"] , input[type="button"] {
      display: inline-block;
      padding: 7px 23px;
      color: white;
      font-weight: bold;
      border-radius: 3px !important;
      width: 49%;
      border: 1px #ddd solid;
    }


    .search-pro > form input[type="submit"] {
      background-color: #39596c;
    }
    .search-pro > form input[type="button"] {
      background-color: #9e9e9e;
    }


    </style>
    <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="130">
      <div class="search-pro">
        <div class="head-title">
          جستجوی صدا
          <i class="fa fa-soundcloud" aria-hidden="true"></i>
        </div>
        <form action="<?php echo home_url(); ?>/search-pro/" method="GET">
          <label> کلمه کلیدی ( با خط - جدا شود )</label>
          <input type="text" name="keyword" id="keyword">
          <!-- <label >دسته بندی</label> -->
          <!-- <input type="text" name="category" id="category"> -->
          <label >جنسیت</label>
          <select name="gender" id="gender" >
            <option value="man">مرد</option>
            <option value="woman">زن</option>
            <option value="nothing">هیچ کدام</option>
          </select>
          <label >سن</label>
          <input type="number" name="age" id="age" min="0" max="140">

          <label >زبان</label>
          <select name="language" id="language">
            <option value="persian">فارسی</option>
            <option value="english">انگلیسی</option>
            <option value="arabic">عربی</option>
            <option value="turkish">ترکی</option>
            <option value="french">فرانسوی</option>
            <option value="german">آلمانی</option>
            <option value="Indolent">بی کلام</option>
          </select>
          <div class="submit-box">
            <input class="searchbutton" type="submit" value="جستجو">
            <input type="button" name="clear-item" value="پاک کردن">
          </div>
        </form>
      </div>
    </div>

    <!-- activities start -->
    <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="130">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs nav-justified " role="tablist">
        <li><a href="#popular" role="tab" data-toggle="tab"> محبوب ترین </a></li>
        <li class="active"><a href="#recent" role="tab" data-toggle="tab"> جدیدترین </a></li>
        <li><a href="#comments" role="tab" data-toggle="tab"> بیشترین نظرات </a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane" id="popular">
          <?php
          if (function_exists('wpp_get_mostpopular')){
            wpp_get_mostpopular(array(
              'limit' => 7,
              // 'stats_comments' => 1,
              // 'stats_date' => 0,
              'post_html' => '<li>{thumb} {title} {summary}</li>',
              'range' => 'monthly',
              'post_type' => 'post',
              'excerpt_length' => 12,
            ));
          }
          ?>
        </div>
        <!-- Begin tab Recent -->
        <div class="tab-pane active" id="recent">
          <ul class="list-unstyled">
            <?php
            $query_get_recent_post = array(
              'showposts' => 5,
            );
            $get_recent_psot = new WP_Query($query_get_recent_post);
            if($get_recent_psot->have_posts()):
              while($get_recent_psot->have_posts()):
                $get_recent_psot->the_post();
                ?>
                <li class="rtl txt-right">
                  <a href="<?php echo the_permalink(); ?>">
                    <div class="row">
                      <div class="col-sm-11  col-md-12 ">
                        <h4><?php echo the_title(); ?></h4>
                        <div class="text-danger sub-info">
                          <p><?php echo limitwords(get_the_excerpt(),12); ?></p>
                        </div>
                      </div>
                      <div class="col-sm-5  col-md-4 ">
                        <?php
                        if ( has_post_thumbnail() ) {
                          the_post_thumbnail('medium', array( 'class' => 'img-thumbnail pull-left' , 'width' => '164' , 'height' => '152' ));
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
              <?php endwhile; endif; 	wp_reset_query();  // Restore global post data stomped by the_post(). ?>
            </ul>
          </div>
          <!-- End tab RECENT  -->
          <div class="tab-pane" id="comments">
            <?php
            if (function_exists('wpp_get_mostpopular'))
            wpp_get_mostpopular(array(
              'limit' => 5,
              'order_by' => 'comments',
              'range' => 'monthly',
              'post_type' => 'post',
              'post_html' => '<li>{thumb} {title} {summary}</li>',

            ));
            ?>
          </div>
        </div>
      </div>
      <!-- activities end -->


      <!-- Begin Counter social media -->
      <div class="col-sm-16 bt-spac wow fadeInUp animated" data-wow-delay="0.2s" data-wow-offset="150">
        <div class="table-responsive">
          <table class="table table-bordered social">
            <tbody>
              <tr>
                <td><a class="rss" href="#">
                  <p> <span class="ion-social-rss"></span> subscribe<br>
                    to rss</p>
                  </a></td>
                  <td><a class="twitter" href="#">
                    <p><span class="ion-social-twitter"></span> 811,6
                      followers</p>
                    </a></td>
                    <td><a class="facebook" href="#">
                      <p> <span class="ion-social-facebook"></span> 6958,56<br>
                        fans</p>
                      </a></td>
                    </tr>
                    <tr>
                      <td><a class="youtube" href="#">
                        <p> <span class="ion-social-youtube"></span> 6954,55
                          subscribers</p>
                        </a></td>
                        <td><a class="vimeo" href="#">
                          <p><span class="ion-social-vimeo"></span> 896,7
                            subscribers</p>
                          </a></td>
                          <td><a class="dribbble" href="#">
                            <p> <span class="ion-social-dribbble-outline"></span> 6321,56
                              followers</p>
                            </a></td>
                          </tr>
                          <tr>
                            <td><a class="googleplus" href="#">
                              <p> <span class="ion-social-googleplus"></span> 9625.56
                                followers</p>
                              </a></td>
                              <td><a class="pinterest" href="#">
                                <p><span class="ion-social-pinterest"></span> 741,9
                                  followers</p>
                                </a></td>
                                <td><a class="instagram" href="#">
                                  <p> <span class="ion-social-instagram"></span> 3548,7
                                    followers</p>
                                  </a></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- End Counter social media -->





                      </div>
                    </div>
                  </div>
