<?php
/**
 * Created by PhpStorm.
 * User: judzhin
 * Date: 04.10.17
 * Time: 17:40
 */

namespace MSBios\Imagine\Initializer;

use Interop\Container\ContainerInterface;
use MSBios\Imagine\Exception\Exception;
use MSBios\Imagine\ImagineManagerAwareInterface;
use Zend\ServiceManager\Initializer\InitializerInterface;

/**
 * Class ImagineManagerInitializer
 * @package MSBios\Imagine\Initializer
 */
class ImagineManagerInitializer implements InitializerInterface
{
    /**
     * @param ContainerInterface $container
     * @param object $instance
     * @throws Exception
     */
    public function __invoke(ContainerInterface $container, $instance)
    {
        if ($instance instanceof ImagineManagerAwareInterface) {
            $instance->setImagineManager($container->get('ImagineManager'));
        }
    }

    /**
     * @param $an_array
     * @return ImagineManagerInitializer
     */
    public static function __set_state($an_array)
    {
        return new self();
    }
}
