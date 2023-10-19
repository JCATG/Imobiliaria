<?php
function remove_comments_menu() {
    remove_menu_page('edit-comments.php');
}

add_action('admin_menu', 'remove_comments_menu');
