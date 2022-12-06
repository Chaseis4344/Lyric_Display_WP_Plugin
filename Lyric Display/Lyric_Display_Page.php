<?php
require 'Lyric_Display_Words.php';

function lyric_display_add_toplevel_menu()
{
    add_menu_page(

        'Lyric Display Settings',
        'Lyric Display',
        'manage_options',
        'lyric_display',
        'lyric_display_display_page',
        'dsashicons-admin-generic',
        null
    );
    add_action('admin_menu','lyric_display_add_toplevel_menu');
}

function lyric_display_display_page()
{
    if(!current_user_can('manage_options'))return;
    ?>
    <h1><?php  echo esc_html(get_admin_page_title())?></h1>
    <form method = "post" action ="Lyric_Display_Wordds.php">
        <p>Author</p><br>
            <p><input type ="text" id = "lyric_display_author"> </input></p><br>
        <p>Song Name</p><br>
             <p><input type ="text" id = "lyric_display_songname"> </input></p><br>
        <p>Lyrics</p><br>
            <p><input type ="text" id = "lyric_display_body"> </input></p><br>
        <p><input type ="submit" value = "Submit Lyrics"> </input></p>
    </form>
    <?php
}
