<?php
/*
*		Template Name: Search-pro
*
*		Theme URI: http://hostlink.ir
*		Author: MiSaCo.
*		Author URI: http://misaco.ir/
*		@since 0.9.9
*/
?>
<?php get_header(); ?>





<div class="container rtl">

	<!-- bage header start -->
	<div class="page-header">
		<h1> صفحه جستجو پیشرفته</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo home_url(); ?>">
				<i class="icon ion-ios-home"></i>
				خانه
			</a></li>
			<li class="active"><?php echo $_GET['keyword']; ?></li>
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
						// Search pro Query
						// keyword=&category=&gender=man&age=&language=persian
						if(isset($_GET['keyword'])){
							$keyword = $_GET['keyword'];
						}
						if(isset($_GET['gender'])){
							$gender = $_GET['gender'];
							if($gender == 'nothing'){
								$gender = '';
							}
						}
						if(isset($_GET['age'])){
							$age = $_GET['age'];
						}
						if(isset($_GET['language'])){
							$language = $_GET['language'];
						}
						//
						// echo $keyword ;
						// echo $gender;
						// echo $age;
						// echo $language;
						// echo '<br>';

						$keyword = explode('-',$keyword);

						$pro_query = array(
							'post_type' => 'sound',
							'tag' => $keyword,
							'meta_query' => array(
								'relation' => 'OR',
								array(
									'key' => 'language',
									'value' =>  $language ,
									'compare' => 'LIKE',
								),
								array(
									'key' => 'gender',
									'value' =>  $gender,
									'compare' => 'LIKE'
								),
								array(
									'key' => 'age',
									'value' => $age ,
									'compare' => 'LIKE'
								),
								array(
									'key' => 'gender',
									'value' => $gender,
									'compare' => 'LIKE'
								)
							),
							'showposts' => -1
						);

						// print_r($pro_query);

						/* Search Count */
						$allsearch = new WP_Query($pro_query);
						$count_post_found = $allsearch->post_count;
						wp_reset_query();
						?>
						<h3><span class="text-danger"><?php echo $count_post_found; ?> صدایافت شده </span></h3>
						<hr>
					</div>

					<?php
					if($allsearch->have_posts()){
						while($allsearch->have_posts()):
							$allsearch->the_post();
							?>
							<div class="sec-topic col-sm-16 wow fadeInDown animated " data-wow-delay="0.5s">
								<div class="row">
									<div class="col-sm-16">
										<div class="sound-list">
											<div class="sound">
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
											</div>
											<a href="<?php echo the_permalink(); ?>">
												<!-- <div class="sec-info">
												<h3><?php echo the_title(); ?></h3>
												<div class="text-danger sub-info-bordered">
												<div class="time"><span class="ion-android-data icon"></span> <?php  the_time('j F Y '); ?></div>
												<div class="comments"><span class="ion-chatbubbles icon"></span><?php $comments_number = get_comments_number(); echo $comments_number; ?></div>
											</div>
										</div> -->
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
