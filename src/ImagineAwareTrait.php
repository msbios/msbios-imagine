<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Imagine;

use Imagine\Image\ImagineInterface;

/**
 * Class ImagineAwareTrait
 * @package MSBios\Imagine
 */
trait ImagineAwareTrait
{
    /**
     * @var ImagineInterface
     */
    protected $imagine;

    /**
     * @return ImagineInterface
     */
    public function getImagine()
    {
        return $this->imagine;
    }

    /**
     * @param ImagineInterface $imagine
     * @return $this
     */
    public function setImagine(ImagineInterface $imagine)
    {
        $this->imagine = $imagine;
        return $this;
    }
}