<?php

/**
 * This is the documentation for the example plugin. Read the other files first.
 */

namespace VSAC;

use_module('backend-all');

backend_head('Writing Plugins');


example_plugin_display_file(
    'An example module',
    'modules/inc-example-module.php'
);
example_plugin_display_file(
    'Module drivers',
    'modules/example-module-drivers/example-english.php'
);

example_plugin_display_file(
    'Using modules in controllers',
    'plugins/' . plugin() . '/module-example.php',
    true
);

example_plugin_link(
    'Back to index',
    router_plugin_url('index.php')
);


backend_foot();
