<?php

function str_starts_with( $haystack, $needle ) {
  return strpos( $haystack , $needle ) === 0;
}

function deleteDir($path) {
  return is_file($path) ?
          @unlink($path) :
          array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
}

?>