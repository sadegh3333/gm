
<?php

$comment_args = array(
  'post_id' => get_the_ID(),
  'post_type' => 'comment',
  'orderby' => 'comment_date_gmt',
  'order' => 'ASC',
  'status' => 'approve',
);

//  $get_com = new WP_Query($comment_args);
// print_r($get_com);



?>

<div class="col-sm-16 comments-area rtl">
  <div class="main-title-outer pull-right">
    <div class="main-title">نظرات</div>
  </div>
  <div class="opinion pull-right">
    <?php
    $comments = get_comments('post_id='.get_the_ID());
    // print_r($comments);

    $all_comments = array();

    if(count($comments) > 0){
      foreach($comments as $comment) :
        $all_comments[$comment->comment_ID] = $comment->comment_parent;
      endforeach;

      // print_r($all_comments);
      foreach($all_comments as $keys => $vals):

        // echo 'keys>'.$keys;
        foreach($all_comments as $key => $val):

          if($keys == $val){
            unset($all_comments[$keys]);
          }
        endforeach;

      endforeach;
      // print_r($all_comments);

      // die();
      foreach($all_comments as $comment => $value) :

        $get_com = get_comment($value);
        // print_r($get_com);

          ?>

          <div class="media">
            <a  href="<?php echo the_permalink(); ?>#commnet-<?php echo $get_com->comment_ID; ?>" id="commnet-<?php echo $get_com->comment_ID; ?>" class="pull-right">
              <?php echo get_avatar($comment,$size='64',$default='<path_to_url>' ); ?>
                <!-- <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="images/comments/com-1.jpg"> -->
              </a>
              <div class="media-body">
                <div>
                  <h4 class="media-heading"><?php echo $get_com->comment_author; ?></h4>
                  <div class="time text-danger"><span class="ion-android-data icon"></span><?php echo comment_date('j F Y ', $get_com->comment_ID); ?></div>
                </div>
                <?php
                echo $get_com->comment_content;
                ?>
                <div class="col-sm-16">
                  <?php echo  comment_reply_link($get_com->comment_ID); ?>
                  <a href="#"><span class="reply pull-right ion-ios7-compose"></span></a></div>

                  <div class="media nested-rep pull-left"> <a href="#" class="pull-left"> <img alt="64x64" class="media-object" style="width: 64px; height: 64px;" src="images/comments/com-1.jpg"> </a>
                    <div class="media-body ">
                      <div>
                        <h4 class="media-heading">John Doe</h4>
                        <div class="time text-danger"><span class="ion-android-data icon"></span>Dec 9 2014</div>
                      </div>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                      <div class="col-sm-16"><a href="#"><span class="reply pull-right ion-ios7-compose"></span></a></div>

                      <div class="media nested-rep pull-left"> <a href="#" class="pull-left"> <img alt="64x64" class="media-object" style="width: 64px; height: 64px;" src="images/comments/com-1.jpg"> </a>
                        <div class="media-body ">
                          <div>
                            <h4 class="media-heading">John Doe</h4>
                            <div class="time text-danger"><span class="ion-android-data icon"></span>Dec 9 2014</div>
                          </div>
                          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                          <div class="col-sm-16"><a href="#"><span class="reply pull-right ion-ios7-compose"></span></a></div>
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
              </div>
            <?php endforeach;
            // print_r($all_comments);
          }else{
            ?>
            <div class="media">
              <div class="media-body">
                هنوز هیچ دیدگاهی ثبت نشده است.
              </div>
            </div>
            <?php
          }
          ?>
          <!-- <div class="media"> <a href="#" class="pull-left"> <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="images/comments/com-2.jpg"> </a>
            <div class="media-body">
              <div>
                <h4 class="media-heading">John Doe</h4>
                <div class="time text-danger"><span class="ion-android-data icon"></span>Dec 9 2014</div>
              </div>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.
              <div class="col-sm-16"><a href="#"><span class="reply pull-right ion-ios7-compose"></span></a></div>
              <div class="media nested-rep pull-left"> <a href="#" class="pull-left"> <img alt="64x64" class="media-object" style="width: 64px; height: 64px;" src="images/comments/com-1.jpg"> </a>
                <div class="media-body ">
                  <div>
                    <h4 class="media-heading">John Doe</h4>
                    <div class="time text-danger"><span class="ion-android-data icon"></span>Dec 9 2014</div>
                  </div>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                  <div class="col-sm-16"><a href="#"><span class="reply pull-right ion-ios7-compose"></span></a></div>
                </div>
              </div>
            </div>
          </div> -->
</div>
</div>



<div class="col-sm-16">
  <div class="main-title-outer pull-left">
    <div class="main-title">نظر دهید</div>
  </div>
  <div class="col-xs-16 wow zoomIn animated">
    <form action="#" method="post" name="" class="comment-form">
      <div class="row">
        <div class="form-group col-sm-8 name-field">
          <input type="text" placeholder="Name*" required="" class="form-control">
        </div>
        <div class="form-group col-sm-8 email-field">
          <input type="email" placeholder="Email*" required="" class="form-control" >
        </div>
        <div class="form-group col-sm-16">
          <textarea placeholder="Your Message" rows="8" class="form-control" required id="message" name="message">                  </textarea>
        </div>
      </div>
      <div class="form-group">
        <button class="btn btn-danger" type="submit"> Post Reply </button>
      </div>
    </form>
  </div>
</div>
