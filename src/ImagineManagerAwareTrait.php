<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Imagine;

/**
 * Trait ImagineManagerAwareTrait
 * @package MSBios\Imagine
 */
trait ImagineManagerAwareTrait
{
    /** @var ImaginePluginManagerInterface */
    protected $imagineManager;

    /**
     * @return ImaginePluginManagerInterface
     */
    public function getImagineManager(): ImaginePluginManagerInterface
    {
        return $this->imagineManager;
    }

    /**
     * @param ImaginePluginManagerInterface $imagineManager
     * @return $this
     */
    public function setImagineManager(ImaginePluginManagerInterface $imagineManager)
    {
        $this->imagineManager = $imagineManager;
        return $this;
    }
}
