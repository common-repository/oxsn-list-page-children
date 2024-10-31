<?php


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


//[oxsn_list_page_children post_type="" id="" exclude="" exclude_tree="" class=""]
if ( ! function_exists ( 'oxsn_list_page_children_shortcode' ) ) {

	add_shortcode('oxsn_list_page_children', 'oxsn_list_page_children_shortcode');
	function oxsn_list_page_children_shortcode( $atts, $content = null ) {
		$content = shortcode_unautop(trim($content));
		$a = shortcode_atts( array(
			'class' => '',
			'page_id' => '',
			'exclude' => '',
			'exclude_tree' => '',
			'post_type' => 'page',
		), $atts );

		$list_page_children_class = esc_attr($a['class']);
		$list_page_children_page_id = esc_attr($a['page_id']);
		$list_page_children_exclude = esc_attr($a['exclude']);
		$list_page_children_exclude_tree = esc_attr($a['exclude_tree']);
		$list_page_children_post_type = esc_attr($a['post_type']);

		if ($list_page_children_page_id != '') :
			$ID = $list_page_children_page_id;
			$ancestors[] = $ID;
		else :
			$ID = get_the_ID();
			$ancestors = get_post_ancestors($ID);
			$ancestors = array_reverse($ancestors);
			$ancestors[] = $ID;
		endif;

		$output=
		'<h3 class="oxsn_list_page_children_title">' . get_the_title($ancestors[0]) . '</h3>' .
		'<ul class="oxsn_list_page_children ' . $list_page_children_class . '">'.
		wp_list_pages('child_of=' . $ancestors[0] . '&post_type=' . $list_page_children_post_type . '&exclude=' . $list_page_children_exclude . '&exclude_tree=' . $list_page_children_exclude_tree . '&title_li=&sort_column=menu_order&echo=0') .
		'</ul>';

		return $output;

	}

}


?>