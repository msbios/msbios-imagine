<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Imagine\Initializer;

use Imagine\Gmagick\Imagine;
use Interop\Container\ContainerInterface;
use MSBios\Imagine\GmagickAwareInterface;
use Zend\ServiceManager\Initializer\InitializerInterface;

/**
 * Class GmagickInitializer
 * @package MSBios\Imagine\Initializer
 */
class GmagickInitializer implements InitializerInterface
{
    /**
     * @param ContainerInterface $container
     * @param object $instance
     */
    public function __invoke(ContainerInterface $container, $instance)
    {
        if ($instance instanceof GmagickAwareInterface) {
            $instance->setImagine(
                $container->get('ImagineManager')->get(Imagine::class)
            );
        }
    }

    /**
     * @param $an_array
     * @return GmagickInitializer
     */
    public static function __set_state($an_array)
    {
        return new self();
    }
}
