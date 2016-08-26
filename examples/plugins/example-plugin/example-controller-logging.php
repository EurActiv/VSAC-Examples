<?php

/**
 * Read the documentation in html.php first.
 *
 * This file is an example of how use the application's built in logging
 * functions.
 *
 * See the modules "callmap" and "error" for more detail.
 */

namespace VSAC;

// get some data from a third party
use_module('http');
$url = 'http://httpbin.org/get?a=1&b=2&c=3';
$response = http_get($url);
$json = json_decode($response['body'], true);

// Logging calls with the callmap is very simple: just call the method
// callmap_log($provider), where provider is the location from which you're
// getting your data; URLs work well, the hostname will be logged as the
// provider (not the whole URL).
callmap_log($url);

// The application hooks into php's normal error processing, so it'll obey
// error_reporting settings. By default, it will log errors to the sqlite error
// database, you can change this by setting the "error_driver" configuration
// setting to "nooperror". This change can be made either in "config/_framework.php"
// for application-wide effect, or in your plugin's config file for just your
// plugin.
if (!is_array($json)
    || empty($json['args'])
    || empty($json['args']['a'])
    || $json['args']['a'] !== '1'
) {
    trigger_error('Response was not properly formed');
}

response_send_json($json['args']);


echo 'This will never execute because sending responses calls die()';

