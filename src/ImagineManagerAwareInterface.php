<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Imagine;

/**
 * Interface ImagineManagerAwareInterface
 * @package MSBios\Imagine
 */
interface ImagineManagerAwareInterface
{
    /**
     * @return ImaginePluginManagerInterface
     */
    public function getImagineManager(): ImaginePluginManagerInterface;

    /**
     * @param ImaginePluginManagerInterface $imagineManager
     * @return $this
     */
    public function setImagineManager(ImaginePluginManagerInterface $imagineManager);
}