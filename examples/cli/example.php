<?php

/**
 * An example CLI command. It's very basic, this example covers pretty much
 * everything.
 */

namespace VSAC;

// Print a title, wrapped in a given character
cli_title('Example CLI Command', '@');

// print some text, maybe indented
cli_say("
    I've got something to say! Lorem ipsum dolor sit amet, consectetur
    adipiscing elit. Duis lacinia aliquet felis mattis fermentum. Vestibulum non
    iaculis ligula. Etiam egestas semper eleifend. Quisque sed sem sit amet sem
    maximus sollicitudin in accumsan mauris. Suspendisse efficitur est sed ipsum
    convallis, nec aliquet leo sollicitudin.
    ", ' *** ');

// output a line filled with a character
cli_space('@');

// make a section
$answers = cli_section('Example section', function () {
    $bool = cli_ask_bool('Do chickend have lips', true);
    $select = cli_ask_select(
        'Pick your favorite number',
        array('one', 'two', 'three', 'and a quarter'),
        'three'
    );
    $string = cli_ask(
        'How are you today',
        'good',
        'good, bad or indifferent',
        function ($answer) {
            if (!in_array($answer, array('good', 'bad', 'indifferent'))) {
                return cli_err('That is not a valid mood');
            }
            return $answer;
        }
    );
    return compact('bool' 'select', 'string');
});

cli_say($answer['bool'] ? "Chickens don't have lips!": "You know your chickens");
cli_say('Your favorite number: ' . $answer['select']);
cli_say("Your mood is " . $answer['string']);


