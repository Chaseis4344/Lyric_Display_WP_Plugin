<?php

require 'Lyric_Display_Callbacks.php';
 function lyrics_display_settings_init()
 {
     //Register new setting
     register_setting('general', 'lyric_display_author');
     register_setting('general', 'lyric_display_song');
     register_setting('general', 'lyric_display_body');


     //New Section
     add_settings_section(
             'lyric_display_section_dev',
         __('Lyrics Display','lyric_display'), 'lyric_display_section_dev_cb',
         'general'
     );
     //New Field
     add_settings_field(
             'lyrics_display_settings_field_author',
               'Author', 'lyric_display_setting_field_cb_author',
            'general',
         'lyric_display_section_dev'
     );
     add_settings_field(
         'lyrics_display_settings_field_song',
         'Song Name', 'lyric_display_setting_field_cb_song',
         'general',
         'lyric_display_section_dev'
     );
     add_settings_field(
         'lyrics_display_settings_field_body',
         'Lyrics', 'lyric_display_setting_field_cb_body',
         'general',
         'lyric_display_section_dev'
     );
 }
add_action('admin_init','lyrics_display_settings_init');

