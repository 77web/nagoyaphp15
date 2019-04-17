<?php


namespace Nagoya\Doukaku15;

/**
 * Class PolygonFinder
 * 線同士の距離に対応する多角形を返す
 *
 * @package Nagoya\Doukaku15
 */
class PolygonFinder
{
    /**
     * @var array
     * [gap => polygon]
     */
    private $map = [];

    public function __construct(array $map)
    {
        $this->map = $map;
    }

    public function getByGap(int $gap)
    {
        return $this->map[$gap];
    }
}
