<?php

/**
 * Read the documentation in functions.php first.
 *
 * PHP files in a plugin that are not functions.php are considered controllers.
 * They do some processing and send a response.
 *
 * This file is an example of how to create an HTML page for the application.
 * These are usually used for documentation and examples.
 *
 */

namespace VSAC;


// The first thing to do after the namespace is to call use_module() to bring in
// functionality that is used by this controller only. The "backend-all" module
// brings in most of what you need for an HTML file.
use_module('backend-all');

// The backend_head function takes care of printing the document head
// and the header for the screen.
backend_head('Example HTML Page', [], function () {
    ?><script>(function () {
        'use strict';
        // you can include additional markup in the head with the callback to
        // backend head. You can expect jQuery and Bootstrap to already be
        // loaded
        $(function () {
            alert('Example plugin loaded');
        })
    }());</script><?php
});

// after the head, you can just start writing HTML or call more backend
// functions to display pre-formatted information.

?>
<p>Hello world</p>

<?php

// be sure to close the document with backend_foot()
backend_foot();
