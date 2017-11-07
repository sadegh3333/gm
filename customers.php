<?php
/**
*   Template name: Customers
*
*   @page_id 157
*
*   @since 0.9.8
*/

?>
<?php get_header(); ?>


<?php
if(have_posts()):
  while (have_posts()):
    the_post();

    ?>

    <!-- bage header Start -->
    <div class="container rtl">
      <div class="page-header">
        <h1><?php echo the_title(); ?> </h1>
        <ol class="breadcrumb">
        </ol>
      </div>
    </div>
    <!-- bage header End -->



    <style media="screen">
    .customers .content {
      padding: 10px 10px 40px;
      border-bottom: 1px rgba(0, 0, 0, 0.08) solid;
      margin-bottom: 15px;
    }
    .customers .content p {
      color: black !important;
    }

    .customers .customers-lists {
      text-align: center;
    }
    .customers .customers-lists  .customer {
      border: 1px rgba(0, 0, 0, 0.11) solid;
      padding: 18px 15px;
      text-align: center;
      margin: 10px 10px;
      border-radius: 5px !important;
      font-size: 14px;
      font-weight: bold;
      min-width: 230px;
      width: 230px;
      max-width: 230px;
      min-height: 270px;
      display: inline-grid;
      max-height: 270px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.05);
    }
    .customers .customers-lists  .customer > img {
      max-width: 100%;
      min-height: 140px;
      max-height: 141px;
      margin: 0px auto;
    }
    .customers .customers-lists  .customer > .title-customer {
      font-size: 13px;
      font-weight: bold;
      padding-top: 21px;
      color: rgba(0, 0, 0, 0.89);
      letter-spacing: 1px;
    }

    </style>

    <!-- data Start -->
    <section>
      <div class="container customers ">
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
                      <div class="col-sm-16 content">
                        <?php echo the_content(); ?>
                      </div>
                    </div>
                    <div class="row customers-lists">
                      <?php
                      if( have_rows('customers') ):
                        while ( have_rows('customers') ) : the_row();
                        $image = get_sub_field('لوگوی_مشتری');
                        ?>
                        <div class="customer">
                          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" title="<?php echo $image['title']; ?>" />
                          <div class="title-customer">
                            <?php
                            echo the_sub_field('نام_مشتری');
                            ?>
                          </div>
                        </div>
                        <?php
                      endwhile;
                    endif;
                    ?>

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
