<?php

declare(strict_types=1);

namespace Nagoya\Doukaku15;

class App
{
    /**
     * @var InputParser
     */
    private $inputParser;

    /**
     * @var LineRegistry
     */
    private $lineRegistry;

    /**
     * @var PolygonFinder
     */
    private $polygonFinder;

    /**
     * @param LineRegistry|null $lineRegistry
     * @param PolygonFinder|null $polygonFinder
     */
    public function __construct(LineRegistry $lineRegistry = null, PolygonFinder $polygonFinder = null)
    {
        $this->inputParser = new InputParser();
        $this->lineRegistry = $lineRegistry ?? new LineRegistry([1, 2, 4, 8, 16, 32, 64, 128]);
        $this->polygonFinder = $polygonFinder ?? new PolygonFinder([1 => 3, 2 => 4, 3 => 5, 4 => 5, 5 => 7, 6 => 8, 7 => 9]);
    }


    public function run(string $input)
    {
        // dummy
        $numbers = $this->inputParser->parse($input);

        $gaps = [];
        foreach ($numbers as $seq => $number) {
            $line = $this->lineRegistry->get($number);
            $siblingNumber = count($numbers) > $seq + 1 ? $numbers[$seq + 1] : $numbers[0];
            $sibling = $this->lineRegistry->get($siblingNumber);

            $gaps[] = $line->getGap($sibling);
        }

        $polygons = [];
        foreach ($gaps as $gap) {
            $polygons[] = $this->polygonFinder->getByGap($gap);
        }

        sort($polygons);

        return implode('', $polygons);
    }
}
