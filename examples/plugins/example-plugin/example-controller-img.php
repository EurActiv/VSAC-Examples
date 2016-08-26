<?php

/**
 * Read the documentation in json.php first.
 *
 * This will get an image from httpbin.org and resizes it. Query parameters:
 *
 *   - image: one of svg, png or jpeg, defaults to svg
 *   - width: an integer 50 to 200, defaults to 75
 *
 * This file is an example of how to
 *   - send an arbitrary HTTP response
 *   - use the caching layer ("cal") to store resources (aka "items) and
 *     manipulations of resources (aka, "permutations")
 *   - basic use of the "image" module to work with images
 *   - basic use of the "http" module to fetch resources
 *
 */

namespace VSAC;

use_module('http');
use_module('image');

// collect and validate user input
$width = (int) request_query('width', 75);
$image = request_query('image', 'svg');

if ($width > 200) {
    $error = 'Width is too big';
} elseif ($width < 50) {
    $error = 'Width is too small';
} elseif (!in_array($image, ['svg', 'jpeg', 'png'])) {
    $error = 'Invalid image';
} else {
    $error = '';
}

// User submitted bad data, bail out here.
if ($error) {
    response_send_error(400, $error);
}

// Here we use the cache layer.
$jpeg = cal_get_permutation(
    // Item key, unique to the item. URLs work well.
    $image,
    // the callback to create the item if it can't be found
    function ($image) {
        $url = 'https://httpbin.org/image/' . $image;
        $response = http_get($url);
        // return NULL if there was an error, the cache layer won't store it and
        // you won't have bad data cached. Also, if there is an expired item in
        // the cache, returning NULL will "resurrect" it until the data source
        // is back up.
        if (!$response['body'] || $response['error']) {
            return null;
        }
        return $response['body'];
    },
    // permutation key, unique to the tranformation, does not have to be unique to the item
    $width,
    // Closures are are best for the callbacks. The callback will receive
    // the key as the second value, but the keys have limits and trying to pack
    // all your data in it and then unpack it in the function will be tough.
    function ($blob, $width) use ($image) {
        if ($image == 'svg') {
            $blob = image_svg_to_icon_blob($blob, $height, $width);
        }
        return image_scale_blob($blob, ['width'=>1, 'height'=>1], $width, 'resize');
    }
);

// Always check the results, and send an error if there is one
if (!$jpeg) {
    response_send_error(404, 'Could not find image');
}

// Send the response; be sure to set the content type
response_send($jpeg, array(
    'Content-Type' => 'image/jpeg',
));

echo "This is dead code, response_send will have die()'d";


