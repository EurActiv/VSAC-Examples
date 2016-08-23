<?php

/**
 * The functions file is where a plugin is bootstrapped. It is run first before
 * anything else. All of the plugins functions should be registered here.
 *
 * Each file should have a docblock like this one. The file should be in the
 * global application namespace "VSAC" and each function should be
 * pseudo-namespaced by prepending the plugin name ("example_plugin_" in this
 * case).
 *
 * Framework required functions should come first, followed by the functions
 * to be used by controllers.
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

//----------------------------------------------------------------------------//
//-- Framework required functions                                           --//
//----------------------------------------------------------------------------//

/**
 * The {$plugin_name}_config_items function is what lets the backend know what
 * configuration settings the plugin requires. It works exactly the same as the
 * equivalent function in the modules.
 *
 * @see example_module_config_items() for more details.
 *
 * @return array()
 */
function example_plugin_config_items()
{
    return array(
        ['example_plugin_setting', '', 'A string setting for the example plugin'],
    );
}

/**
 * The {$plugin_name}_bootstrap function bootstraps the plugin.  It is mostly
 * used for requesting modules, but you can do anything here. It runs very early
 * in every request to the plugin, so try to keep it slim.
 *
 * @return void;
 */
function example_plugin_bootstrap()
{
    use_module('filesystem');
    use_module('kval');
    use_module('cal');
}


//----------------------------------------------------------------------------//
//-- Plugin functions                                                       --//
//----------------------------------------------------------------------------//

function example_plugin_display_file($title, $file = false, $controller = false)
{
    if (!$file) {
        $file = $title;
    }
    backend_collapsible($title, function () use ($file, $controller, $title) {
        $err = function ($msg) use ($file) {
            $file = htmlspecialchars($file);
            $msg = htmlspecialchars($msg);
            printf('<p>%s: <code>%s</code></p>', $msg, $file);
        };
        $abspath = filesystem_realpath($file);
        if (!$abspath) {
            return $err('Could not locate file');
        }
        echo '<p>';
        if ($title != $file) {
            printf('File: <code>%s</code>', $file);
        }
        if ($controller) {
            printf(
                ' | <a href="%s" target="_blank">View controller in action</a>',
                router_plugin_url(basename($file))
            );
        }
        echo '</p>';
        echo backend_code(wordwrap(file_get_contents($abspath), 100));

    }, 'h5');
}

/**
 * Print a link that looks like the collapsible title links
 *
 * @param string $text the link text
 * @param string $url the URL to link to
 *
 * @return void
 */
function example_plugin_link($text, $url)
{
    ?><div>
        <h5>
            <i class="fa fa-angle-double-right"></i>
            <a href="<?= htmlspecialchars($url) ?>"><?= htmlspecialchars($text) ?></a>
        </h5>
        <hr>
    </div><?php
}
