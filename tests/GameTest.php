<?php

namespace Bowling;

class GameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Game
     */
    private $bowlingGame;

    protected function setUp()
    {
        $this->bowlingGame = new Game();
    }

    /**
     * @throws \Exception
     */
    public function testGutterGame()
    {
        $this->rollMany(20, 0);
        $this->assertEquals(0, $this->bowlingGame->score());
    }

    /**
     * @param $n
     * @param $pins
     */
    private function rollMany($n, $pins)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->bowlingGame->roll($pins);
        }
    }

    /**
     * @throws \Exception
     */
    public function testAllOnes()
    {
        $this->rollMany(20, 1);
        $this->assertEquals(20, $this->bowlingGame->score());
    }

    /**
     * @throws \Exception
     */
    public function testOneSpare()
    {
        $this->rollSpare();
        $this->bowlingGame->roll(3);
        $this->rollMany(17, 0);
        $this->assertEquals(16, $this->bowlingGame->score());
    }

    /**
     * @throws \Exception
     */
    public function testOneStrike()
    {
        $this->rollStrike();
        $this->bowlingGame->roll(3);
        $this->bowlingGame->roll(4);
        $this->rollMany(16, 0);
        $this->assertEquals(24, $this->bowlingGame->score());
    }

    /**
     * @throws \Exception
     */
    public function testPerfectGame()
    {
        $this->rollMany(12, 10);
        $this->assertEquals(300, $this->bowlingGame->score());
    }

    private function rollStrike()
    {
        $this->bowlingGame->roll(10);
    }

    private function rollSpare()
    {
        $this->bowlingGame->roll(5);
        $this->bowlingGame->roll(5);
    }
}
