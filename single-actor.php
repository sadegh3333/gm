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
          <!-- <li>
          <?php
          $category = get_the_category();
          $firstCategory = $category[0]->cat_name;
          ?>
          <a href="<?php echo home_url(); ?>/?cat=<?php echo $category[0]->term_id; ?>">
          <?php
          echo $firstCategory;
          ?>
        </a>
      </li> -->
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

        <style media="screen">
        .actor-single {

        }
        .actor-single .background-top-actor {
          background-color: #00BCD4;
          height: 133px;
        }
        .actor-single .details-section-actor {
          margin-top: -80px;
          padding: 0px 20px 0px 0px;
        }
        .actor-single .details-section-actor .profile-image-actor {
          max-width: 150px;
          width: 20%;
          display: inline-block;
        }
        .actor-single .details-section-actor .profile-image-actor > img {
          max-width: 100%;
          height: auto;
          border-radius: 10px !important;
          box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.18);
        }
        .actor-single .details-section-actor .title-desx {
          display: inline-block;
          width: 79%;
          padding: 0px 20px 0px 0px;
          vertical-align: bottom;
        }
        .actor-single .details-section-actor .title-desx > .title-actor {
        }
        .actor-single .details-section-actor .title-desx > .title-actor > h1 {
          padding: 0px 0px 10px;
          margin: 0px;
          font-size: 20px;
          font-family: BYEKAN;
        }
        .actor-single .details-section-actor .title-desx > .desx-actor {
          line-height: 1.8;
        }

        .actor-single .list-sounds {
          margin-top: 50px;
          padding: 0px 30px;
        }
        .actor-single .list-sounds .item-sound {
          border: 1px rgba(0, 0, 0, 0.07) solid;
          padding: 0px;
          border-radius: 6px !important;
          box-shadow: -3px 4px 9px rgba(0, 0, 0, 0.08);
        }
        .actor-single .list-sounds .item-sound .title-sound {
          color: black;
          font-weight: bold;
          padding: 20px 20px 10px;
        }
        .actor-single .list-sounds .item-sound > audio {
          width: 100%;
          padding: 0px 20px;
        }
        .actor-single .list-sounds .item-sound > .tags-sound {
          padding: 10px 20px 10px;
          border-top: 1px #ddd solid;
          color: rgba(0, 0, 0, 0.22);
        }
        .actor-single .list-sounds .item-sound > .tags-sound > a {
          color: rgba(0, 0, 0, 0.22);
        }
        .actor-single .list-sounds .item-sound > .title-sound .language-sound {
          float: left;
          font-weight: normal;
          padding-left: 10px;
        }
        .actor-single .list-sounds .item-sound > .title-sound .language-sound:before {
          font-family: 'Ionicons';
          content: '\f38c';
        }

        </style>

        <!-- post details start -->
        <div class="col-sm-16 rtl actor-single">

          <!-- Begin Actor Single Section -->
          <div class="background-top-actor"></div>
          <div class="details-section-actor">
            <div class="profile-image-actor">
              <?php
              $get_image = get_field('profile_image');
              // print_r($get_image);
              ?>
              <img alt="<?php echo $get_image['alt']; ?>" title="<?php echo $get_image['title']; ?>" src="<?php echo $get_image['sizes']['large']; ?>" alt="">
            </div>
            <div class="title-desx">
              <div class="title-actor">
                <h1>
                  <?php echo the_title(); ?>
                </h1>
              </div>
              <div class="desx-actor">
                <?php echo the_field('history'); ?>
              </div>
            </div>
          </div>

          <?php
        endwhile; endif;
        // end main Query for this post

        $post_slug = $post->post_name;
        $this_id_actor = get_the_ID();


        $posts = new WP_Query (array(
          'post_type'		=> 'sound',
          'showposts' => -1,
          'meta_query' => array(
            array(
              'key' => 'actor',
              'value' => '"' . $this_id_actor . '"',
              'compare' => 'LIKE',
            )
          )
        ));
        $phone_count = $posts->post_count;
        // $posts->wp_reset_query();

        ?>
        <div class="list-sounds">
          <?php
          if($posts->have_posts()):
            while ($posts->have_posts()):
              $posts->the_post();
              ?>
              <div class="item-sound">
                <div class="title-sound">
                  <?php echo the_title(); ?>
                  <span class="language-sound">
                    زبان:
                    <?php echo the_field('language'); ?>
                  </span>
                </div>
                <?php
                $get_sound = get_field('file');
                // print_r($get_sound);
                ?>
                <audio controls preload="none">
                  <source src="<?php echo $get_sound['url']; ?>" type="audio/mpeg">
                    Your browser does not support the audio element.
                  </audio>
                  <div class="tags-sound">
                    <?php the_tags('برچسب ها: '); ?>
                  </div>
                </div>
                <?php
              endwhile; endif;
              wp_reset_query();
              ?>
            </div>
            <!-- End Actor Single Section -->

          </div>
        </div>
        <!-- left sec End -->

      </div>
    </div>
  </div>
</section>
<!-- Data End -->


<?php get_footer(); ?>
