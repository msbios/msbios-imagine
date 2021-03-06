<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Imagine;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'imagine_manager' => [
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
        'factories' => [
            Filter\ResizeUpload::class =>
                InvokableFactory::class,
            Filter\Thumbnail::class =>
                InvokableFactory::class
        ],
        'initializers' => [
            // new Initializer\ImagineManagerInitializer
        ]
    ],
];
