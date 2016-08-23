<?php

/**
 * Read the documentation in functions.php first.
 *
 * This file is an example of how to manage versioned assets
 *
 * Be sure to read about versioned assets workflows in docs/versioning.md
 */

namespace VSAC;

use_module('backend-all');

// versioning assets is provided by the "version" module. It must be specifically
// included (usually with the plugin bootstrap function).
use_module('version');

// this is how you get the current version
version_get($version);

// This is kind of a gotcha. Versioning automatically selects whether to serve
// a minified file or not, so you need to check that it exists. It does not
// happen automatically because some users want better control of minification
// logic.
if ($version == '-edge' && auth_is_authenticated()) {
    build_minify_js(__DIR__ . '/v-edge/example.js');
}


backend_head('Example Versioning', [], function () {

    // Use version_file() to get the path to a versioned file in the plugin
    printf(
        '<script src="%s"></script>',
        router_plugin_url(version_file('example.js'))
    );

});

// The version_header function handles allowing users to switch between versions
// and for authenticated users to manage publishing/reverting versions.
version_header();

example_plugin_display_file('About Versioning Assets', 'docs/versioning.md');

// You can create versioned documentation by placing it with the 'v{$n}'
// directory, then using version_examples() instead of docs_examples();
version_examples();

backend_foot();
