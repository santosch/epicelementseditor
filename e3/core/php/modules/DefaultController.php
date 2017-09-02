<?php
/**
 * This is a default module controller
 *
 * This file is part of "EpicElementsEditor"
 *
 * @author Sebastian Antosch <s.antosch@i-san.de>
 * @copyright 2017 I-SAN.de Webdesign & Hosting GbR
 * @link http://i-san.de
 *
 * @license MIT
 */

namespace EpicElementsEditor\Modules;


class DefaultController
{
    /**
     * Overwrite this method in your own module controller,
     * if you have to postprocess data from the editor
     * @param array $data
     * @return array
     */
    public function getTemplateData(array $data)
    {
        return $data;
    }
}