<?php

/**
 * Read the documentation in functions.php first.
 *
 * This file is an example of how to create manage authenticated users and how
 * to write documentation.
 *
 */

namespace VSAC;

use_module('backend-all');

// Authentication is provided by the "auth" module. You don't need to include it
// specifically because it will be pulled in with 'backend-all'; we do it here
// for documentation.
use_module('auth');

// Documentation functions are provided by the "docs" module. Again, it is part
// of the "backend-all" module but included here for clarity.
use_module('docs');


// Authorization is very simple: either a user is logged in (authenticated) and
// therefore authorized, or the user is not logged in and is not authorized.
// There are typically two functions you care about:
//
//   * auth_is_authenticated(): Returns a simple boolean, TRUE (logged in) or 
//     FALSE (not logged in). It is useful for selectively showing or hiding
//     sensitive bits of information on a page.
//   * auth_require_authenticated(): Will check if a user is logged in and
//     redirect to the login page if not. It is useful for hiding an entire page
//     behind a log in.
//   
// NOTE: due to the way sessions work, you should be careful to call auth
// functions before any output is sent to the browser. When using the backend
// functions to create HTML pages, this is not a concern because the backend_head
// will do it for you. However, in any other case you need to do it explicitly.

$my_message = auth_is_authenticated()
            ? 'This is super secret information'
            : 'Please log in to see the super secret information'
            ;


backend_head('Example Documentation');

?><p><b>Hey!</b> This is secret stuff: <?= $my_message ?></p><?php

// To create examples, put a directory in your plugin called examples, and
// put your example documentation and sources there. The directory should have
// one of these structures:
// Flat:
//
//     plugins/{$current_plugin}/examples
//     |-- {$name_one}-title.txt     # the example title
//     |-- {$name_one}-about.{$ext}  # the example documentation
//     |-- {$name_one}-source.{$ext} # (optional) a code example
//     |-- {$name_two}-title.txt
//     |-- {$name_two}-about.{$ext}
//     `-- {$name_two}-source.{$ext}
//
// Sub directories:
//
//     plugins/{$current_plugin}/examples
//     |-- {$name_one}
//     |   |-- title.txt     # the example title
//     |   |-- about.{$ext}  # the example documentation
//     |   `-- source.{$ext} # (optional) a code example
//     `-- {$name_two}
//         |-- title.txt
//         |-- about.{$ext}
//         `-- source.{$ext}
//
//
// Then, in the controller, call the function:
//
//     docs_examples();
//
// Examples and sources can be in the formats: html, php, js, css, txt. PHP
// files will be evaluated and the output used as the content. You can overide
// most of the behavior of this function, see the source of the docs module for
// instructions.

docs_examples();

?><h3>The files that created this example accordion</h3><?php

$base = 'plugins/' . plugin() . '/examples';
example_plugin_display_file($base . '/01-example/title.txt');
example_plugin_display_file($base . '/01-example/about.php');
example_plugin_display_file($base . '/01-example/source.php');
example_plugin_display_file($base . '/02-example-title.txt');
example_plugin_display_file($base . '/02-example-about.html');
example_plugin_display_file($base . '/02-example-source.js');


backend_foot();
