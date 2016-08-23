<?php

/**
 * Read the documentation in img.php first.
 *
 * This will get local files and send them. It accepts some parameters:
 *
 *   - type: "js" or "css", default css
 *   - minify: "0" or "1", default 1
 *
 * This file is an example of how to
 *   - send a file
 *   - use build functions ("build") to minify files.
 *
 */

namespace VSAC;

use_module('build');

// collect and validate user input
$type = request_query('type', 'css');
$minify = request_query('minify', '1');

if (!in_array($type, ['css', 'js'])) {
    $error = 'Invalid type';
} elseif (!in_array($minify, ['0', '1'])) {
    $error = 'Invalid minify value';
} else {
    $error = '';
}

// User submitted bad data, bail out here.
if ($error) {
    response_send_error(400, $error);
}


// For performance reasons, you'll usually, you'll want to keep the build
// functions in the backend somewhere so that you're not calling this on every
// load. But it's safe to use in the front end as well.
$path = __DIR__ . '/example-controller-file/' . $type . '.' . $type;
if ($minify) {
    $path = $type == 'js'
          ? build_minify_js($path)
          : build_minify_css($path)
          ;
}


// The response functions take care of the rest (304, ranged request,
// headers (etags, content-type, date modified...))
response_send_file($path);


echo "This is dead code, response_send_file will have die()'d";


