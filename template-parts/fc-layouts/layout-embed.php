<?php

// get iframe HTML
$iframe = get_sub_field('oembed');


// use preg_match to find iframe src
preg_match('/src="(.+?)"/', $iframe, $matches);
$src = $matches[1];


// add extra params to iframe src
$params = array(
    'rel'    => 0
);

$new_src = add_query_arg($params, $src);

$iframe = str_replace($src, $new_src, $iframe);


// add extra attributes to iframe html
$attributes = 'frameborder="0" class="embed-responsive-item"';

$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

// echo wrapper div
echo '<div class="embed-responsive embed-responsive-16by9">';
// echo $iframe
echo $iframe;
// close wrapper div
echo '</div>';

?>
