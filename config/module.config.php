<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Imagine;

use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'service_manager' => [
        'factories' => [
            \Imagine\Gd\Imagine::class =>
                InvokableFactory::class,
            \Imagine\Imagick\Imagine::class =>
                InvokableFactory::class,
            \Imagine\Gmagick\Imagine::class =>
                InvokableFactory::class
        ]
    ],

    'filters' => [
        'initializers' => [
            new ImagineInitializer
        ]
    ],

    Module::class => [
    ],
];
