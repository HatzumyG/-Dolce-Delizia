<?php

// Get theme variable
if (!function_exists('trx_utils_storage_get')) {
    function trx_utils_storage_get($var_name, $default='') {
        global $SWEET_DESSERT_STORAGE;
        return isset($SWEET_DESSERT_STORAGE[$var_name]) ? $SWEET_DESSERT_STORAGE[$var_name] : $default;
    }
}

// Get GET, POST value
if (!function_exists('trx_utils_get_value_gp')) {
    function trx_utils_get_value_gp($name, $defa='') {
        $rez = $defa;
        if (isset($_GET[$name])) {
            $rez = stripslashes(trim($_GET[$name]));
        } else if (isset($_POST[$name])) {
            $rez = stripslashes(trim($_POST[$name]));
        }
        return $rez;
    }
}

//Return Post Views Count
if (!function_exists('trx_utils_get_post_views')) {
    add_filter('trx_utils_filter_get_post_views', 'trx_utils_get_post_views', 10, 2);
    function trx_utils_get_post_views($default=0, $id=0){
        global $wp_query;
        if (!$id) $id = $wp_query->current_post>=0 ? get_the_ID() : $wp_query->post->ID;
        $count_key = trx_utils_storage_get('options_prefix').'_post_views_count';
        $count = get_post_meta($id, $count_key, true);
        if ($count===''){
            delete_post_meta($id, $count_key);
            add_post_meta($id, $count_key, '0');
            $count = 0;
        }
        return $count;
    }
}

//Set Post Views Count
if (!function_exists('trx_utils_set_post_views')) {
    add_action('trx_utils_filter_set_post_views', 'trx_utils_set_post_views', 10, 2);
    function trx_utils_set_post_views($id=0, $counter=-1) {
        global $wp_query;
        if (!$id) $id = $wp_query->current_post>=0 ? get_the_ID() : $wp_query->post->ID;
        $count_key = trx_utils_storage_get('options_prefix').'_post_views_count';
        $count = get_post_meta($id, $count_key, true);
        if ($count===''){
            delete_post_meta($id, $count_key);
            add_post_meta($id, $count_key, 1);
        } else {
            $count = $counter >= 0 ? $counter : $count+1;
            update_post_meta($id, $count_key, $count);
        }
    }
}

//Return Post Likes Count
if (!function_exists('trx_utils_get_post_likes')) {
    add_filter('trx_utils_filter_get_post_likes', 'trx_utils_get_post_likes', 10, 2);
    function trx_utils_get_post_likes($default=0, $id=0){
        global $wp_query;
        if (!$id) $id = $wp_query->current_post>=0 ? get_the_ID() : $wp_query->post->ID;
        $count_key = trx_utils_storage_get('options_prefix').'_post_likes_count';
        $count = get_post_meta($id, $count_key, true);
        if ($count===''){
            delete_post_meta($id, $count_key);
            add_post_meta($id, $count_key, '0');
            $count = 0;
        }
        return $count;
    }
}

//Set Post Likes Count
if (!function_exists('trx_utils_set_post_likes')) {
    add_action('trx_utils_filter_set_post_likes', 'trx_utils_set_post_likes', 10, 2);
    function trx_utils_set_post_likes($id=0, $count=0) {
        global $wp_query;
        if (!$id) $id = $wp_query->current_post>=0 ? get_the_ID() : $wp_query->post->ID;
        $count_key = trx_utils_storage_get('options_prefix').'_post_likes_count';
        update_post_meta($id, $count_key, $count);
    }
}


// AJAX: Set post likes/views count
// Handler of add_action('wp_ajax_post_counter', 			'trx_utils_callback_post_counter');
// Handler of add_action('wp_ajax_nopriv_post_counter',	'trx_utils_callback_post_counter');
if ( !function_exists( 'trx_utils_callback_post_counter' ) ) {
    function trx_utils_callback_post_counter() {

        if ( !wp_verify_nonce( trx_utils_get_value_gp('nonce'), admin_url('admin-ajax.php') ) )
            wp_die();

        $response = array('error'=>'');

        $id = (int) trx_utils_get_value_gpc('post_id');
        if (isset($_REQUEST['likes'])) {
            $counter = max(0, (int) trx_utils_get_value_gpc('likes'));
            trx_utils_set_post_likes($id, $counter);
        } else if (isset($_REQUEST['views'])) {
            $counter = max(0, (int) trx_utils_get_value_gpc('views'));
            trx_utils_set_post_views($id, $counter);
        }
        echo json_encode($response);
        wp_die();
    }
}

if ( ! function_exists( 'trx_utils_get_post_by_title' ) ) {

	function trx_utils_get_post_by_title( $title, $post_type = 'any', $post_status = 'all' ) {
		$posts = get_posts( array(
			'post_type'              => $post_type,
			'title'                  => $title,
			'post_status'            => $post_status,
			'numberposts'            => 1,
			'update_post_term_cache' => false,
			'update_post_meta_cache' => false,           
			'orderby'                => 'post_date ID',
			'order'                  => 'DESC',
		) );
		$post_got_by_title = null;
		if ( ! empty( $posts[0] ) && is_object( $posts[0] ) ) {
			$post_got_by_title = $posts[0];
		}
		return $post_got_by_title;
	}
}

if ( ! function_exists( 'trx_utils_get_page_by_title' ) ) {

	function trx_utils_get_page_by_title( $title ) {
		return trx_utils_get_post_by_title( $title, 'page' );
	}
}

if ( ! function_exists('trx_utils_str_replace') ) {

	function trx_utils_str_replace( $from, $to, $str ) {
		if ( is_array( $str ) ) {
			foreach ( $str as $k => $v ) {
				$str[ $k ] = trx_utils_str_replace( $from, $to, $v );
			}
		} else if ( is_object( $str ) ) {
			if ( '__PHP_Incomplete_Class' !== get_class( $str ) ) {
				foreach ( $str as $k => $v ) {
					$str->{$k} = trx_utils_str_replace( $from, $to, $v );
				}
			}
		} else if ( is_string( $str ) ) {
			if ( is_serialized( $str ) ) {
				$str = serialize( trx_utils_str_replace( $from, $to, trx_utils_unserialize( $str ) ) );
			} else {
				$str = str_replace( $from, $to, $str );
			}
		}
		return $str;
	}
}

if ( ! function_exists('trx_utils_url_replace') ) {

	function trx_utils_url_replace($from, $to, $str) {
		if ( substr($from, -1) == '/' ) {
			$from = substr($from, 0, strlen($from)-1);
		}
		if ( substr($to, -1) == '/' ) {
			$to = substr($to, 0, strlen($to)-1);
		}
		$from_clear = trx_utils_remove_protocol($from, true);
		$to_clear = trx_utils_remove_protocol($to, true);
		return trx_utils_str_replace(
					array(
/* 1 */					urlencode("http://{$from_clear}"),						// http%3A%2F%2Fdemo.domain%2Furl
/* 2 */					urlencode("https://{$from_clear}"),						// https%3A%2F%2Fdemo.domain%2Furl
/* 3 */					urlencode($from),										// protocol%3A%2F%2Fdemo.domain%2Furl
/* 4 */					urlencode("//{$from_clear}"),							// %2F%2Fdemo.domain%2Furl
/* 5 */					"http://{$from_clear}",									// http://demo.domain/url
/* 6 */					str_replace('/', '\\/', "http://{$from_clear}"),		// http:\/\/demo.domain\/url
/* 7 */					"https://{$from_clear}",								// https://demo.domain/url
/* 8 */					str_replace('/', '\\/', "https://{$from_clear}"),		// https:\/\/demo.domain\/url
/* 9 */					$from,													// protocol://demo.domain/url
/* 10 */				str_replace('/', '\\/', $from),							// protocol:\/\/demo.domain\/url
/* 11 */				"//{$from_clear}",										// //demo.domain/url
/* 12 */				str_replace('/', '\\/', "//{$from_clear}"),				// \/\/demo.domain\/url
/* 13 */				$from_clear,											// demo.domain/url
/* 14 */				str_replace('/', '\\/', $from_clear)					// demo.domain\/url
						),
					array(
/* 1 */					urlencode(trx_utils_get_protocol() . "://{$to_clear}"),
/* 2 */					urlencode(trx_utils_get_protocol() . "://{$to_clear}"),
/* 3 */					urlencode($to),
/* 4 */					urlencode("//{$to_clear}"),
/* 5 */					trx_utils_get_protocol() . "://{$to_clear}",
/* 6 */					str_replace('/', '\\/', trx_utils_get_protocol() . "://{$to_clear}"),
/* 7 */					trx_utils_get_protocol() . "://{$to_clear}",
/* 8 */					str_replace('/', '\\/', trx_utils_get_protocol() . "://{$to_clear}"),
/* 9 */					$to,
/* 10 */				str_replace('/', '\\/', $to),
/* 11 */				"//{$to_clear}",
/* 12 */				str_replace('/', '\\/', "//{$to_clear}"),
/* 13 */				$to_clear,
/* 14 */				str_replace('/', '\\/', $to_clear)
						),
					$str
				);
	}
}

/* Browser-specific classes
------------------------------------------------------------------------------------- */

if ( ! function_exists('trx_utils_browser_classes') ) {
	// A filter hook is commented, because a classes assignment is moved to the js for compatibility with caching plugins
	add_filter( 'body_class', 'trx_utils_browser_classes' );
	function trx_utils_browser_classes( $classes ) {
		// WordPress global vars
		global $is_lynx, $is_gecko, $is_opera, $is_NS4, $is_safari, $is_chrome,
				$is_IE, $is_winIE, $is_macIE, $is_edge,
				$is_iphone,
				$is_apache, $is_nginx, $is_IIS, $is_iis7;
		// Platform
		if ( preg_match("/(iPad|iPhone|iPod)/", $_SERVER['HTTP_USER_AGENT'], $matches) ) {
			if ( ! empty($matches[1]) ) {
				$classes[] = 'ua_ios';
			}
		}
		if ( ! empty($is_iphone) ) {
			$classes[] = 'ua_iphone';
		}
		if ( wp_is_mobile() ) {
			$classes[] = 'ua_mobile';
		}
		// Browser
		if ( preg_match("/[\\s]Firefox\\/([0-9.]*)/", $_SERVER['HTTP_USER_AGENT'], $matches) ) {
			$classes[] = 'ua_firefox';
		}
		if ( ! empty($is_gecko) ) {
			$classes[] = 'ua_gecko';
		}
		if ( ! empty($is_chrome) ) {
			$classes[] = 'ua_chrome';
			if ( preg_match("/[\\s]OPR\\/([0-9.]*)/", $_SERVER['HTTP_USER_AGENT'], $matches) ) {
				if ( ! empty($matches[1]) ) {
					$classes[] = 'ua_opera ua_opera_webkit';
				}
			}
		}
		if ( ! empty($is_safari) ) {
			$classes[] = 'ua_safari';
		}
		if ( ! empty($is_opera) ) {
			$classes[] = 'ua_opera';
		}
		if ( ! empty($is_edge) ) {
			$classes[] = 'ua_edge';
		}
		if ( ! empty($is_IE) ) {
			$classes[] = 'ua_ie';
			if ( ! empty($is_winIE) ) {
				$classes[] = 'ua_ie_win';
			} else if ( ! empty($is_macIE) ) {
				$classes[] = 'ua_ie_mac';
			}
			if ( preg_match("/Trident[^;]*;[\\s]*rv:([0-9.]*)/", $_SERVER['HTTP_USER_AGENT'], $matches)
				||
				preg_match("/MSIE[\\s]*([0-9.]*)/", $_SERVER['HTTP_USER_AGENT'], $matches)
			) {
				if ( ! empty($matches[1]) ) {
					$classes[] = 'ua_ie_' . (int)$matches[1];
					if ( (int)$matches[1] < 11 ) {
						$classes[] = 'ua_ie_lt11';						
					}
				}
			}
		}
		if ( ! empty($is_NS4) ) {
			$classes[] = 'ua_ns4';
		}
		if ( ! empty($is_lynx) ) {
			$classes[] = 'ua_lynx';
		}
		return $classes;
	}
}