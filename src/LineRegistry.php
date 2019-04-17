<?php


namespace Nagoya\Doukaku15;


class LineRegistry
{
    /**
     * @var Line[]
     */
    private $lines;

    public function __construct(array $map)
    {
        $this->lines = [];
        foreach ($map as $position => $number) {
            $this->lines[] = new Line($number, $position);
        }
    }

    public function get(int $number): Line
    {
        foreach ($this->lines as $line) {
            if ($line->getNumber() === $number) {
                return $line;
            }
        }

        throw new \InvalidArgumentException(sprintf('No Line found for number %d', $number));
    }

    public function getByPosition(int $position): Line
    {
        foreach ($this->lines as $line) {
            if ($line->getPosition() === $position) {
                return $line;
            }
        }

        throw new \InvalidArgumentException(sprintf('No Line found for position %d', $position));
    }
}
