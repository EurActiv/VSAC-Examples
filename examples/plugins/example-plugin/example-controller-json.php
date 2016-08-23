<?php

/**
 * Read the documentation in html.php first.
 *
 * This file is an example of how use the key-value store and send JSON
 * responses.
 *
 * See the modules "response" and "kval" for more detail.
 */

namespace VSAC;


// the response we'll eventually send
$baseurl = router_plugin_url(__FILE__, true);
$response = array(
    // It's a good idea to have a default error offset to store error messages
    // in for the consumer to check before trying to process the rest of the response.
    'error' => '',
    // Some hints
    'hints' => array(
        'This API will give you the noon time for the day before and after any date.',
        'Set the \'date\' in the query to to pick a date.',
        'For example: ' . router_add_query($baseurl, ['date'=>'yesterday']),
        'To get this response as JSONP, set the "callback" query parameter',
        'For example: ' . router_add_query($baseurl, ['callback'=>'my_callback']),
    ),
);


// process user input
$date = request_query('date', 'today');
$timestamp = strtotime($date);


// If you encounter an error, bailing out would look something like the block
// below. The second parameter to response_send_json is the expire time of the
// response for caches. When you have an error, set this to something greater
// than zero so consumers don'tkeep pinging your API, but short enough so that
// they can start fetching real data in a reasonable time frame.
if (!$timestamp) {
    $response['error'] = 'We could not process that date!';
    response_send_json($response, 600); // Will die();
}


// Normally you would not want to clean the key:value store on every page load
// like this because it can be slow. Instead it would be better to have a
// maintenence controller that you run with cron. In any case, it's necessary to
// do it on occasion to prevent the database from filling up.
$response = array_merge($response, kval_clean());


// We want to get a formatted date string of yesterday at noon. We'll pretend
// that it's an expensive operation, so we want to cache it.
$timestamp = strtotime(date('Y-m-d', $timestamp) . ' noon');
$day_before_key = 'day_before_' . $timestamp;
$day_before = kval_get($day_before_key);
if (is_null($day_before)) {
    sleep(10); // simulate expensive operation
    $day_before = date('r', $timestamp - (60 * 60 * 24));
    kval_set($day_before_key, $day_before);
}
$response['day_before'] = $day_before;


// The Key:Value store allows for a terser syntax based on callbacks:
$day_after_key = 'day_after_' . $timestamp;
$response['day_after'] = kval_value($day_after_key, null, function () use($timestamp) {
    sleep(10); // simulate expensive operation
    return date('r', $timestamp + (60 * 60 * 24));
});


// maybe we want to add a header to the response
response_header('X-Hello', 'Hello World');


// finally, we send the response.
response_send_json($response);


echo 'This will never execute because sending responses calls die()';

