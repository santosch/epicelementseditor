/**
 * This file is part of "EpicElementsEditor"
 *
 * @author Sebastian Antosch <s.antosch@i-san.de>
 * @copyright 2017 I-SAN.de Webdesign & Hosting GbR
 * @link http://i-san.de
 *
 * @license MIT
 */

(function ($, ko) {

    var
        /**
         * Builds a view model for a given module
         * @param {string} name
         * @return {{}}
         */
        getViewModelForElement = function (name) {
            var config = window.e3config,
                viewModel = {
                    _type: name
                };

            if (config && config[name]) {
                $.each(config[name], function (i, field) {
                    viewModel[field.key] = ko.observable(field.default);
                });
            }

            console.log(viewModel);
            return viewModel;
        },

        /**
         * A viewModel for one E3
         * @param {array} elements
         * @constructor
         */
        E3model = function (elements) {

            var self = this;

            /**
             * The currently displayed elements
             */
            self.elements = ko.observableArray(elements || []);

            /**
             * where a new element shall be added
             * @type {null|ko.observableArray}
             */
            self.addTo = null;

            /**
             * @param elements
             */
            self.setElements = function (elements) {
                self.elements(elements);
            };

            /**
             * Whether or not the form for creating a new element shall be displayed
             */
            self.displayAddElementDialogue = ko.observable(false);

            /**
             * Opens the form for creating a new element
             * @param where
             */
            self.getNewElement = function (where) {
                self.addTo = where;
                self.displayAddElementDialogue(true);
            };

            /**
             * Saves the element currently created in
             */
            self.saveNewElement = function () {
                self.addTo.push(getViewModelForElement('text'));
                self.addTo = null;
                self.displayAddElementDialogue(false);
            };
        };

    /*
     * Attach an E3Model to every editor
     */
    $(document).ready(function () {
        $('.e3-area').each(function (i, node) {
            ko.applyBindings(new E3model(), node);
        });
    });


})(window.jQuery, window.ko);