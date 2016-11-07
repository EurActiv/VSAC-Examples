<?php

/**
 * This file is an example driver for the example module.
 *
 * @see inc-example-module.php
 *
 * Driver functions should be pseudo-namespaced with the driver name. They
 * should correspond to the module function name. So, the module function:
 *
 *     "{$module_name}_function_name"
 *
 * becomes:
 *
 *     "{$driver_name}_function_name"
 *
 * Typically, a single line docblock with a "see" annotation should be enough
 * for these functions.
 *
 * Internal private functions should just avoid name collisions with the module.
 * They should feature a complete docblock and a "private" annotation.
 *
 */

namespace VSAC;

//----------------------------------------------------------------------------//
//-- Implementation                                                         --//
//----------------------------------------------------------------------------//

/** @see example_module_sysconfig */
function example_module_english_sysconfig()
{
    return true;
}

/** @see example_module_private_function */
function example_module_english_private_function()
{
    return example_module_english_get_phrase("world.hello");
}

//----------------------------------------------------------------------------//
//-- Private functions                                                      --//
//----------------------------------------------------------------------------//


/** 
 * Get the human-readable english version of a message.
 *
 * @private
 *
 * @param string $message the machine message
 *
 * @return string
 */
function example_module_english_get_phrase($phrase)
{
    switch ($phrase) {
        case 'world.hello':
            return "Hello World";
        case 'world.goodbye':
            return "Goodbye World";
        default:
            return '??' . $phrase . '??';
    }
}


