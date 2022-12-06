<?php

/*
 * Plugin Name: Lyric Display
 * Author: Michael Chase Townsend
 * Version: 1.0.0
 * Description: Fun little Project used to display Lyrics in the top left of the admin panels, you dont have to use songs either, you can use quotes by your favorite person
*/

//All variables will be named $lyric_display_... to avoid stepping on toes


require 'Lyric_Display_Page.php';





//Final Steps, Retrieving input lyrics output, and formatting
function lyric_display()
{
    //Get lyrics as array from DB, then separate based on storage
    $lyrics= explode("\n",get_option('lyric_display_body',"You got this\nKeep Going\nNobody is Perfect"));
    $lang   = '';
    if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
        $lang = ' lang="en"';
    }

    //This will always be the case due to file formatting and forms
    $artist = get_option('lyric_display_author',"Bad Name");
    $song= get_option('lyric_display_song',"Bad Name");
    $len = count($lyrics)-1;

    $lyric_index = mt_rand(0,$len);
    $used = wptexturize( '"'.$lyrics[$lyric_index].'" -'.$song.' by '.$artist);

    //We can format this with CSS in a second
    printf(
        '<p id="lyrics">
                        <span class="screen-reader-text">%s </span>
                         <span dir="ltr" %s>%s</span>
                </p>',
        __( 'Quote from '.$song.', by'.$artist.':' ),
        $lang,
        $used
    );
}




add_action('admin_notices','lyric_display');

function lyric_css() {
    echo "
	<style>
	#lyric {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #lyric {
		float: left;
	}
	.block-editor-page #lyric {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#lyric,
		.rtl #lyric {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action('admin_head','lyric_css');