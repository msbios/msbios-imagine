<?php
/**
 * Created by PhpStorm.
 * User: judzhin
 * Date: 04.10.17
 * Time: 17:40
 */

namespace MSBios\Imagine;


use Imagine\Gd\Imagine as GdImagine;
use Imagine\Gmagick\Imagine as GmagickImagine;
use Imagine\Imagick\Imagine as ImagickImagine;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Initializer\InitializerInterface;

/**
 * Class ImagineInitializer
 * @package MSBios\Imagine
 */
class ImagineInitializer implements InitializerInterface
{
    /**
     * Initialize the given instance
     *
     * @param  ContainerInterface $container
     * @param  object $instance
     * @return void
     */
    public function __invoke(ContainerInterface $container, $instance)
    {
        if ($instance instanceof ImagineAwareInterface) {

            /** @var string $className */
            $className = get_class($instance);

            if ($container->has(get_class($instance))) {
                $instance->setImagine(
                    $container->get($className)
                );
            } else if ($instance instanceof GdAwareInterface) {
                $instance->setImagine($container->get(GdImagine::class));
            } else if ($instance instanceof ImagickAwareInterface) {
                $instance->setImagine($container->get(ImagickImagine::class));
            } else if ($instance instanceof GmagickAwareInterfrace) {
                $instance->setImagine($container->get(GmagickImagine::class));
            }

        }
    }
}