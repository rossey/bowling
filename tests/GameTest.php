<?php

namespace Bowling;

class GameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @throws \Exception
     */
    public function testGutterGame()
    {
        $bowlingGame = new Game();

        for ($i = 0; $i < 20; $i++) {
            $bowlingGame->roll(0);
        }

        $this->assertEquals(0, $bowlingGame->score());
    }
}
