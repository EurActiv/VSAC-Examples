<?php

/**
 * This file is an example noop driver for the example module. Every driver
 * module should have a NOOP driver that does as little as possible, just enough
 * to pass unit tests and preferably without side effects.
 *
 * read first: example-module-english.php
 *
 */

namespace VSAC;

//----------------------------------------------------------------------------//
//-- Implementation                                                         --//
//----------------------------------------------------------------------------//

/** @see example_module_sysconfig */
function example_module_noop_sysconfig()
{
    return true;
}

/** @see example_module_private_function */
function example_module_noop_private_function()
{
    return 'world.hello';
}
