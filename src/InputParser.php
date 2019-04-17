<?php


namespace Nagoya\Doukaku15;


class InputParser
{
    private $candidates = [1, 2, 4, 8, 16, 32, 64, 128];

    /**
     * @param string $input
     * @return int[]
     */
    public function parse(string $input): array
    {
        $input = (int)$input;

        $numbers = [];

        //var_dump($this->generateCandidateGroups());
        foreach ($this->generateCandidateGroups() as $group) {
            if ($input === array_sum($group)) {
                $numbers = $group;
                break;
            }
        }

        if (count($numbers) === 0) {
            throw new \LogicException('Matching number group not found');
        }

        sort($numbers);

        return $numbers;
    }

    private function generateCandidateGroups(): array
    {
        $groups = [];
        for ($i = 1; $i <= count($this->candidates); $i++) {
            $groups = array_merge($groups, $this->generateGroup($i));
        }

        return $groups;
    }

    private function generateGroup(int $length): array
    {
        $excludeIndexPatterns = $this->generateExcludeIndexPatterns($length);
        $groups = [];
        foreach ($excludeIndexPatterns as $excludeIndex) {
            $groups[] = array_filter($this->candidates, function($index) use ($excludeIndex){ return !in_array($index, $excludeIndex); }, ARRAY_FILTER_USE_KEY);
        }

        return $groups;
    }

    private function generateExcludeIndexPatterns(int $length): array
    {
        $patterns = [];
        for ($i = 0; $i < count($this->candidates); $i++) {
            $pattern = [$i];
            while (count($pattern) < $length) {
                for ($j = 0; $j < count($this->candidates); $j++) {
                    if ($j == $i) {
                        continue;
                    }
                    $pattern[] = $j;
                    sort($pattern);

                    if (in_array($pattern, $patterns)) {
                        array_pop($pattern);
                    }
                }
            }

            $patterns[] = $pattern;
        }

        return $patterns;
    }
}
