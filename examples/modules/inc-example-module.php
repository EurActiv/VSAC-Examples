<?php

/**
 * This file is an example of how to create a module for VSAC.
 *
 * Each file should have a docblock like this one. The file should be in the
 * global application namespace "VGMH" and each function should be
 * pseudo-namespaced by prepending the module name ("example_module_" in this
 * case).
 *
 * Framework required functions should come first, followed by the module's
 * public API, and finally the modules private functions.
 *
 * Sections should be delimited with a formatted inline comment, eg:
 *
 * //-------------------------------------------------------------------------//
 * //-- This is a section                                                   --//
 * //-------------------------------------------------------------------------//
 *
 * Subsections should be delimited with a formatted inline comment without the
 * start/end lines, eg:
 *
 * //-- This is a subsection -------------------------------------------------//
 *
 * The examples use regular inline comments for notes.
 */

namespace VSAC;


// Framework required functions should be the first function definitions.

//----------------------------------------------------------------------------//
//-- Framework required functions                                           --//
//----------------------------------------------------------------------------//

/**
 * Return an array of modules that this module depends on
 *
 * @return array[string]
 */
function example_module_depends()
{
    return array('response');
}

/**
 * The {$module_name}_config_items functions is used to tell the application
 * which configuration items need to be set for the module to function properly.
 * It should return an array of items. Each item should be a numeric array,
 * where the offsets correspond to:
 *
 *   - 0: The name of the configuration item, as used in the first parameter of
 *        config(), option(), framework_config() or framework_option().
 *   - 1: A default item, for type hinting, as used as the second parameter in
 *        config(), option(), framework_config() or framework_option().
 *   - 2: A text description of the configuration item, for the backend.
 *   - 3: A boolean to indicate that backend/documentation screens should not
 *        expose the setting to non-logged in users. Optional, default false.
 *
 * @return array[array]
 */
function example_module_config_items()
{
    return array(
        ['example_module_setting', '', 'A string setting for the example module'],
        // This module uses a driver. The configuration name for the driver should
        // always be named "{$module_name}_driver" so that the driver functions
        // can find it.
        ['example_module_driver', '', 'The driver to use', true]
    );
}

/**
 * Check that the environment is properly configured for this module to function
 * correctly. Check for things like PHP classes.
 *
 * @return string|bool TRUE if the system is set up right, an error string if not.
 */
function example_module_sysconfig()
{
    // This example module has a driver, and so we just pass through to the
    // driver for this.
    return driver_call('example-module', 'sysconfig');
}

/**
 * Run tests that the module functions properly. Will only be called if
 * {$module_name}_sysconfig returns TRUE.
 *
 * @return string|bool TRUE if the tests pass, an error string if not.
 */
function example_module_test()
{
    return true;
}


//----------------------------------------------------------------------------//
//-- Public API                                                             --//
//----------------------------------------------------------------------------//

/**
 * This function just shows how to create/document a public API function. It
 * returns or echos "Hello World"
 *
 * @param bool $echo echo "Hello World" instead of returning it.
 *
 * @return string|void
 */
function example_module_public_function($echo = false)
{
    $hello_world = example_module_private_function();
    if ($echo) {
        echo $hello_world;
    } else {
        return $hello_world;
    }
}


//----------------------------------------------------------------------------//
//-- Private functions                                                      --//
//----------------------------------------------------------------------------//

/**
 * This function just shows how to create/document a private function.
 *
 * @private
 *
 * @return string
 */
function example_module_private_function()
{
    return driver_call('example-module', 'private_function');
}




