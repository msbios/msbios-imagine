<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Imagine;

use Imagine\Image\ImagineInterface;

/**
 * Interface ImagineAwareInterface
 * @package MSBios\Imagine
 */
interface ImagineAwareInterface
{
    /**
     * @return ImagineInterface
     */
    public function getImagine();

    /**
     * @param ImagineInterface $imagine
     * @return $this
     */
    public function setImagine(ImagineInterface $imagine);
}