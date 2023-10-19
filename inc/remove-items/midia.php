<?php
function remove_midia_menu() {
    remove_menu_page('upload.php');
}

add_action('admin_menu', 'remove_midia_menu');