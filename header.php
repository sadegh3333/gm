<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
  <link rel="shortcut icon" href="<?php echo THEMEROOT; ?>/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo THEMEROOT; ?>/images/favicon.ico" type="image/x-icon">

  <link rel="stylesheet" href="<?php echo THEMEROOT; ?>/style.css?Version=0.9.4">
  <!-- google font -->
  <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>
<body>
  <!-- preloader start -->
  <!-- <div id="preloader">
  <div id="status"></div>
</div> -->
<!-- preloader end -->

<!-- wrapper start -->
<div class="wrapper">
  <!-- header toolbar start -->
  <!-- <div class="header-toolbar">
    <div class="container">
      <div class="row">
        <div class="col-md-16 text-uppercase">
          <div class="row">
            <div class="col-xs-16 col-sm-8">
              <div class="row">
                <div id="time-date" class="col-xs-16 col-sm-8 col-lg-7"></div>
                <div id="weather" class="col-xs-16 col-sm-8 col-lg-9"></div>
              </div>
            </div>
            <div class="col-sm-8 col-xs-16">
              <ul id="inline-popups" class="list-inline">
                <li class="hidden-xs"><a href="#">advertisement</a></li>
                <li><a class="open-popup-link" href="#log-in" data-effect="mfp-zoom-in">log in</a></li>
                <li><a class="open-popup-link" href="#create-account" data-effect="mfp-zoom-in">create account</a></li>
                <li><a  href="#">About</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- header toolbar end -->

  <!-- sticky header start -->
  <div class="sticky-header">
    <!-- header start -->
    <div class="container header">
      <div class="row">
        <!-- <div class="col-sm-11 col-md-11 hidden-xs text-left hidden-md"><img src="<?php echo THEMEROOT; ?>/images/ads/468-60-ad.gif" width="468" height="60" alt=""/></div> -->
        <div class="col-sm-16 col-md-16 wow fadeInUpLeft animated">
          <a class="navbar-brand" href="<?php echo home_url(); ?>"  style="    background-image: url(http://godaar.com/templates/shaper_neo/images/styles/style1/logo.png); background-repeat: no-repeat;background-size: 72%;"><?php  ?></a>
        </div>
      </div>
    </div>
    <!-- header end -->
    <!-- nav and search start -->
    <div class="nav-search-outer">
      <!-- nav start -->

      <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
          <div class="row">
            <div class="col-sm-16"> <a href="javascript:;" class="toggle-search pull-left"><span class="ion-ios7-search"></span></a>
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
                <?php
                //get top menu
                wp_nav_menu(
                  array(
                    'theme_location' => 'top-menu' ,
                    'menu_class' => 'nav navbar-nav text-uppercase main-nav ' ,
                    'menu_id' => ' ',
                    'container' => 'ul',
                    'container_class' => 'nav navbar-nav text-uppercase main-nav ',
                    'walker' => new mega_menu_wpmen(),
                    )
                  );
                  ?>
                </div>
              </div>
            </div>
          </div>
          <!-- nav end -->
          <!-- search start -->

          <div class="search-container ">
            <div class="container">
              <form action="/" method="" role="search">
                <input name="s" id="search-bar" placeholder="جستجو..." autocomplete="off">
              </form>
            </div>
          </div>
          <!-- search end -->
        </nav>
        <!--nav end-->
      </div>
      <!-- nav and search end-->
    </div>
    <!-- sticky header end -->
