<?php

namespace BinPacking;

class Rectangle
{
    /**
     * X position of where this rectangle is placed (bottom left)
     *
     * @var int
     */
    private $xPos;
    
    /**
     * Y position of where this rectangle is placed (bottom left)
     *
     * @var int
     */
    private $yPos;

    /**
     * Width of the rectangle
     *
     * @var int
     */
    protected $width;

    /**
     * Height of the rectangle
     *
     * @var int
     */
    protected $height;
    
    /**
     * Identifier for the rectangle
     *
     * @var string
     */
    protected $id;

    /**
     * Flag to indicate that a rectangle has been rotated
     *
     * @var boolean
     */
    protected $rotated;

    /**
     * Identifier for the image's supplied source (eg. origin URL)
     *
     * @var string
     */
    protected $imageSource;

    /**
     * Identifier for the image's location on "local" storage
     *
     * @var string
     */
    protected $imageLocal;

    /**
     * Construct the rectangle
     *
     * @param integer $width Outer width of the rectangle
     * @param integer $height Outer height of the rectangle
     * @param string $id Identifier for the rectangle
     * @param string $imageSource Image source URL or filename
     * @param string $imageLocal Local URL or filename
     */
    public function __construct(int $width, int $height, string $id = null, string $imageSource = null, string $imageLocal = null)
    {
        $this->id = $id;
        $this->width = $width;
        $this->height = $height;
        $this->xPos = 0;
        $this->yPos = 0;
        $this->rotated = false;
        $this->imageSource = $imageSource;
        $this->imageLocal = $imageLocal;
    }

    /**
     * Get the ID of the rectangle
     *
     * @return string
     */
    public function getId() : ?string
    {
        return $this->id;
    }

    /**
     * Get the rotated flag
     *
     * @return boolean
     */
    public function getRotated() : ?bool
    {
        return $this->rotated;
    }

    /**
     * Get the width of the rectangle
     *
     * @return integer
     */
    public function getWidth() : int
    {
        return $this->width;
    }

    /**
     * Set the width of the rectangle
     *
     * @param integer $width
     * @return void
     */
    public function setWidth(int $width) : void
    {
        $this->width = $width;
    }

    /**
     * Get the height of the rectangle
     *
     * @return integer
     */
    public function getHeight() : int
    {
        return $this->height;
    }

    /**
     * Set the height of the rectangle
     *
     * @param integer $height
     * @return void
     */
    public function setHeight(int $height) : void
    {
        $this->height = $height;
    }

    /**
     * Set the position of the rectangle
     *
     * @param int $xPos
     * @param int $yPos
     * @return void
     */
    public function setPosition(int $xPos, int $yPos) : void
    {
        $this->setX($xPos);
        $this->setY($yPos);
    }

    /**
     * Get the X coordinate
     *
     * @return integer
     */
    public function getX() : int
    {
        return $this->xPos;
    }

    /**
     * Set the X coordinate
     *
     * @param integer $xPos
     * @return void
     */
    public function setX(int $xPos) : void
    {
        $this->xPos = $xPos;
    }

    /**
     * Get the Y coordinate
     *
     * @return integer
     */
    public function getY() : int
    {
        return $this->yPos;
    }

    /**
     * Set the Y coordinate
     *
     * @param integer $yPos
     * @return void
     */
    public function setY(int $yPos) : void
    {
        $this->yPos = $yPos;
    }

    /**
     * Rotate the rectangle
     *
     * @return void
     */
    public function rotate() : void
    {
        $newWidth = $this->height;
        $newHeight = $this->width;

        $this->height = $newHeight;
        $this->width = $newWidth;
        $this->rotated = !$this->rotated;
    }
}
