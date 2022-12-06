<?php

function lyric_display_section_dev_cb()
{/*
     $setting_author = get_option('lyric_display_author');
     $setting_song = get_option('lyric_display_song');
     $setting_body = get_option('lyric_display_body');
     ?>
     <p>Author</p> <input type ="text" name = "lyric_display_author"><br>
     <p>Song Name</p> <input type ="text" name = "lyric_display_song"><br>
     <p>Lyrics</p><input type ="text" name = "lyric_display_body"><br>
<?php */

};


function lyric_display_setting_field_cb_author()
{
    $setting_author = get_option('lyric_display_author');

    ?>

    <input type ="text" name = "lyric_display_author">

    <?php

}

function lyric_display_setting_field_cb_song()
{

    $setting_song = get_option('lyric_display_song');

    ?>


    <input type ="text" name = "lyric_display_song">

    <?php

}
function lyric_display_setting_field_cb_body()
{

    $setting_body = get_option('lyric_display_body');
    ?>


    <textarea row = "50" col="10" type ="text" name = "lyric_display_body"></textarea>
    <?php

}