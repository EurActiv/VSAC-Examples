<?php

/**
 * This controller demonstrates how to use the example module
 */

namespace VSAC;

use_module('backend-all');

// Import the module here
use_module('example-module');

backend_head('Using the example module');

// use a function in the module
?><p>The example module says: <code><?= example_module_public_function() ?></code><?php

// display a configuration table, including the configuration for the example module
backend_config_table();

backend_foot();
