<?php

/**
 * This is the documentation for the example plugin. Read the other files first.
 */

namespace VSAC;

use_module('backend-all');

backend_head('Writing Plugins');


example_plugin_display_file(
    'Registering the plugin',
    'plugins/' . plugin() . '/_info.ini'
);
example_plugin_display_file(
    'Bootstrapping and shared functions',
    'plugins/' . plugin() . '/functions.php'
);
example_plugin_display_file(
    'HTML Controllers',
    'plugins/' . plugin() . '/example-controller-html.php',
    true
);
example_plugin_display_file(
    'JSON Controllers and Simple Caching',
    'plugins/' . plugin() . '/example-controller-json.php',
    true
);
example_plugin_display_file(
    'Complex caching, image processing, fetching foreign assets',
    'plugins/' . plugin() . '/example-controller-img.php',
    true
);
example_plugin_display_file(
    'Processing local files, minifying',
    'plugins/' . plugin() . '/example-controller-file.php',
    true
);
example_plugin_display_file(
    'Creating documentation, access control',
    'plugins/' . plugin() . '/example-controller-documentation.php',
    true
);
example_plugin_display_file(
    'Versioning assets',
    'plugins/' . plugin() . '/example-controller-versioning.php',
    true
);
example_plugin_display_file(
    'Logging calls (call map) and errors',
    'plugins/' . plugin() . '/example-controller-logging.php',
    true
);
example_plugin_link(
    'Back to index',
    router_plugin_url('index.php')
);


backend_foot();
