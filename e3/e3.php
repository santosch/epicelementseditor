<?php
/**
 * Main file for the E3 which publishes the API
 *
 * This file is part of "EpicElementsEditor"
 *
 * @author Sebastian Antosch <s.antosch@i-san.de>
 * @copyright 2017 I-SAN.de Webdesign & Hosting GbR
 * @link http://i-san.de
 *
 * @license MIT
 */

ini_set('display_errors', '1');
define('E3_BASEDIR', dirname(__FILE__));

class EpicElementsEditor {

    /**
     * Returns the editor markup
     * @return string
     */
    public static function renderEditor()
    {
        return file_get_contents(E3_BASEDIR . "/core/html/e3.html");
    }


    public static function renderScriptConfig()
    {
        require_once "core/php/ModuleCollector.php";

        $moduleCollector = new \EpicElementsEditor\ModuleCollector();
        $moduleCollector->collect();
        return $moduleCollector->renderConfig() . PHP_EOL . $moduleCollector->renderTemplates();
    }

    /**
     * Converts the view models to the final HTML
     * @param $data
     * @return string
     */
    public static function getRenderedResult($data)
    {
        require_once "core/php/RenderController.php";
        require_once "core/php/modules/DefaultController.php";

        $renderController = new \EpicElementsEditor\RenderController();
        return $renderController->render($data);
    }

}