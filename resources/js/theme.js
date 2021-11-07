window._ = require("lodash");

try {
    // window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require("jquery");
    window.bootstrap = require("bootstrap/dist/js/bootstrap.bundle.min.js");

    // require('bootstrap');
} catch (e) {}
