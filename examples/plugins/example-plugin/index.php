<?php

/**
 * This is the documentation for the example plugin. Read the other files first.
 */

namespace VSAC;

use_module('backend-all');

backend_head('Example Plugin');

example_plugin_display_file(
    'Read First: extending the application',
    'docs/overview.md'
);

example_plugin_display_file(
    'HOWTO: configure the application',
    'docs/configuration.md'
);

example_plugin_display_file(
    'Example: configuration file',
    'config/example-plugin.php'
);

example_plugin_display_file(
    'HOWTO: write a plugin',
    'docs/plugins.md'
);

example_plugin_link(
    'Examples: write a plugin',
    router_plugin_url('plugin-examples.php')
);

example_plugin_display_file(
    'HOWTO: write a module',
    'docs/modules.md'
);

example_plugin_link(
    'Examples: write a module',
    router_plugin_url('module-examples.php')
);



backend_foot();
