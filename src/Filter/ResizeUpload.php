<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Imagine\Filter;

use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use MSBios\Filter\File\RenameUpload;
use MSBios\Imagine\GdAwareInterface;
use MSBios\Imagine\ImagineAwareInterface;
use MSBios\Imagine\ImagineAwareTrait;

/**
 * Class ResizeUpload
 * @package MSBios\Imagine\Filter
 * @deprecated move to msbios/filter
 */
class ResizeUpload extends RenameUpload implements
    ImagineAwareInterface,
    GdAwareInterface
{
    use ImagineAwareTrait;

    /** @var array */
    protected $resizeOptions = [
        'width' => 1,
        'height' => 1,
        'filter' => ImageInterface::FILTER_UNDEFINED
    ];

    /**
     * @param $width
     * @return $this
     */
    public function setWidth($width)
    {
        $this->resizeOptions['width'] = $width;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->resizeOptions['width'];
    }

    /**
     * @param $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->resizeOptions['height'] = $height;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->resizeOptions['height'];
    }

    /**
     * @param $filter
     * @return $this
     */
    public function setFilter($filter)
    {
        $this->resizeOptions['filter'] = $filter;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFilter()
    {
        return $this->resizeOptions['filter'];
    }


    /**
     * @param $options
     * @return $this
     */
    public function setResize($options)
    {
        $this->setOptions($options);
        return $this;
    }

    /**
     * @param array|string $value
     * @return array|string
     */
    public function filter($value)
    {
        // error : 0
        // name : "13.avatar200x200.jpg"
        // size : 4330
        // tmp_name : "./public/uploads/person/tr/ze/6c/2e/13.avatar200x200_59d5f3fc907ac7_26497189.jpg"
        // type : "image/jpeg"

        /** @var array $result */
        $result = parent::filter($value);

        /** @var ImageInterface $image */
        $image = $this->getImagine()->open($result['tmp_name']);
        $image->resize(new Box($this->getWidth(), $this->getHeight()), $this->getFilter());
        $image->save($result['tmp_name']);

        $result['width'] = $this->getWidth();
        $result['height'] = $this->getHeight();

        return $result;
    }
}
