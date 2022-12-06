<?php

/*
 * Plugin Name: Lyric Display
 * Author: Michael Chase Townsend
*/

//All variables will be named $lyric_display_... to avoid stepping on toes


require 'Lyric_Display_Page.php';
//Returns an array generated by exploding all text in "lyric_display_lyric_cache.txt"
function lyric_display_get_lyrics()
{
    //Open the local lyric cache
   $lyric_file = fopen(plugin_dir_path(__FILE__)."lyric_display_lyric_cache.txt","r",true,null);
    return explode("\n",fread($lyric_file,filesize(plugin_dir_path(__FILE__)."lyric_display_lyric_cache.txt")));


}

//Final Steps, Retrieving input lyrics output, and formatting
function lyric_display()
{
    //Set lyrics
    lyric_display_set_lyrics();
    //Get lyrics and process
    $lyrics= lyric_display_get_lyrics();
    $lang   = '';
    if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
        $lang = ' lang="en"';
    }

    //This will always be the case due to file formatting and forms
    $artist = $lyrics[0];
    $song= $lyrics[1];
    $len = count($lyrics)-1;

    $lyric_index = mt_rand(2,$len);
    $used = wptexturize($lyrics[$lyric_index]);
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