<?php

namespace Bowling;

class Game
{
    /**
     * @var int
     */
    private $score;

    /**
     * @var int[]
     */
    private $rolls = [];

    /**
     * @var int
     */
    private $currentRoll = 0;

    /**
     * @param int $pins
     */
    public function roll($pins)
    {
        $this->score += $pins;
        $this->rolls[$this->currentRoll++] = $pins;
    }

    /**
     * @return int
     */
    public function score()
    {
        $score = 0;
        $frameIndex = 0;
        for ($frame = 0; $frame < 10; $frame++) {
            if ($this->isSpare($frameIndex)) { // spare!
                $score += 10 + $this->rolls[$frameIndex + 2];
            } else {
                $score += $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1];
            }
            $frameIndex += 2;
        }
        return $score;
    }

    /**
     * @param $frameIndex
     * @return bool
     */
    private function isSpare($frameIndex)
    {
        return ($this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1]) === 10;
    }
}
