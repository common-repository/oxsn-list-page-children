<?php


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


if ( ! function_exists ( 'oxsn_list_page_children_quicktags' ) ) {

	add_action( 'admin_print_footer_scripts', 'oxsn_list_page_children_quicktags' );
	function oxsn_list_page_children_quicktags() {

		if ( wp_script_is( 'quicktags' ) ) {

		?>

			<script type="text/javascript">
				QTags.addButton( 'oxsn_list_page_children_quicktag', '[oxsn_list_page_children]', '[oxsn_list_page_children post_type="page" id="" class=""]', '[/oxsn_list_page_children]', 'oxsn_list_page_children', 'List Page Children', 201 );
			</script>

		<?php

		}

	}

}


?>