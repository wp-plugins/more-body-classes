<?php
/*
Plugin Name: More Body Classes
Description: Body tag with more classes such as locale and page/posttype slug.
Author: Shinichi Nishikawa
Author URI: http://nobil.cc/
Text Domain: more-body-classes
Domain Path: /languages/
Version: 1.0
*/

/*  Copyright 2015-2015 Shinichi Nishikawa

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


add_filter( 'body_class', 'add_body_class_locale' );
function add_body_class_locale( $classes ) {

	$classes[] = 'locale-' . get_bloginfo( 'language' );

	if ( !is_home() && !is_front_page() && is_singular() ) {

		global $post;

		if ( isset( $post ) ) {

			$page_slug = $post->post_type . '-slug-' . $post->post_name;
			$classes[] = $page_slug;

		}

	}

	return $classes;

}
