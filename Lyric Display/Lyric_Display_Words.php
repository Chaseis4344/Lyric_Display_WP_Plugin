<?php

function lyric_display_checkWord( $word)
{
    if(strpos($word,"\n") !==strlen($word))
    {
        return $word."\n";
    }
    else
    {
        return $word;
    }
}


function lyric_display_set_lyrics()
{

    //Get Data from form
    $lyric_display_song = $_POST["lyric_display_songname"];
    $lyric_display_author = $_POST["lyric_display_author"];
    $lyric_display_lyrics = $_POST["lyric_display_body"];

    if(!empty($lyric_display_song)&&!empty($lyric_display_lyrics)&&!empty($lyric_display_author))
    {
        //Get File
        $lyric_display_file = fopen(plugin_dir_path(__FILE__)."lyric_display_lyric_cache.txt","w",true);

        //Format Data
        $lyric_display_song = lyric_display_checkWord($lyric_display_song);
        $lyric_display_lyrics = lyric_display_checkWord($lyric_display_lyrics);
        $lyric_display_author = lyric_display_checkWord($lyric_display_author);

        //Write to file
        fwrite($lyric_display_file,$lyric_display_author);
        fwrite($lyric_display_file,$lyric_display_song);
        fwrite($lyric_display_file,$lyric_display_lyrics);
    }



}
