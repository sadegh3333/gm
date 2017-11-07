<?php
/*
*   Template Name: Page Contact
*   @page_id = 103
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
          <!-- left sec Start -->
          <div class="col-sm-16">
            <div class="row">
              <div id="map_canvas" class="col-sm-16">
                <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAecbHUF9eD6PD0QKYwzyVVr1wB6tbF1A0"></script>
                <div style="overflow:hidden;height:400px;width:100%;">
                  <div id="gmap_canvas" style="height:400px;width:100%;"></div>
                  <style>
                  #gmap_canvas img{max-width:none!important;background:none!important}
                  </style>
                  <a class="google-map-code" href="http://www.trivoo.net/gutscheine/sheego/" id="get-map-data">trivoo</a></div>
                  <script type="text/javascript"> function init_map(){var myOptions = {zoom:16,center:new google.maps.LatLng(35.735433,51.3384834),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(35.735433,51.3384834)});infowindow = new google.maps.InfoWindow({content:"<b>Egypt</b><br/><br/> Cairo" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});}google.maps.event.addDomListener(window, 'load', init_map);</script>
                </div>
                <div class="col-sm-16">
                  <div class="row">
                    <div class="main-title-outer pull-left">
                      <div class="main-title">تماس با ما</div>
                    </div>
                    <div class="col-sm-11 rtl ">
<?php echo do_shortcode('[contact-form-7 id="8" title="Contact form 1"]'); ?>
                      <!-- <form action="#" method="post" name="" class="comment-form">
                        <div class="row">
                          <div class="form-group col-xs-16 col-sm-8 email-field">
                            <input type="email" placeholder="ایمیل*" required="" class="form-control" >
                          </div>
                          <div class="form-group col-xs-16 col-sm-8 name-field">
                            <input type="text" placeholder="نام*" required="" class="form-control">
                          </div>
                          <div class="form-group col-xs-16 col-sm-16">
                            <textarea placeholder="متن پیام" rows="8" class="form-control" required id="message" name="message">                  </textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <button class="btn btn-danger" type="submit">ارسال پیام</button>
                        </div>
                      </form> -->
                    </div>
                    <div class="col-sm-4  adress rtl">
                      <address>
                        <strong> آدرس: </strong><br>
                        مرزداران - خیابان ایثار - خیابان بهار - کوچه مرضیه - بن بست دوم - پلاک 2 واحد
                      </address>
                      <address>
                        <strong> تلفن بخش فروش و پیگیری پروژه ها :</strong><br>
                        44224627 - 021
                      </address>
                      <address>
                        <strong> ایمیل بخش فروش : </strong><br>
                        <a href="mailto:ed@godaar.com">ed@godaar.com</a>
                      </address>
                      <address>
                        <strong> تماس با مدیریت : </strong><br>
                        <a href="mailto:info@godaar.com">info@godaar.com</a>
                      </address>
                      <!-- <strong>Social</strong><br>
                      <ul class="list-inline">
                      <li><a href="#"><span class="ion-social-twitter"></span></a></li>
                      <li><a href="#"><span class="ion-social-facebook"></span></a></li>
                      <li><a href="#"><span class="ion-social-googleplus"></span></a></li>
                    </ul> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- left sec End -->

        </div>
      </div>
    </section>
    <!-- Data End -->



  <?php endwhile; endif; ?>

  <?php get_footer(); ?>
