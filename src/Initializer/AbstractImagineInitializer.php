<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Imagine\Initializer;

use Imagine\Gd\Imagine as GdImagine;
use Imagine\Gmagick\Imagine as GmagickImagine;
use Imagine\Imagick\Imagine as ImagickImagine;
use Interop\Container\ContainerInterface;
use MSBios\Imagine\GdAwareInterface;
use MSBios\Imagine\GmagickAwareInterface;
use MSBios\Imagine\ImagineAwareInterface;
use MSBios\Imagine\ImaginePluginManagerInterface;
use Zend\ServiceManager\Initializer\InitializerInterface;

/**
 * Class AbstractImagineInitializer
 * @package MSBios\Imagine\Initializer
 */
abstract class AbstractImagineInitializer implements InitializerInterface
{
    /**
     * @param ContainerInterface $container
     * @param object $instance
     */
    public function __invoke(ContainerInterface $container, $instance)
    {
        /** @var ImaginePluginManagerInterface $imagineManager */
        $imagineManager = $container->get('ImagineManager');

        if ($instance instanceof GdAwareInterface) {
            $instance->setImagine(
                $imagineManager->get(GdImagine::class)
            );
        }

        if ($instance instanceof GmagickAwareInterface) {
            $instance->setImagine(
                $imagineManager->get(GmagickImagine::class)
            );
        }

        if ($instance instanceof ImagineAwareInterface) {
            $instance->setImagine(
                $imagineManager->get(ImagickImagine::class)
            );
        }
    }
}
