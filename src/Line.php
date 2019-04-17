<?php


namespace Nagoya\Doukaku15;


class Line
{
    /**
     * @var int
     */
    private $number;

    /**
     * @var int
     */
    private $position;

    /**
     * @param int $number
     * @param int $position
     */
    public function __construct(int $number, int $position)
    {
        $this->number = $number;
        $this->position = $position;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param Line $line
     * @return float|int
     */
    public function getGap(Line $line): int
    {
        $gap = abs($line->getPosition() - $this->getPosition());
        if ($gap > 4) {
            $gap = 8 - $gap;
        }

        return $gap;
    }
}
