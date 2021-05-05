<?php

function str_starts_with( $haystack, $needle ) {
    return strpos( $haystack , $needle ) === 0;
}

function deleteDir($path) {
    return is_file($path) ? @unlink($path) : array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
}

function set_anime_cookie($anime, $episode) {
    if($_COOKIE[$anime]) {
        $arr_cookie_episodes = json_decode($_COOKIE[$anime], true);
        var_dump($arr_cookie_episodes);
        array_push($arr_cookie_episodes, $episode);
        setcookie($anime,$arr_cookie_episodes);
    } else {
        setcookie($anime, json_encode($episode));
    }
    
}

?>