# VSAC-Examples

This package is an extension for the [Very Simple Asset Coordinator][1] (VSAC).  It contains developer documentation, example plugins and example modules.

##Installation

Download either the whole extension or just the [PHAR archive](./examples.phar). Upload it to your web host and modify your front controller to use it. It should look something like this:

    <?php
    set_include_path(
        '/path/to/data/__application_phar__'
        . PATH_SEPARATOR .
        'phar:///path/to/vsac/application.phar'
    );
    require_once "application.php";
    VSAC\set_data_directory('/path/to/data');
    // this is the line you should add, after data directory and before bootstrap
    VSAC\add_include_path('phar://path/to/vsac/examples.phar');

    VSAC\bootstrap_web($debug = false);
    VSAC\front_controller_dispatch();



##License and contributions

This application is provided under the [MIT License][2]. We'd be very happy to get contributions, they must simply be made with the same license.

[1]: https://github.com/EurActiv/VSAC
[2]: https://opensource.org/licenses/MIT
