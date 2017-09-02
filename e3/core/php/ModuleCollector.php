<?php
/**
 * This class collects all available module data
 *
 * This file is part of "EpicElementsEditor"
 *
 * @author Sebastian Antosch <s.antosch@i-san.de>
 * @copyright 2017 I-SAN.de Webdesign & Hosting GbR
 * @link http://i-san.de
 *
 * @license MIT
 */

namespace EpicElementsEditor;


class ModuleCollector
{
    /**
     * the collected data
     * @var null|array
     */
    private $data;

    public function collect()
    {
        $this->data = [
            'config' => [],
            'templates' => [],
        ];

        $modules = glob(E3_BASEDIR . '/modules/*' , GLOB_ONLYDIR);
        $user_modules = glob(E3_BASEDIR . '/user_modules/*' , GLOB_ONLYDIR);

        foreach ($modules as $module) {
            $this->collectDataFromPath($module);
        }

        foreach ($user_modules as $user_module) {
            $this->collectDataFromPath($user_module);
        }
    }

    /**
     * Renders a script tag that exposes the config to the JS
     * @return string
     */
    public function renderConfig()
    {
        return '<script type="text/javascript">var e3config = ' . json_encode($this->data['config'], JSON_HEX_TAG) . ';</script>';
    }

    /**
     * Renders script tags containing the editor templates of the modules
     * @return string
     */
    public function renderTemplates()
    {
        $tags = [];
        foreach ($this->data['templates'] as $name => $template) {
            $tags[] = '<script type="text/html" id="e3-template-' . $name . '">' . PHP_EOL . $template . PHP_EOL . '</script>';
        };

        return implode(PHP_EOL, $tags);
    }

    /**
     * This extracts templates and configs from a given path
     * @param $path
     */
    protected function collectDataFromPath($path)
    {
        $name = basename($path);

        // template
        $template = $path . '/editor_template.html';
        if (file_exists($template)) {
            $this->data['templates'][$name] = file_get_contents($template);
        }

        //config
        $config = $path . '/module.json';
        if (file_exists($config)) {
            $this->data['config'][$name] = json_decode(file_get_contents($config));
        }
    }



}