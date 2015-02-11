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
            if ($this->isStrike($frameIndex)) {
                $score += 10 + $this->strikeBonus($frameIndex);
                $frameIndex++;
            } elseif ($this->isSpare($frameIndex)) {
                $score += 10 + $this->spareBonus($frameIndex);
                $frameIndex += 2;
            } else {
                $score += $this->sumOfBallsInFrame($frameIndex);
                $frameIndex += 2;
            }
        }
        return $score;
    }

    /**
     * @param int $frameIndex
     * @return bool
     */
    private function isStrike($frameIndex)
    {
        return $this->rolls[$frameIndex] == 10;
    }

    /**
     * @param int $frameIndex
     * @return bool
     */
    private function isSpare($frameIndex)
    {
        return ($this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1]) === 10;
    }

    /**
     * @param int $frameIndex
     * @return int
     */
    private function strikeBonus($frameIndex)
    {
        return $this->rolls[$frameIndex + 1] + $this->rolls[$frameIndex + 2];
    }

    /**
     * @param int $frameIndex
     * @return int
     */
    private function spareBonus($frameIndex)
    {
        return $this->rolls[$frameIndex + 2];
    }

    /**
     * @param int $frameIndex
     * @return int
     */
    private function sumOfBallsInFrame($frameIndex)
    {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1];
    }
}
