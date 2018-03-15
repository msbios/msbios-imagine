<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Imagine\Filter;

use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Imagine\Image\ManipulatorInterface;
use MSBios\Imagine\GdAwareInterface;
use MSBios\Imagine\ImagineAwareInterface;
use MSBios\Imagine\ImagineAwareTrait;
use Zend\Filter\AbstractFilter;

/**
 * Class Thumbnail
 * @package MSBios\Imagine\Filter
 * @deprecated move to msbios/filter
 */
class Thumbnail extends AbstractFilter implements
    ImagineAwareInterface,
    GdAwareInterface
{
    use ImagineAwareTrait;

    /** @var array */
    protected $options = [
        'target' => null,
        'width' => 0,
        'height' => 0,
        'mode' => ManipulatorInterface::THUMBNAIL_INSET,
        'filter' => ImageInterface::FILTER_UNDEFINED
    ];

    /**
     * @param $target
     * @return $this
     */
    public function setTarget($target)
    {
        $this->options['target'] = $target;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTarget()
    {
        return $this->options['target'];
    }

    /**
     * @param $width
     * @return $this
     */
    public function setWidth($width)
    {
        $this->options['width'] = $width;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->options['width'];
    }

    /**
     * @param $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->options['height'] = $height;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->options['height'];
    }

    /**
     * @param $filter
     * @return $this
     */
    public function setMode($mode)
    {
        $this->options['mode'] = $mode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMode()
    {
        return $this->options['mode'];
    }

    /**
     * @param $filter
     * @return $this
     */
    public function setFilter($filter)
    {
        $this->options['filter'] = $filter;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFilter()
    {
        return $this->options['filter'];
    }

    /**
     * @param array|string $value
     * @return array|string
     */
    public function filter($value)
    {
        /** @var ImageInterface $image */
        $image = $this->getImagine()->open($value);
        $image->thumbnail(
            new Box($this->getWidth(), $this->getHeight()),
            $this->getMode(),
            $this->getFilter()
        );
        $image->save($value);

        $result['width'] = $this->getWidth();
        $result['height'] = $this->getHeight();

        return [
            'width' => $this->getWidth(),
            'height' => $this->getHeight()
        ];
    }
}
