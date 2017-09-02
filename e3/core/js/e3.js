/**
 * This file is part of "EpicElementsEditor"
 *
 * @author Sebastian Antosch <s.antosch@i-san.de>
 * @copyright 2017 I-SAN.de Webdesign & Hosting GbR
 * @link http://i-san.de
 *
 * @license MIT
 */

(function ($, ko, config) {

    var

        /**
         * Builds a view model for a given module
         * @param {string} name
         * @return {{}}
         */
        getViewModelForElement = function (name) {
            var viewModel = {
                _type: name
            };

            if (config.modules && config.modules[name]) {
                $.each(config.modules[name], function (i, field) {
                    viewModel[field.key] = ko.observable(field.default);
                });
            }

            return viewModel;
        },

        /**
         * A viewModel for one E3
         * @param {array} elements
         * @constructor
         */
        E3model = function (elements) {
            this.elements = ko.observableArray(elements || []);

            /**
             * @param elements
             */
            this.setElements = function (elements) {
                this.elements(elements);
            }
        };

    /*
     * Attach an E3Model to every editor
     */
    $(document).ready(function () {
        $('.e3-area').each(function (i, node) {
            ko.applyBindings(new E3model(), node);
        });
    });


})(window.jQuery, window.ko, window.e3config);