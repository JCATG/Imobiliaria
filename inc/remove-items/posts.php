<?php
function remove_posts_menu() {
    remove_menu_page('edit.php');
}

add_action('admin_menu', 'remove_posts_menu');
