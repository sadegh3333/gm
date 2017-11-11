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
