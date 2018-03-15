<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Imagine\Initializer;

use Imagine\Gd\Imagine;
use Interop\Container\ContainerInterface;
use MSBios\Imagine\GdAwareInterface;
use Zend\ServiceManager\Initializer\InitializerInterface;

/**
 * Class GdInitializer
 * @package MSBios\Imagine\Initializer
 */
class GdInitializer implements InitializerInterface
{
    /**
     * @param ContainerInterface $container
     * @param object $instance
     */
    public function __invoke(ContainerInterface $container, $instance)
    {
        if ($instance instanceof GdAwareInterface) {
            $instance->setImagine(
                $container->get('ImagineManager')->get(Imagine::class)
            );
        }
    }

    /**
     * @param $an_array
     * @return GdInitializer
     */
    public static function __set_state($an_array)
    {
        return new self();
    }
}
