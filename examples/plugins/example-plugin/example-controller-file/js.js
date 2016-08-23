/*!
 * @preserve
 * This is a preserve comment, as marked with the "preserve" annotation. It
 * should be present even in the minified file. You can also use a "license"
 * annotation. NOTE: the "!" at the beginning of the comment has no effect as
 * with CSS files, you need to add the annotation.
 */

/*jslint browser, multivar, single */
/*global window, jQuery */

/**
 * This is a doc comment, it will be removed on minify. Note the JSLint comments
 * above.  This application uses uglifyjs to minify the files. Uglify can cause
 * breakage in wonky javascript, so be sure to lint it with JSLint or JSHint
 * or something similar.
 */


(function (global, $) {
    $(function () {
        global.alert('Hello World!');
    });
}(window, jQuery));
