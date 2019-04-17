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

    public function get(int $number)
    {
        foreach ($this->lines as $line) {
            if ($line->getNumber() === $number) {
                return $line;
            }
        }

        throw new \InvalidArgumentException(sprintf('No Line found for number %d', $number));
    }
}
