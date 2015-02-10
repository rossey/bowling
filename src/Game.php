<?php

namespace Bowling;

class Game
{
    /**
     * @var int
     */
    private $score;

    /**
     * @param int $pins
     */
    public function roll($pins)
    {
        $this->score += $pins;
    }

    /**
     * @return int
     */
    public function score()
    {
        return $this->score;
    }
}
