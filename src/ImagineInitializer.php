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
use Imagine\Image\ImagineInterface;
use Imagine\Imagick\Imagine as ImagickImagine;
use Interop\Container\ContainerInterface;
use MSBios\Imagine\Exception\Exception;
use Zend\ServiceManager\Initializer\InitializerInterface;

/**
 * Class ImagineInitializer
 * @package MSBios\Imagine
 */
class ImagineInitializer implements InitializerInterface
{
    /**
     * @param ContainerInterface $container
     * @param object $instance
     * @throws Exception
     */
    public function __invoke(ContainerInterface $container, $instance)
    {
        if ($instance instanceof ImagineAwareInterface) {

            /** @var string $className */
            $className = get_class($instance);

            if ($container->has(get_class($instance))) {

                /** @var ImagineInterface $imagine */
                $imagine = $container->get($className);

                if ($imagine instanceof ImagineInterface) {
                    $instance->setImagine($imagine);
                    return;
                }
            }

            if ($instance instanceof GdAwareInterface) {
                $instance->setImagine($container->get(GdImagine::class));
            } elseif ($instance instanceof ImagickAwareInterface) {
                $instance->setImagine($container->get(ImagickImagine::class));
            } elseif ($instance instanceof GmagickAwareInterfrace) {
                $instance->setImagine($container->get(GmagickImagine::class));
            } else {
                throw new Exception('You must implement: ' . implode(', ', [
                        GdAwareInterface::class,
                        ImagickAwareInterface::class,
                        GmagickAwareInterfrace::class
                    ]));
            }
        }
    }

    /**
     * @param $an_array
     * @return ImagineInitializer
     */
    public static function __set_state($an_array)
    {
        return new self();
    }
}
