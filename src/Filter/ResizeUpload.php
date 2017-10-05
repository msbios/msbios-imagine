<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Imagine\Filter;

use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Imagine\Image\ImagineInterface;
use MSBios\Filter\File\RenameUpload;
use MSBios\Imagine\ImagickAwareInterface;
use MSBios\Imagine\ImagineAwareInterface;
use MSBios\Imagine\ImagineAwareTrait;

/**
 * Class ResizeUpload
 * @package MSBios\Imagine\Filter
 */
class ResizeUpload extends RenameUpload implements
    ImagineAwareInterface,
    ImagickAwareInterface
{
    use ImagineAwareTrait;

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

        /** @var ImagineInterface $imagine */
        $imagine = $this->getImagine();

        /** @var ImageInterface $image */
        $image = $imagine->open($result['tmp_name']);
        $image->resize(new Box(300, 300), ImageInterface::FILTER_LANCZOS);
        $image->save($result['tmp_name']);

        /** @var string $path */
        $path = $this->getTarget() . 'thumb' . DIRECTORY_SEPARATOR;

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $image->resize(new Box(47, 47), ImageInterface::FILTER_LANCZOS);
        $image->save($path . $result['name']);


        /** @var array $data */
        $data = [
            'src' => $result['tmp_name'],
            'width' => 300,
            'height' => 300,
            'small' => [
                'src' => $result['tmp_name'],
                'width' => 47,
                'height' => 47
            ]
        ];

        return $data;

    }

}