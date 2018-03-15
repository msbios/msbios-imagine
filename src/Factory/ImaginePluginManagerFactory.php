<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Imagine\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Imagine\ImaginePluginManager;
use MSBios\Imagine\ImaginePluginManagerInterface;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ImaginePluginManagerFactory
 * @package MSBios\Imagine\Factory
 */
class ImaginePluginManagerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return ImaginePluginManager|ImaginePluginManagerInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ImaginePluginManagerInterface $imagineManager */
        $imagineManager = new ImaginePluginManager($container, $options ?: []);

        // If this is in a zend-mvc application, the ServiceListener will inject
        // merged configuration during bootstrap.
        if ($container->has('ServiceListener')) {
            return $imagineManager;
        }

        // If we do not have a config service, nothing more to do
        if (! $container->has('config')) {
            return $imagineManager;
        }

        $config = $container->get('config');

        // If we do not have filters configuration, nothing more to do
        if (! isset($config['imagine_manager']) || ! is_array($config['imagine_manager'])) {
            return $imagineManager;
        }

        // Wire service configuration for validators
        (new Config($config['imagine_manager']))->configureServiceManager($imagineManager);

        return $imagineManager;
    }
}
