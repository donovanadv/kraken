<?php
// Creates an encoded svg for src, lazy loading. This helps prevent layout shift while the real img is loaded in.
function lazy_svgplaceholder($isAcfImage=false, $image) {
    if($isAcfImage){
        if($image['width']){
            $width = $image['width'];
        }
        if($image['height']){
            $height = $image['height'];
        }
    } else{
        $width = getimagesize($image)[0];
        $height = getimagesize($image)[1];
        // $viewbox = "viewBox='0 0 100 100'";
    }
    // https://codepen.io/tigt/post/optimizing-svgs-in-data-uris
    // https://yoksel.github.io/url-encoder/
    $color = 'fff';
    $optimizedUrl = "data:image/svg+xml,%3Csvg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 {$width} {$height}' style='enable-background:new 0 0 {$width} {$height};' xml:space='preserve'%3E%3Cstyle type='text/css'%3E .st0%7Bfill:%23{$color};%7D%0A%3C/style%3E%3Crect class='st0' width='{$width}' height='{$height}'/%3E%3C/svg%3E%0A";
    return $optimizedUrl;
}
?>

