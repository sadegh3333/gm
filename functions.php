<?php
// Make a simple access to root template folder
define('THEMEROOT' , get_template_directory_uri());

// post_thumbmail Support
add_theme_support( 'post-thumbnails' );




/**
*   All Post Type Comes Here
*
*   @since 0.9.9
*/
function godaar_post_type(){

  // Parts Post Type
  $actor_post_type = array(
    'public' => true,
    'label' => 'هنرمندان',
    'has_archive' => true,
    'taxonomies' => array( 'category', 'post_tag' ),
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail',
      'author',
      'trackbacks',
      'custom-fields',
      'comments',
      'revisions',
      //'page-attributes', // (menu order, hierarchical must be true to show Parent option)
      //'post-formats',
    ),
  );
  register_post_type('actor', $actor_post_type);

  // Parts Post Type
  $sound_post_type = array(
    'public' => true,
    'label' => 'صداها',
    'has_archive' => true,
    'taxonomies' => array( 'category', 'post_tag' ),
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail',
      'author',
      'trackbacks',
      'custom-fields',
      'comments',
      'revisions',
      //'page-attributes', // (menu order, hierarchical must be true to show Parent option)
      //'post-formats',
    ),
  );
  register_post_type('sound', $sound_post_type);


}
add_action('init','godaar_post_type');



/**
*   Add Count Other PostType Stat To At a Glance Wordpress Dashboard
*
*   @since 0.9.9
*/
function cpad_at_glance_content_table_end() {
  $args = array(
    'public' => true,
    '_builtin' => false
  );
  $output = 'object';
  $operator = 'and';

  $post_types = get_post_types( $args, $output, $operator );
  foreach ( $post_types as $post_type ) {
    $num_posts = wp_count_posts( $post_type->name );
    $num = number_format_i18n( $num_posts->publish );
    $text = _n( $post_type->labels->singular_name, $post_type->labels->name, intval( $num_posts->publish ) );
    if ( current_user_can( 'edit_posts' ) ) {
      $output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
      echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';
    }
  }
}
add_action( 'dashboard_glance_items', 'cpad_at_glance_content_table_end' );


// show limit words
function limitwords($text, $limit) {
  $text = preg_replace("/\< *[img][^\>]*[.]*\>/i","",$text,1);
  $word_arr = explode(" ", $text);

  if (count($word_arr) > $limit) {
    $words = implode(" ", array_slice($word_arr , 0, $limit) ) . ' ...';
    return $words;
  }

  return $text;
}


/**
*   Limit Words, Get Excerpt and return limited.
*
*   @since 0.9.2
*/
function limited_excerpt($text, $limit){
  $text = $text;

  $word_arr = explode(" ", $text);

  if (count($word_arr) > $limit) {
    $words = implode(" ", array_slice($word_arr , 0, $limit) ) . ' ...';
    return $words;
  }

  return $text;
}

/**
* Filter the except length to 20 words.
*
* @param int $length Excerpt length.
* @return int (Maybe) modified excerpt length.
*/
function wpdocs_custom_excerpt_length( $length ) {
  return 150;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
* Filter the excerpt "read more" string.
*
* @param string $more "Read more" excerpt string.
* @return string (Maybe) modified "read more" excerpt string.
*/
function wpdocs_excerpt_more( $more ) {
  return ' .... ';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


// Register Top Menu
function register_top_menu(){
  register_nav_menu('top-menu',__('Top Menu'));
}
add_action('init','register_top_menu');

// Register Footer Menu
function register_footer_menu() {
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_footer_menu' );

// Register Footer Menu
function register_links_in_sidebar() {
  register_nav_menu('links-in-sidebar',__( 'Links in Sidebar' ));
}
add_action( 'init', 'register_links_in_sidebar' );

// Remove Title attribute from wp_tag_cloud
function wp_tag_cloud_remove_title_attributes($return) {
  // This function uses single quotes
  $return = preg_replace("` title='(.+)'`", "", $return);
  return $return;
}
add_filter('wp_tag_cloud', 'wp_tag_cloud_remove_title_attributes');








/*
* Display the title and the publish date
*/
function my_custom_single_popular_post( $post_html, $p, $instance ){
  $output = '';
  $output .= '<li> <a href="'.get_the_permalink($p->id).'">';
  $output .= '<div class="row">';
  $output .= '<div class="col-sm-11 col-md-12">';
  $output .= '<h4>'.esc_attr($p->title).'</h4>';
  $output .= '<div class="text-danger sub-info">';
  $output .= '<div class="time"><span class="ion-android-data icon"></span>'. date( 'F j, Y', strtotime($p->date) ) .'</div>';
  $output .= '<div class="comments"><span class="ion-chatbubbles icon"></span>'.get_comments_number( ).'</div>';
  $output .= '</div>';
  $output .= '</div>';
  $output .= '<div class="col-sm-5  col-md-4 ">'.get_the_post_thumbnail($p->id,'medium', array( 'class' => 'img-thumbnail pull-left' , 'width' => '164' , 'height' => '152' )).'</div>';
  $output .= '</div>';
  $output .= '</a> </li>';
  return $output;
}
add_filter( 'wpp_post', 'my_custom_single_popular_post', 10, 3 );












/* Begin Hook to mega Menu */
class mega_menu_wpmen extends Walker_Nav_Menu {


  /**
  * Starts the list before the elements are added.
  *
  * Adds classes to the unordered list sub-menus.
  *
  * @param string $output Passed by reference. Used to append additional content.
  * @param int    $depth  Depth of menu item. Used for padding.
  * @param array  $args   An array of arguments. @see wp_nav_menu()
  */
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    // Depth-dependent classes.
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
      ( $display_depth == 0 ? '' : 'dropdown-menu' ),
    );
    $class_names = implode( ' ', $classes );

    // Build HTML for output.
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
  }




  // add this functions to helo found children
  function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
  {
    $id_field = $this->db_fields['id'];
    if ( is_object( $args[0] ) ) {
      $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
    }
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }


  /**
  * Start the element output.
  *
  * Adds main/sub-classes to the list items and links.
  *
  * @param string $output Passed by reference. Used to append additional content.
  * @param object $item   Menu item data object.
  * @param int    $depth  Depth of menu item. Used for padding.
  * @param array  $args   An array of arguments. @see wp_nav_menu()
  * @param int    $id     Current item ID.
  */
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

    // Depth-dependent classes.
    $depth_classes = array(
      ( $depth == 0 ?  'dropdown hasmenu' : '' ),
      ( $depth >=2 ? '' : '' ),
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

    // Passed classes.
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

    // Build HTML.
    $output .= $indent . '<li  class="' . $depth_class_names . '">';

    $addedd ='';
    if ( $args->has_children ) {
      $addedd .= ' data-toggle="dropdown" ';
    }
    // Link attributes.
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= $addedd.' class="dropdown-toggle menu-link  ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
    $attributes .= ($depth > 0 ?  '': ' role="button" aria-haspopup="true" aria-expanded="false"');



    // Build HTML output and pass through the proper filter.
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
      $args->before,
      $attributes,
      $args->link_before,
      apply_filters( 'the_title', $item->title, $item->ID ),
      $args->link_after,
      $args->after
    );
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }



}

/* End Hook to mega Menu */







// Breadcrumbs
function custom_breadcrumbs() {

  // Settings
  $separator          = '&gt;';
  $breadcrums_id      = 'breadcrumbs';
  $breadcrums_class   = 'breadcrumb';
  $home_title         = 'Homepage';

  // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
  $custom_taxonomy    = 'product_cat';

  // Get the query & post information
  global $post,$wp_query;

  // Do not display on the homepage
  if ( !is_front_page() ) {

    // Build the breadcrums
    echo '<ol id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

    // Home page
    echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
    echo '<li class="separator separator-home"> ' . $separator . ' </li>';

    if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

      echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';

    } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

      // If post is a custom post type
      $post_type = get_post_type();

      // If it is a custom post type display name and link
      if($post_type != 'post') {

        $post_type_object = get_post_type_object($post_type);
        $post_type_archive = get_post_type_archive_link($post_type);

        echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
        echo '<li class="separator"> ' . $separator . ' </li>';

      }

      $custom_tax_name = get_queried_object()->name;
      echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';

    } else if ( is_single() ) {

      // If post is a custom post type
      $post_type = get_post_type();

      // If it is a custom post type display name and link
      if($post_type != 'post') {

        $post_type_object = get_post_type_object($post_type);
        $post_type_archive = get_post_type_archive_link($post_type);

        echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
        echo '<li class="separator"> ' . $separator . ' </li>';

      }

      // Get post category info
      $category = get_the_category();

      if(!empty($category)) {

        // Get last category post is in
        $last_category = end(array_values($category));

        // Get parent any categories and create array
        $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
        $cat_parents = explode(',',$get_cat_parents);

        // Loop through parent categories and store in variable $cat_display
        $cat_display = '';
        foreach($cat_parents as $parents) {
          $cat_display .= '<li class="item-cat">'.$parents.'</li>';
          $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
        }

      }

      // If it's a custom post type within a custom taxonomy
      $taxonomy_exists = taxonomy_exists($custom_taxonomy);
      if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

        $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
        $cat_id         = $taxonomy_terms[0]->term_id;
        $cat_nicename   = $taxonomy_terms[0]->slug;
        $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
        $cat_name       = $taxonomy_terms[0]->name;

      }

      // Check if the post is in a category
      if(!empty($last_category)) {
        echo $cat_display;
        echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

        // Else if post is in a custom taxonomy
      } else if(!empty($cat_id)) {

        echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
        echo '<li class="separator"> ' . $separator . ' </li>';
        echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

      } else {

        echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

      }

    } else if ( is_category() ) {

      // Category page
      echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';

    } else if ( is_page() ) {

      // Standard page
      if( $post->post_parent ){

        // If child page, get parents
        $anc = get_post_ancestors( $post->ID );

        // Get parents in the right order
        $anc = array_reverse($anc);

        // Parent page loop
        if ( !isset( $parents ) ) $parents = null;
        foreach ( $anc as $ancestor ) {
          $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
          $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
        }

        // Display parent pages
        echo $parents;

        // Current page
        echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

      } else {

        // Just display current page if not parents
        echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

      }

    } else if ( is_tag() ) {

      // Tag page

      // Get tag information
      $term_id        = get_query_var('tag_id');
      $taxonomy       = 'post_tag';
      $args           = 'include=' . $term_id;
      $terms          = get_terms( $taxonomy, $args );
      $get_term_id    = $terms[0]->term_id;
      $get_term_slug  = $terms[0]->slug;
      $get_term_name  = $terms[0]->name;

      // Display the tag name
      echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';

    } elseif ( is_day() ) {

      // Day archive

      // Year link
      echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
      echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

      // Month link
      echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
      echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

      // Day display
      echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

    } else if ( is_month() ) {

      // Month Archive

      // Year link
      echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
      echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

      // Month display
      echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';

    } else if ( is_year() ) {

      // Display year archive
      echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';

    } else if ( is_author() ) {

      // Auhor archive

      // Get the author information
      global $author;
      $userdata = get_userdata( $author );

      // Display author name
      echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

    } else if ( get_query_var('paged') ) {

      // Paginated archives
      echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';

    } else if ( is_search() ) {

      // Search results page
      echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

    } elseif ( is_404() ) {

      // 404 page
      echo '<li>' . 'Error 404' . '</li>';
    }

    echo '</ol>';

  }

}







/*
*   Function Pagination for use in pages:
*   @search.php
*
*/
function wpbeginner_numeric_posts_nav() {

  if( is_singular() )
    return;

  global $wp_query;

  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )
    return;

  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );

  /**	Add current page to the array */
  if ( $paged >= 1 )
    $links[] = $paged;

  /**	Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
  }

  if ( ( $paged + 2 ) <= $max ) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
  }


  echo '<ul class="pagination">' . "\n";

  /**	Previous Post Link */
  if ( get_previous_posts_link() )
    printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

  /**	Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
    $class = 1 == $paged ? ' class="active"' : '';

    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

    if ( ! in_array( 2, $links ) )
      echo '<li>…</li>';
  }

  /**	Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
    $class = $paged == $link ? ' class="active"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }

  /**	Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
    if ( ! in_array( $max - 1, $links ) )
      echo '<li>…</li>' . "\n";

    $class = $paged == $max ? ' class="active"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }

  /**	Next Post Link */
  if ( get_next_posts_link() )
    printf( '<li>%s</li>' . "\n", get_next_posts_link() );

  echo '</ul>' . "\n";

}












function comment_reform ($arg) {
  $arg['title_reply'] = __('نظرات خود را اینجا بنویسید');
  return $arg;
}
add_filter('comment_form_defaults','comment_reform');
function custom_comment_form_defaults($defaults){
  $defaults['comment_notes_before'] = '<p class="comment-notes">' . sprintf( __('آدرس الکترونیکی شما نمایش داده نمی شود %s'), '<span class="required">*</span>' ) . '</p>';
  return $defaults;
}
add_filter( 'comment_form_defaults', 'custom_comment_form_defaults' );



function mytheme_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  ?>
  <div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
    <!-- <a href="#" class="pull-right"> -->
      <!-- <?php echo get_avatar($comment,$size='64',$default='<path_to_url>' ); ?> -->
      <!-- <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="images/comments/com-1.jpg"> -->
      <!-- </a> -->
      <div class="media-body">
        <div>
          <h4 class="media-heading"><?php echo get_comment_author_link(); ?></h4>
          <div class="time text-danger"><span class="ion-android-data icon">  <?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></span></div>
        </div>
        <?php comment_text(); ?>
        <!-- <div class="col-sm-16"><a href="#"><span class="reply pull-right ion-ios7-compose">  <?php edit_comment_link(__('(Edit)'),'  ','') ?></span></a></div> -->

        <div class="reply comment-reply-link">
          <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>

      </div>
    </div>

    <?php
  }


  add_filter('comment_class' , 'add_new_class');
  function add_new_class($class){
    $class[] = 'media';
    return $class;
  }


//for reply link
  add_filter('comment_reply_link', 'replace_reply_link_class');
  function replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='comment-reply-link pull-right btn btn-primary btn-xs", $class);
    return $class;
  }



  add_action('wp_head','wpcats_ajaxurl');
  function wpcats_ajaxurl() {
    ?>
    <script type="text/javascript">
      var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
    <?php
  }


  add_action("wp_ajax_catnews_ajax", "catnews_ajax");
  add_action("wp_ajax_nopriv_catnews_ajax", "catnews_ajax");
  function catnews_ajax(){
   header('Content-Type: application/json');
   $keyword = $_REQUEST["keyword"];
   $result    = array();
   $res=array();
   /*	$catnewsshomepage = new WP_Query("cat=$fieldid&showposts=8");*/
/*	if ($catnewsshomepage->have_posts()):
		while ($catnewsshomepage->have_posts()):
			$catnewsshomepage->the_post();
		$categories = get_the_category();
		$author_id = get_the_author_meta('ID');
		$telegram_profile = get_field('telegram_profile', 'user_'. $author_id );
		$profile = get_field('profile', 'user_'. $author_id );
		$categories = get_the_category();
		$result['title']=get_the_title();
		$category1 = &get_category($fieldid);
		$result['catslug']='http://wpmen.ir/category/'.$category1->slug;
		$result['catname']= get_cat_name( $fieldid );
		$result['image']=get_field('size_w507_h240');
		$result['shortlink']= wp_get_shortlink();
		$result['comments_number'] = get_comments_number();

		$res[]=$result;
		endwhile; endif;

*/

    $args = array(
      'post_type' => array( 'any' )
    );
    $catnewsshomepage = new WP_Query( $args );
    if ($catnewsshomepage->have_posts()):
      while ($catnewsshomepage->have_posts()):
        $result['title']=get_the_title();
        $res[]=$result;
      endwhile; endif;


      $res['keyword']=$keyword;

      $json = json_encode($res);
      echo $json ;
      wp_die();

    }
