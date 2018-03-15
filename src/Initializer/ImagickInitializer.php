<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Imagine\Initializer;

use Imagine\Imagick\Imagine;
use Interop\Container\ContainerInterface;
use MSBios\Imagine\ImagineAwareInterface;
use Zend\ServiceManager\Initializer\InitializerInterface;

/**
 * Class ImagickInitializer
 * @package MSBios\Imagine\Initializer
 */
class ImagickInitializer implements InitializerInterface
{
    /**
     * @param ContainerInterface $container
     * @param object $instance
     */
    public function __invoke(ContainerInterface $container, $instance)
    {
        if ($instance instanceof ImagineAwareInterface) {
            $instance->setImagine(
                $container->get('ImagineManager')->get(Imagine::class)
            );
        }
    }

    /**
     * @param $an_array
     * @return ImagickInitializer
     */
    public static function __set_state($an_array)
    {
        return new self();
    }
}
