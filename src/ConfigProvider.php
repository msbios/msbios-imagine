<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Imagine;

use MSBios\Imagine\Factory\ImaginePluginManagerFactory;

/**
 * Class ConfigProvider
 * @package MSBios\Imagine
 */
class ConfigProvider
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencyConfig(),
        ];
    }

    /**
     * Return dependency mappings for this component.
     *
     * @return array
     */
    public function getDependencyConfig()
    {
        return [
            'factories' => [
                'ImagineManager' =>
                    ImaginePluginManagerFactory::class
            ],
            'aliases' => [
                ImaginePluginManagerInterface::class =>
                    'ImagineManager'
            ]
        ];
    }
}
