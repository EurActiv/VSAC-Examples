<?php

$config = array(

    // configuration for the example plugin
    'example_plugin_setting' => 'Example value',

    // configuration for the example module
    'example_module_setting' => 'Example value',
    // since example-module uses drivers
    'example_module_driver' => 'example-english',

    // configuration for the callmap
    'callmap_driver'        => 'sqlite',

    // configuration for the key-value store
    'kval_driver' => 'sqlite',           // the driver for the store
    'kval_ttl'    => 60 * 60 * 24 * 7,   // store items for a week
    'kval_quota'  => 1.0 * 1024 * 1024,  // must be a float!

    // configuration for the cache layer
    'cal_driver' => 'sqlite',                 // the driver for the store
    'cal_ttl'    => 60 * 60 * 24 * 7,         // store items for a week
    'cal_quota'  => 1.0 * 1024 * 1024 * 128,  // must be a float!
);
